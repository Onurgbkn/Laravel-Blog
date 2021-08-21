<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dashboard;






Route::post('/admin/register', [Dashboard::class, 'registerPost'])->name('registerPost');


Route::post('/admin/login', [Dashboard::class, 'loginPost'])->name('loginPost');

Route::get('/admin/logout', [Dashboard::class, 'logout'])->name('logout');


Route::group(['middleware'=>['AdminCheck']], function(){
    Route::get('/admin/panel', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/admin/register', [Dashboard::class, 'register'])->name('register');
    Route::get('/admin/login', [Dashboard::class, 'login'])->name('login');
});

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

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/about.html', [PageController::class, 'about'])->name('about');

Route::get('/categories.html', [PageController::class, 'categories'])->name('categories');;

Route::get('/posts/{slug}', [PageController::class, 'post'])->name('post');

Route::get('/{category}', [PageController::class, 'categoryPosts'])->name('categoryPosts');

Route::post('/posts/{slug}', [PageController::class, 'makecomment'])->name('makecomment');

Route::post('/about', [PageController::class, 'contact'])->name('contact');
