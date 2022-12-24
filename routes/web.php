<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('profile', [AuthController::class, 'profile']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('register', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-register', [AuthController::class, 'customRegistration'])->name('register.custom'); 
//Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::group(['middleware' => ['auth']], function() {
    /**
    * Verification Routes
    */
    Route::get('/verify-email', [VerificationController::class, 'show'])->name('verification.notice');
    //Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/profile');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/resend-email', [VerifificationController::class, 'resend'])->name('verification.resend');

    Route::group(['middleware' => ['verified']], function() {
        Route::get('profile', [AuthController::class, 'profile']); 
});

});