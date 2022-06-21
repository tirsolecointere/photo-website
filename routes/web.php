<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\FileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Route::name('admin.')->group(function() {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource('/files', FileController::class)->names('files');

    });
});

require __DIR__.'/auth.php';
