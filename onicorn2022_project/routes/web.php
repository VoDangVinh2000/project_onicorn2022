<?php

use App\Http\Controllers\Menus\MenusController;
use App\Http\Controllers\News\NewsController;
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
Route::get('/admin-dashboard', [NewsController::class, 'index']);

//Footer
Route::get('/admin-footer', [FooterController::class, 'index']);

//Menus

Route::get('/admin-menus', [MenusController::class, 'index'])->name('admin_menus');
Route::post('/admin-menus-add', [MenusController::class, 'store'])->name('add_menus');
Route::post('/admin-menus-update/{id}', [MenusController::class, 'update'])->name('update_menus');
Route::delete('/admin-menus-destroy/{id}', [MenusController::class, 'destroy'])->name('destroy_menus');