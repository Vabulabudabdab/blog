<?php

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

Route::get('/', [App\Http\Controllers\Controller::class, 'index']);

Route::get('/home', [App\Http\Controllers\Controller::class, 'home']);

Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact']);

Route::get('/coming_soon', [App\Http\Controllers\Controller::class, 'coming_soon']);

Route::get('/404', [App\Http\Controllers\Controller::class, 'error_404']);

Route::get('/blog_single', [App\Http\Controllers\Controller::class, 'blog_single']);

Route::get('/blog', [App\Http\Controllers\Controller::class, 'blog']);

Route::get('/about', [App\Http\Controllers\Controller::class, 'about']);

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', [App\Http\Controllers\Admin\Main\IndexController::class, 'admin_panel']);

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Category\CategoryController::class, 'categories'])->name('admin.category.index');
        Route::get('/create', [App\Http\Controllers\Admin\Category\CreateController::class, 'create'])->name('admin.category.create');
        Route::post('/', [App\Http\Controllers\Admin\Category\StoreController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}', [App\Http\Controllers\Admin\Category\ShowController::class, 'show'])->name('admin.category.show');
        Route::get('/{category}/edit', [App\Http\Controllers\Admin\Category\EditController::class, 'edit'])->name('admin.category.edit');
        Route::post('/{category}', [App\Http\Controllers\Admin\Category\UpdateController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [App\Http\Controllers\Admin\Category\DeleteController::class, 'delete'])->name('admin.category.delete');

    });

    Route::group(['prefix' => 'Tag'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Tag\IndexController::class, 'categories'])->name('admin.tag.index');
        Route::get('/create', [App\Http\Controllers\Admin\Tag\CreateController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [App\Http\Controllers\Admin\Tag\StoreController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}', [App\Http\Controllers\Admin\Tag\ShowController::class, 'show'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [App\Http\Controllers\Admin\Tag\EditController::class, 'edit'])->name('admin.tag.edit');
        Route::post('/{tag}', [App\Http\Controllers\Admin\Tag\UpdateController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [App\Http\Controllers\Admin\Tag\DeleteController::class, 'delete'])->name('admin.tag.delete');

    });
});
