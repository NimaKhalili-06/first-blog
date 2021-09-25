<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'Index']);
Route::get('contact',[HomeController::class,"Contact"]);
Route::post('contact/send',[HomeController::class,"SendContact"]);
Route::get('post/{id}',[HomeController::class,"PostIndex"]);
Route::post('comment/send',[HomeController::class,"SendComment"]);
Route::get('/posts/all', [HomeController::class, 'AllPosts']);
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('profile', [ProfileController::class, 'Index']);
    Route::get('profile/edit', [ProfileController::class, 'Edit']);
    Route::post('profile/update', [ProfileController::class, 'Update']);
    Route::get('logout', function () {
        Auth::logout();
        return redirect('/');
    });
    Route::prefix('post')->group(function () {
        Route::get('/all', [PostController::class, 'Index']);
        Route::get('/add', [PostController::class, 'Create']);
        Route::post('/insert', [PostController::class, 'Insert']);
        Route::get('/edit/{id}', [PostController::class, 'Edit'])->name('post.edit');
        Route::get('/delete/{id}', [PostController::class, 'Delete'])->name('post.delete');
        Route::get('/toggle/{id}', [PostController::class, "ToggleActive"]);
        Route::post('/update/{id}', [PostController::class, 'Update']);
    });
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, "Index"]);
        Route::post('/insert', [CategoryController::class, "Insert"]);
        Route::get('/edit/{id}', [CategoryController::class, "Edit"])->name('category.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'Delete'])->name('category.delete');
        Route::post('update/{id}', [CategoryController::class, "Update"]);
    });
    Route::prefix('comment')->group(function () {
        Route::get('/', [CommentController::class, 'Index']);
        Route::get('/delete/{id}', [CommentController::class, 'Delete'])->name('comment.delete');
    });
    Route::prefix('message')->group(function () {
        Route::get('/', [MessageController::class, 'Index']);
        Route::get('delete/{id}', [MessageController::class, 'Delete'])->name('message.delete');
    });
    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'Index']);
        Route::get('/edit', [SettingController::class, 'Edit']);
        Route::post('/update', [SettingController::class, 'Update']);
    });
});

require __DIR__ . '/auth.php';
