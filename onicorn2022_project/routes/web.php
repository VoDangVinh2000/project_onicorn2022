<?php

use App\Http\Controllers\Menus\MenusController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Banner\BannerController;
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
//News
Route::get('/admin-dashboard', [NewsController::class, 'index']);

//Footer
Route::get('/admin-footer', [FooterController::class, 'index']);

//Menus
Route::get('/admin-menus',[MenusController::class,'index']);
Route::post('/admin-menus-add',[MenusController::class,'store'])->name('add_menus');


//Banners
Route::resource('/admin-banner','App\Http\Controllers\Banner\BannerController');


//Page

Route::resource('page','App\Http\Controllers\Page\PageController');
Route::get('show-head/{id}',[PageController::class,'showHead']);