<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Services\UploadService;
use App\Models\Product;
use App\Http\Controllers\CategoriesController;

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


Route::prefix('admin/users')->group(function() {
        #LoginController
        Route::controller(LoginController::class)->group(function () {

                Route::get('login','index')-> name('login');
                Route::post('login/store', 'store');
        });

});
Route::middleware(['auth'])->group(function(){


    #admin
    Route::prefix('admin')->group(function(){
        #MainController
        Route::controller(MainController::class)->group(function () {
            Route::get('/','index')-> name('admin');
            Route::get('main','index');
        });

        #menus
        Route::prefix('menus')->group(function(){
            #MenuController
            Route::controller(MenuController::class) ->group(function(){
                Route::get('add','create');
                Route::post('add','store');
                Route::get('list','index')->name('menu.list');
                Route::delete('destroy','destroy');
                Route::get('edit/{menu}','show');
                Route::post('edit/{menu}','update');

            });
        });
        #Product
        Route::prefix('products')->group(function () {
            Route::get('add',[ProductController::class,'create']);
        });

        #Upload
        Route::post('upload/services',[UploadController::class, 'store']);
        Route::get('/',[DashboardController::class, 'index']);

    });
});

Route::get('/', function () {
    $title = "Hoc lap trinh tren unicode";

    return view('home',[
        'title' =>$title ,
    ]);
});
Route::get('categories/add', [CategoriesController::class,'index']) ->
name('categories');
Route::post('categories/add', [CategoriesController::class,'create']) ->
name('categories.add');



Route::get('upload',[CategoriesController::class,'show']);
Route::post('upload',[CategoriesController::class,'update'])->name('Categories.upload');