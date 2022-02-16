<?php

use Illuminate\Support\Facades\Route;
use App\Services\DataCheck;
use App\Facades\DataService;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
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


Route::get('/', function () {
    return view('news.index');
});
*/

Route::get('/', [NewsController::class, 'index'])->name('news.index');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::get('/', AdminIndexController::class)->name('index');
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/category', AdminCategoryController::class);
    });
});





Route::get('/news', [NewsController::class, 'news'])->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::get('/categories/{category}', [\App\Http\Controllers\admin\categoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
