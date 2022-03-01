<?php

use App\Http\Controllers\Banner\BannerController;
use App\Http\Controllers\Head\HeadController;
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
Route::get('/admin-menus-edit/{id}', [MenusController::class, 'edit'])->name('edit_menus');


//News
Route::get('/admin-news', [NewsController::class, 'index'])->name('admin_news');
Route::post('/admin-news-add', [NewsController::class, 'store'])->name('add_new');
Route::get('/admin-news-update/{id}', [NewsController::class, 'edit'])->name('edit_new');
Route::post('/admin-news-update/{id}', [NewsController::class, 'update'])->name('update_new');
Route::delete('/admin-news-destroy/{id}', [NewsController::class, 'destroy'])->name('destroy_new');


//Head
Route::get('/admin-head', [HeadController::class, 'index'])->name('admin_head');
Route::post('/admin-head-add', [HeadController::class, 'store'])->name('add_head');
Route::delete('/admin-head-destroy/{id}', [HeadController::class, 'destroy'])->name('destroy_head');


//Banner
Route::get('/admin-banner', [BannerController::class, 'index'])->name('admin_banner');
Route::post('/admin-banner-add', [BannerController::class, 'store'])->name('add_banner');
Route::delete('/admin-banner-destroy/{id}', [BannerController::class, 'destroy'])->name('destroy_banner');