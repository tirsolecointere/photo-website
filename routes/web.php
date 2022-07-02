<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Models\File;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function() {
    Route::name('admin.')->group(function() {

        Route::get('/', [AdminHomeController::class, 'index'])->name('home');
        Route::resource('/files', FileController::class)->names('files');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    });
});

require __DIR__.'/auth.php';
