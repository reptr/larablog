<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [BlogsController::class, 'index']);

// referensi -> https://laravel.com/docs/8.x/routing
Route::prefix('blogs')->group(function () {
    Route::get('/', [BlogsController::class, 'index'])->name('blogs');
    Route::get('/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/store', [BlogsController::class, 'store'])->name('blogs.store');
    // keep trashed routes
    Route::get('/trash', [BlogsController::class, 'trash'])->name('blogs.trash');
    Route::get('/trash/{id}/restore', [BlogsController::class, 'restore'])->name('blogs.restore');
    Route::delete('/trash/{id}/permanent-delete', [BlogsController::class, 'permanentDelete'])->name('blogs.permanent-delete');

    Route::get('/{id}', [BlogsController::class, 'show'])->name('blogs.show');
    Route::get('/{id}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::patch('/{id}/update', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/{id}/delete', [BlogsController::class, 'delete'])->name('blogs.delete');
});

Route::prefix('admin')->group(function () {
    // Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware('admin');
    Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware(['admin', 'auth']);
});

Route::resource('categories', CategoryController::class);
