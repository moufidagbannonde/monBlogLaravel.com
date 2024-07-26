<?php

use App\Http\Controllers\ArticleController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [PagesController::class, 'index']);
// Route::get('/contact-us', [PagesController::class, 'contact']);

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/contact-us', 'contact');
    Route::get('/about', 'about');
});
Route::controller(ArticleController::class)->group(function(){
    Route::get('/articles','index')->name('articles.index')->middleware('auth');
    Route::get('/articles/create','create')->name('articles.create')->middleware('auth');
    Route::post('/articles/create','store')->name('articles.store')->middleware('auth');
    Route::get('/articles/{article}','show')->name('articles.show')->middleware('auth');
    Route::get('/articles/{article}/edit','edit')->name('articles.edit')->middleware('auth');    
    Route::patch('/articles/{article}/edit', 'update')->name('articles.update')->middleware('auth');
    Route::delete('/articles/{article}/delete', 'destroy')->name('articles.destroy')->middleware('auth');
});     

// routes d'authentification 

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');

// // routes dirigeant vers le profil
Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth.basic');
