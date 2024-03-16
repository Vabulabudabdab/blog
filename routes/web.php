<?php


use Illuminate\Support\Facades\Auth;
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


Route::group(['namespace' => 'Main'], function() {
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'home_index'])->name('main.index');
});

Route::group(['prefix' => 'posts'], function() {
    Route::get('/home', [App\Http\Controllers\Post\IndexController::class, 'home_index'])->name('post.index');
    Route::get('/{post}', [App\Http\Controllers\Post\ShowController::class, 'show_index'])->name('post.show');
});

Route::get('/register', [App\Http\Controllers\Controller::class, 'registerUser'])->name('auth.register');

Route::get('/login', [App\Http\Controllers\Controller::class, 'loginUser'])->name('login');

Route::get('/verify', [App\Http\Controllers\Controller::class, 'verification'])->name('verify');

Route::post('/reg', [App\Http\Controllers\User\Users\RegisterController::class, 'registerUser'])->name('registerUser');

Route::post('/', [App\Http\Controllers\User\Users\LoginController::class, 'login'])->name('loginUser');

Route::get('/logout', [App\Http\Controllers\User\Users\LoginController::class, 'logout'])->name('logout');

//lc
Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'verified']], function() {

    Route::get('/', [App\Http\Controllers\Personal\Main\IndexController::class, 'personalArea'])->name('personal.main.page');

    Route::group(['prefix' => 'liked'], function() {
        Route::get('/', [App\Http\Controllers\Personal\Liked\LikedController::class, 'liked'])->name('personal.liked.index');
        Route::delete('/{post}', [App\Http\Controllers\Personal\Liked\DeleteController::class, 'delete'])->name('personal.liked.delete');
    });

    Route::group(['prefix' => 'comments'], function() {
        Route::get('/', [App\Http\Controllers\Personal\Comments\CommentsController::class, 'comments'])->name('personal.comments.index');
        Route::get('/{comment}/edit', [App\Http\Controllers\Personal\Comments\EditController::class, 'editComment'])->name('personal.comments.edit');
        Route::patch('/{comment}', [App\Http\Controllers\Personal\Comments\UpdateController::class, 'updateComment'])->name('personal.comments.update');
        Route::delete('/{comment}', [App\Http\Controllers\Personal\Comments\DeleteController::class, 'deleteComment'])->name('personal.comments.delete');
    });

});

//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin', 'verified']], function() {

    Route::get('/', [App\Http\Controllers\Admin\Main\IndexController::class, 'admin_panel'])->name('admin.main.page');

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Post\IndexController::class, 'posts'])->name('admin.post.index');
        Route::get('/create', [App\Http\Controllers\Admin\Post\CreateController::class, 'create'])->name('admin.post.create');
        Route::post('/', [App\Http\Controllers\Admin\Post\StoreController::class, 'store'])->name('admin.post.store');
        Route::get('/{post}', [App\Http\Controllers\Admin\Post\ShowController::class, 'show'])->name('admin.post.show');
        Route::get('/{post}/edit', [App\Http\Controllers\Admin\Post\EditController::class, 'edit'])->name('admin.post.edit');
        Route::post('/{post}', [App\Http\Controllers\Admin\Post\UpdateController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [App\Http\Controllers\Admin\Post\DeleteController::class, 'delete'])->name('admin.post.delete');

    });


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
        Route::get('/', [App\Http\Controllers\Admin\Tag\IndexController::class, 'tags'])->name('admin.tag.index');
        Route::get('/create', [App\Http\Controllers\Admin\Tag\CreateController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [App\Http\Controllers\Admin\Tag\StoreController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}', [App\Http\Controllers\Admin\Tag\ShowController::class, 'show'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [App\Http\Controllers\Admin\Tag\EditController::class, 'edit'])->name('admin.tag.edit');
        Route::post('/{tag}', [App\Http\Controllers\Admin\Tag\UpdateController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [App\Http\Controllers\Admin\Tag\DeleteController::class, 'delete'])->name('admin.tag.delete');

    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [App\Http\Controllers\Admin\User\IndexController::class, 'users'])->name('admin.user.index');
        Route::get('/create', [App\Http\Controllers\Admin\User\CreateController::class, 'create'])->name('admin.user.create');
        Route::post('/', [App\Http\Controllers\Admin\User\StoreController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [App\Http\Controllers\Admin\User\ShowController::class, 'show'])->name('admin.user.show');
        Route::get('/{user}/edit', [App\Http\Controllers\Admin\User\EditController::class, 'edit'])->name('admin.user.edit');
        Route::post('/{user}', [App\Http\Controllers\Admin\User\UpdateController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [App\Http\Controllers\Admin\User\DeleteController::class, 'delete'])->name('admin.user.delete');

    });
});

Auth::routes(['verify' => true]);
