<?php

use Illuminate\Support\Facades\Route;
use App\Services\DataCheck;
use App\Facades\DataService;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\IndexController as AdminIndexController;

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

Route::get('/test', function () {
    //$ext = new DataCheck();
    dump(DataService::isValid('11/11/2118'));
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminIndexController::class)->name('index');
    Route::resource('/news', AdminNewsController::class);
    Route::get('/category', [AdminCategoryController::class, 'index'])->name('category');
});

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');


