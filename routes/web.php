<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomAuthController;

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

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

// The route we have created to show all blog posts.
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index']);

Route::get('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'show']);

//shows create post form
Route::get('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'create']);

//saves the created post to the databse
Route::post('/blog/create/post', [\App\Http\Controllers\BlogPostController::class, 'store']); 

//shows edit post form
Route::get('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'edit']); 

//commits edited post to the database 
Route::put('/blog/{blogPost}/edit', [\App\Http\Controllers\BlogPostController::class, 'update']); 

//deletes post from the database
Route::delete('/blog/{blogPost}', [\App\Http\Controllers\BlogPostController::class, 'destroy']); 

// Trash post
Route::get('/blog/{blogPost}/trash', [\App\Http\Controllers\BlogPostController::class, 'trash']); 

// Restore post
Route::get('/blog/{blogPost}/restore', [\App\Http\Controllers\BlogPostController::class, 'restore']); 

//======================================================================================================//
// create comment
Route::post('/comment/create', [\App\Http\Controllers\CommentController::class, 'store']);

// Delete comment
Route::delete('/comment/{blogComment}', [\App\Http\Controllers\CommentController::class, 'destroy']);

// Trash comment
Route::get('/comment/{blogComment}/trash', [\App\Http\Controllers\CommentController::class, 'trash']);

// Restore comment
Route::get('/comment/{blogComment}/restore', [\App\Http\Controllers\CommentController::class, 'restore']);

//===========================================================================================================//
// Admin 
Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/blogs', [\App\Http\Controllers\AdminController::class, 'blogs'])->name('admin.blogs');
Route::get('/admin/comments', [\App\Http\Controllers\AdminController::class, 'comments'])->name('admin.comments');