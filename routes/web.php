<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostResource;
use App\Models\Post;

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

// Route::get('/', 'PageController@index')->name('home');
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');


Route::get('posts/{post}', function (Post $post) {
    return new PostResource(Post::find($post));
});

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::resource('products', ProductController::class)->only(['index','show']);
Route::resource('posts', PostController::class)->only(['index','show'])->parameter('post','post:slug');

Route::get('categories/{category:slug}/posts', 'CategoryController@posts')->name('categories.posts');

Route::get('tags/{tag:slug}/posts', 'TagController@posts')->name('tags.posts');

Auth::routes();


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    
    Route::get('/', 'HomeController@index')->name('index');

    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('contacts', ContactController::class)->only(['index','show','destroy']);
});

Route::get('/', function(){
    return view('welcome');
});
