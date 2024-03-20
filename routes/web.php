<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\DashboardController;
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
    Route::get('courseInDetail/{name}', 'courseInDetail')->name('website.courseInDetail');
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
    Route::get('lockscreen', 'lockscreen')->name('lockscreen');
    Route::post('unlock', 'unlock')->name('unlock');
    Route::get('logout', 'logout')->name('logout');
})->middleware('guest');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('category', [CategoryController::class,'category'])->name('category');
    Route::get('roles', [DashboardController::class,'roles'])->name('roles');
    Route::get('icons', [CategoryController::class,'icons'])->name('icons');
    Route::post('addCategory', [CategoryController::class,'addCategory'])->name('addCategory');
    Route::post('updateCategory', [CategoryController::class,'updateCategory'])->name('updateCategory');
    Route::get('deleteCategory/{id}', [CategoryController::class,'deleteCategory'])->name('deleteCategory');
    Route::get('deleteAllCategory',[CategoryController::class,'deleteAll'])->name('deleteAllCategory');
    Route::get('course', [CourseController::class,'courses'])->name('course');
    Route::get('courseDetail/{title}', [CourseController::class,'courseDetail'])->name('courseDetail');
    Route::post('addCourse',[CourseController::class,'addCourse'])->name('addCourse');
    Route::get('delete/{id}',[CourseController::class,'delete'])->name('delete');
    Route::get('deleteAllCourses',[CourseController::class,'deleteAll'])->name('deleteAllCourses');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback')->name('auth.google.callback');
});