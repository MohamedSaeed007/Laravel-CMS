<?php

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


use App\Http\Controllers\Blog\PostsController;

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/posts/{post}', [PostsController::class,'show'])->name('blog.show');
Route::get('/blog/categories/{category}', [PostsController::class,'category'])->name('blog.category');
Route::get('/blog/tags/{tag}', [PostsController::class,'tag'])->name('blog.tag');

Auth::routes();

Route::middleware('auth')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/tags','TagsController');
    Route::resource('/categories','CategoriesController');
    // this route must be before the resource route
    Route::get('posts/trashed','PostsController@trashed')->name('posts.trashed');
    Route::put('posts/{post}/restore','PostsController@restore')->name('posts.restore');
    Route::resource('/posts','PostsController');
});

Route::middleware('admin')->group(function (){
    Route::get('/users','UsersController@index')->name('users.index');
    Route::get('/users/edit-profile','UsersController@edit')->name('users.edit-profile');
    Route::put('/users/update-profile','UsersController@update')->name('users.update-profile');
    Route::post('/users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
});
