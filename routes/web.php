<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\SliderController;

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


Route::get('/admin/user/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/user/login/store', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main', [LoginController::class, 'index']);
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::prefix('menus')->group(function () {
            Route::get('list', [MenuController::class, 'index']);
            Route::get('add', [MenuController::class, 'create']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::post('add/store', [MenuController::class, 'store']);
        });

        Route::prefix('sliders')->group(function () {
            Route::get('list', [SliderController::class, 'index']);
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add/store', [SliderController::class, 'store']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);

        });


        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
    });
});
