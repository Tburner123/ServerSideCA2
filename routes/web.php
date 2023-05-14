<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);
Route::get('tags/search', [TagsController::class, 'search'])->name('tags.search');
Auth::routes();
Route::resource('/search',App\Http\Controllers\SearchController::class );
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userTable', [App\Http\Controllers\AdminController::class, 'userTable'])->name('/userTable');
Route::resource('/comment',  App\Http\Controllers\CommentsController::class );
Route::resource('/users',UsersController::class);
Route::put('/change/{user}', [UsersController::class, 'update'])->name('change');
Route::middleware('admin.auth')->group(function () {
    Route::group(['prefix' => '/admin', 'as' => 'admin.',], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('/users', UsersController::class);
        Route::get('/users', [UsersController::class, 'filter'])->name('user.filter');
    });
});
