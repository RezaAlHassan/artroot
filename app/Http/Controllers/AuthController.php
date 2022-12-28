<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            if(Auth::user()->usertype==1){
                return redirect()->intended('home')
                ->withSuccess('Signed in');   
            }
            else{
                return redirect()->intended('profile')
                ->withSuccess('Signed in');  
            }
     
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
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

    public function resetlink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
      
    }  
    
    public function profile()
    {
        if(Auth::check()){
            return view('profile');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function home()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
