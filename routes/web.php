<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('website.home');
    Route::get('about', 'about')->name('website.about');
    Route::get('blogs', 'blogs')->name('website.blogs');
    Route::get('blogDetail', 'blogDetail')->name('website.blogDetail');
    Route::get('courses', 'courses')->name('website.courses');
    Route::get('courseDetail', 'courseDetail')->name('website.courseDetail');
    Route::get('events', 'events')->name('website.events');
    Route::get('eventDetail', 'eventDetail')->name('website.eventDetail');
    Route::get('instructors', 'instructors')->name('website.instructors');
    Route::get('instructorDetail', 'instructorDetail')->name('website.instructorDetail');
    Route::get('contact', 'contact')->name('website.contact');
    Route::get('privacy', 'privacy')->name('website.privacy');
    Route::get('support', 'support')->name('website.support');
    Route::get('terms', 'terms')->name('website.terms');
    Route::get('cart', 'cart')->name('website.cart');
})->middleware('web');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('store', 'store')->name('store');
    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::get('logout', 'logout')->name('logout');
})->middleware('guest');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [LoginRegisterController::class,'dashboard'])->name('dashboard');
    Route::post('/upload-avatar', [LoginRegisterController::class,'uploadAvatar'])->name('upload.avatar');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback');
});