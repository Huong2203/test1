<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesDetailController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\SearchController;
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

//Auth::routes();

Route::prefix('auth')
    ->group(function () {
        Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
        Route::post('login', [LoginController::class, 'login']);

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('register', [RegisterController::class, 'showFormRegister'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);
    });

Route::get('/', [HomeController::class, 'index'])->name('trangchu');
Route::get('category/{slug}', [CategoriesController::class, 'index'])->name('categories.articles');
Route::get('articles/{slug}', [ArticlesDetailController::class, 'detail'])->name('articles.detail');
Route::get('category/{slug_cate}/{slug_articles}', [ArticlesDetailController::class, 'index'])->name('categories.articles.detail');
Route::get('search', [SearchController::class, 'index'])->name('search');



