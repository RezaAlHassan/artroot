<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('profile', [AuthController::class, 'profile']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('register', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-register', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('forgot-password-email', [AuthController::class, 'forgotpassword'])->name('password.email-request'); 
Route::post('forgot-password-email', [AuthController::class, 'emailrequest'])->name('password.link'); 
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatepassword'])->name('password.update'); 
//Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Verification Routes
    */
    Route::get('/verify-email', [VerificationController::class, 'show'])->name('verification.notice');
    //Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    //email link
    Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        if(Auth::user()->usertype==1){
            return redirect('/home');   
        }
        else{
            return redirect('/profile');
        }
        
    })->middleware(['auth', 'signed'])->name('verification.verify');
    //resend
    Route::post('/resend-email', [VerificationController::class, 'resend'])->name('verification.resend');
    
    //verified users can access
    Route::group(['middleware' => ['verified']], function() {
       
        Route::get('profile', [ProfileController::class, 'profile']); 
        Route::get('add-art', [ProfileController::class, 'addArt']); 
        Route::post('add-art', [ ProfileController::class, 'uploadArt' ])->name('art.add'); 
        Route::get('{filename}', [ ProfileController::class, 'displayArt' ])->name('art.display'); 

        Route::get('home', [AuthController::class, 'home']); 
});

});