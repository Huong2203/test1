<?php

use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::prefix('categories')
            ->as('categories.')
            ->group(function () {
                Route::get('/',                 [CategoryController::class, 'index'])->name('index');
                Route::get('create',            [CategoryController::class, 'create'])->name('create');
                Route::post('store',            [CategoryController::class, 'store'])->name('store');
                Route::get('show/{id}',         [CategoryController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [CategoryController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [CategoryController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [CategoryController::class, 'destroy'])->name('destroy');
            });

        // Page Tag
        Route::prefix('tags')
            ->as('tags.')
            ->group(function () {
                Route::get('',                  [TagController::class, 'index'])->name('index');
                Route::get('create',            [TagController::class, 'create'])->name('create');
                Route::post('store',            [TagController::class, 'store'])->name('store');
                Route::get('show/{id}',         [TagController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [TagController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [TagController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [TagController::class, 'destroy'])->name('destroy');
            });
        // End Page Tag

        // Page Articles
        Route::prefix('articles')
            ->as('articles.')
            ->group(function () {
                Route::get('',                  [ArticlesController::class, 'index'])->name('index');
                Route::get('create',            [ArticlesController::class, 'create'])->name('create');
                Route::post('store',            [ArticlesController::class, 'store'])->name('store');
                Route::get('show/{id}',         [ArticlesController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [ArticlesController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [ArticlesController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [ArticlesController::class, 'destroy'])->name('destroy');
                Route::post('upload',      [ArticlesController::class, 'upload'])->name('upload');
            });
        // End Page Articles

        // Page User
        Route::prefix('users')
            ->as('users.')
            ->group(function () {
                Route::get('',                  [UserController::class, 'index'])->name('index');
                Route::get('create',            [UserController::class, 'create'])->name('create');
                Route::post('store',            [UserController::class, 'store'])->name('store');
                Route::get('show/{id}',         [UserController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [UserController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [UserController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [UserController::class, 'destroy'])->name('destroy');
            });
        // End Page User

        // Page Administration
        Route::prefix('administration')
            ->as('administration.')
            ->group(function () {
                Route::get('',                  [AdministrationController::class, 'index'])->name('index');
                Route::get('create',            [AdministrationController::class, 'create'])->name('create');
                Route::post('store',            [AdministrationController::class, 'store'])->name('store');
                Route::get('show/{id}',         [AdministrationController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [AdministrationController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [AdministrationController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [AdministrationController::class, 'destroy'])->name('destroy');
            });
        // End Page Administration
    });
