<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('website.home');
Route::get('/about', [HomeController::class, 'about'])->name('website.about');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('website.blogs');
Route::get('/blogDetail', [HomeController::class, 'blogDetail'])->name('website.blogDetail');
Route::get('/courses', [HomeController::class, 'courses'])->name('website.courses');
Route::get('/courseDetail', [HomeController::class, 'courseDetail'])->name('website.courseDetail');
Route::get('/events', [HomeController::class, 'events'])->name('website.events');
Route::get('/eventDetail', [HomeController::class, 'eventDetail'])->name('website.eventDetail');
Route::get('/instructors', [HomeController::class, 'instructors'])->name('website.instructors');
Route::get('/instructorDetail', [HomeController::class, 'instructorDetail'])->name('website.instructorDetail');
Route::get('/contact', [HomeController::class, 'contact'])->name('website.contact');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('website.privacy');
Route::get('/support', [HomeController::class, 'support'])->name('website.support');
Route::get('/terms', [HomeController::class, 'terms'])->name('website.terms');