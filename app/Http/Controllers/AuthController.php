<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Hash;
use Session;
use App\Models\User;
use App\Models\Art;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function forgotpassword()
    {
        return view('auth.forgot-password-email');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        //checks credentials
        //checks usertype
        //returns home if default
        //returns profile if artist
        if (Auth::attempt($credentials)) {
            if (Auth::user()->usertype == 1) {
                return redirect()->intended('home')
                    ->withSuccess('Signed in');
            } else {
                return redirect()->intended('edit-profile')
                    ->withSuccess('Signed in');
            }
        }

        return redirect("login")->withErrors(["invalid_cred" => "Login details invalid"]);
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'usertype' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);
        event(new Registered($check));

        return redirect("login")->withSuccess('Your account has been created');;
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'usertype' => $data['usertype']
        ]);
    }

    public function emailrequest(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        // $email = Input::get('email');

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }


    public function home()
    {
        if (Auth::check()) {
            $arts = Art::with('user')->get();
            // $users = $arts->user;
            return view('home')->with('arts', $arts);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
