<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\User;


/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/about', function () {
    return view('main_pages/about', ['title' => 'About This Site']);
});
Route::get('/contact', function () {
    return view('main_pages/contact', ['title' => 'Contact Information']);
});

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/signup', [SignUpController::class, 'sign_up'])->middleware('guest');
Route::post('/signup', [SignUpController::class, 'store']);
Route::get('/signin', [AuthController::class, 'sign_in'])->middleware('guest')->name('login');
Route::post('/signin', [AuthController::class, 'authenticate']);
Route::get('/signout', [AuthController::class, 'sign_out']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/posts', PostController::class)->except(
    ['create', 'store', 'edit', 'update', 'delete']
);
Route::resource('/dashboard/post', DashboardController::class)->middleware('auth');
Route::resource('/dashboard/category', CategoryController::class)->except('show')->middleware('administrator');

Route::get('/dashboard/category/convert', [CategoryController::class, 'convert_slug'])->middleware('administrator');
