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
Route::get('/contact', [HomeController::class, 'contact'])->name('website.contact');