<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;





Route::post('/admin/register', [Dashboard::class, 'registerPost'])->name('registerPost');


Route::post('/admin/login', [Dashboard::class, 'loginPost'])->name('loginPost');

Route::get('/admin/logout', [Dashboard::class, 'logout'])->name('logout');


Route::group(['middleware'=>['AdminCheck']], function(){
    Route::get('/admin/panel', [Dashboard::class, 'index'])->name('dashboard');
    //Route::get('/admin/posts', [Dashboard::class, 'posts'])->name('posts');
    Route::get('/admin/register', [Dashboard::class, 'register'])->name('register');
    Route::get('/admin/login', [Dashboard::class, 'login'])->name('login');
    Route::get('/admin/resetpassw', [Dashboard::class, 'resetpassw'])->name('resetpassw');
    Route::post('/admin/resetpassw', [Dashboard::class, 'resetpasswPost'])->name('resetpasswPost');

    Route::get('/admin/posts', [PostController::class, 'index'])->name('adminposts');
    Route::post('/admin/posts/create', [PostController::class, 'create'])->name('createposts');
    Route::post('/admin/posts/update', [PostController::class, 'update'])->name('updateposts');
    Route::post('/admin/posts/delete', [PostController::class, 'delete'])->name('deleteposts');
    Route::post('/admin/posts/show', [PostController::class, 'show'])->name('showposts');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admincategories');
    Route::post('/admin/categories/create', [CategoryController::class, 'create'])->name('createcategory');
    Route::post('/admin/categories/update', [CategoryController::class, 'update'])->name('updatecategory');
    Route::post('/admin/categories/delete', [CategoryController::class, 'delete'])->name('deletecategory');

    Route::get('/admin/comments', [CommentController::class, 'index'])->name('admincomments');
    Route::get('/admin/comments/toggle', [CommentController::class, 'toggle'])->name('togglecomment');
    Route::get('/admin/comments/delete{id}', [CommentController::class, 'delete'])->name('deletecomment');

    Route::get('/admin/searches', [Dashboard::class, 'searches'])->name('adminsearches');

    Route::get('/admin/admins', [AdminController::class, 'index'])->name('adminadmins');
    Route::get('/admin/admins/toggle', [AdminController::class, 'toggle'])->name('toggleadmin');
    Route::get('/admin/admins/delete{id}', [AdminController::class, 'delete'])->name('deleteadmin');
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

Route::get('/post/{slug}', [PageController::class, 'post'])->name('post');

Route::get('/categories/{category}', [PageController::class, 'categoryPosts'])->name('categoryPosts');

Route::post('/post/{slug}', [PageController::class, 'makecomment'])->name('makecomment');

Route::post('/about', [PageController::class, 'contact'])->name('contact');

Route::get('/search', [PageController::class, 'searchPosts'])->name('searchPosts');
