<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\api\ApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::post('/student/login', [LoginController::class, 'login']);
Route::post('/student_login', [AuthController::class, 'studentLogin'])->name('student.Login');

Route::post('/student/register', [RegisterController::class, 'register']);



Route::post('forgot-password', [ApiController::class, 'forgotPassword']);
Route::post('verify-otp', [ApiController::class, 'verifyOTP']);
Route::post('reset', [ApiController::class, 'reset']);
Route::post('change-password', [ApiController::class, 'updatePassword']);
Route::get('privacy-policy', [ApiController::class, 'privacyPolicy']);
Route::get('/term-and-condition', [ApiController::class, 'termAndCondition']);
Route::get('/blogs', [ApiController::class, 'blogs']);

Route::get('/about', [ApiController::class, 'aboutus']);


Route::post('/user/register', [ApiController::class, 'register']);
Route::post('/user/login', [ApiController::class, 'login']);
Route::post('/user/logout', [ApiController::class, 'logout'])->middleware('auth:api');

// Email verification callback from the email link
// Route::get('/email/verify/{id}/{hash}', [ApiController::class, 'verifyEmail'])
//     ->middleware('signed')
//     ->name('verification.verify');
// Route::get('/api/email/verify/{id}/{hash}', [ApiController::class, 'verifyEmail'])
//     ->middleware('signed')
//     ->name('verification.verify');

Route::get('/email/verify/{id}/{hash}', [ApiController::class, 'verifyEmail'])
    ->middleware('signed')
    ->name('verification.verify');

// Route::get('/email/verify/{id}/{hash}', [ApiController::class, 'verifyEmail'])->middleware(['signed'])->name('verification.verify');


/*
|--------------------------------------------------------------------------
| Protected Routes (Authenticated + Verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:api'])->group(function () {
    Route::post('/email/resend', [ApiController::class, 'resendVerification']);
    // Route::get('/userprofile', [ApiController::class, 'userProfile']);
});

Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::get('/userprofile', [ApiController::class, 'userProfile']);
    Route::get('/userdashboard', [UserDashController::class, 'userdashboard']);
    // Route::post('/email/resend', [ApiController::class, 'resendVerification'])->name('verification.resend');
});

