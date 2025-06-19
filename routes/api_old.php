<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\api\ApiController;

Route::post('/student/login', [LoginController::class, 'login']);
Route::post('/student_login', [AuthController::class, 'studentLogin'])->name('student.Login');

Route::post('/student/register', [RegisterController::class, 'register']);


Route::post('/user/register', [ApiController::class, 'register']);
Route::post('/user/login', [ApiController::class, 'login']);
Route::post('/user/logout', [ApiController::class, 'logout']);
Route::post('forgot-password', [ApiController::class, 'forgotPassword']);
Route::post('verify-otp', [ApiController::class, 'verifyOTP']);
Route::post('reset', [ApiController::class, 'reset']);
Route::post('change-password', [ApiController::class, 'updatePassword']);
Route::get('privacy-policy', [ApiController::class, 'privacyPolicy']);
Route::get('/term-and-condition', [ApiController::class, 'termAndCondition']);
Route::get('/blogs', [ApiController::class, 'blogs']);

Route::get('/about', [ApiController::class, 'aboutus']);
Route::get('/userprofile', [ApiController::class, 'userprofile']);
// Login API
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth');


// Logout API
// Route::post('/logout', [AuthController::class, 'logout']);


