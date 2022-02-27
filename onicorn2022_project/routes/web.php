<?php

use App\Http\Controllers\Footer\FooterController;
use App\Http\Controllers\Menus\MenusController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Page\PageController;
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
Route::get('/admin-menus',[MenusController::class,'index']);
Route::post('/admin-menus-add',[MenusController::class,'store'])->name('add_menus');

//Pages
Route::get('/admin-page-list',[PageController::class,'list'])->name('admin_page_list');
Route::get('/admin-page-list/{id}',[PageController::class,'edit'])->name('admin_page_list_id');
Route::post('/admin-page-edit/{page_id}',[PageController::class,'save'])->name('admin-page-edit');
Route::post('/admin-page-banner-slide/{id}',[PageController::class,'show_slide_of_banner'])->name('show_slide_of_banner');
Route::post('/admin-page-tabs/{id}',[PageController::class,'show_head'])->name('show_head');
Route::get('/admin-page-delete/{id}',[PageController::class,'delete_page'])->name('admin_page_delete');
Route::get('/amdin-page-add',[PageController::class,'add_page_view'])->name('admin_page_add_view');
Route::post('/amdin-page-add',[PageController::class,'add_page'])->name('admin_page_add');
    //save data - pages


Route::get('/admin-menus', [MenusController::class, 'index'])->name('admin_menus');
Route::post('/admin-menus-add', [MenusController::class, 'store'])->name('add_menus');
Route::post('/admin-menus-update/{id}', [MenusController::class, 'update'])->name('update_menus');
Route::delete('/admin-menus-destroy/{id}', [MenusController::class, 'destroy'])->name('destroy_menus');
