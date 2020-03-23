<?php

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
use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/place', [Controllers\HomeController::class,'index'])->name('place');
Route::group(['prefix'=>'user','as'=>'users.'],function (){
    Route::get('/login',[Controllers\HomeController::class,'login'])->name('login');
    Route::post('/login',[Controllers\HomeController::class,'postLogin'])->name('login');
    Route::get('/register',[Controllers\HomeController::class,'register'])->name('register');
    Route::post('/register',[Controllers\HomeController::class,'postRegister'])->name('register');
    Route::get('/logout',[Controllers\HomeController::class,'logout'])->name('logout');
});

Route::group(['namespace'=>'Admin'],function (){
   Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'CheckLogIn'],function (){
       Route::get('/login',[Controllers\Admin\AdminController::class,'getLogin'])->name('login');
       Route::post('/login',[Controllers\Admin\AdminController::class,'postLogin'])->name('login');
   });
   Route::get('/logout',[Controllers\Admin\AdminController::class,'logout'])->name('logout');
   Route::group(['prefix'=>'admin','as'=>'admin.','middleware' => 'CheckLogOut'],function(){
       Route::get('/dashboard',[Controllers\Admin\AdminController::class,'getViewAdminDashboard'])->name('dashboard');

       Route::group(['prefix'=>'user','as'=>'user.'],function (){
           Route::get('/',[Controllers\Admin\UserController::class,'showUsers'])->name('showUsers');
       });

       Route::group(['prefix'=>'city','as'=>'city.'],function (){
           Route::get('/',[Controllers\Admin\CityController::class,'showCities'])->name('showCities');
           Route::get('/add-city',[Controllers\Admin\CityController::class,'addCities'])->name('addCities');
           Route::post('/add-city',[Controllers\Admin\CityController::class,'postAddCities'])->name('addCities');
       });
   });
});
