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

Route::get('/place', [Controllers\HomeController::class, 'index'])->name('place');
Route::group(['prefix'=>'user','as'=>'users.','middleware'=>'CheckLoginUser'],function (){
    Route::get('/login', [Controllers\HomeController::class, 'login'])->name('login');
    Route::post('/login', [Controllers\HomeController::class, 'postLogin'])->name('login');
    Route::get('/register', [Controllers\HomeController::class, 'register'])->name('register');
    Route::post('/register', [Controllers\HomeController::class, 'postRegister'])->name('register');
});
Route::group(['prefix' => 'user', 'as' => 'users.','middleware' => 'CheckLogoutUser'], function () {
    Route::get('/profile/{id}', [Controllers\MemberController::class, 'showProfile'])->name('showProfile');
    Route::post('/edit-user/{id}', [Controllers\MemberController::class, 'updateUser'])->name('updateUser');
    Route::get('/edit-pass/{id}', [Controllers\MemberController::class, 'showViewUpdatePass'])->name('showViewUpdatePass');
    Route::post('/edit-pass/{id}', [Controllers\MemberController::class, 'updatePass'])->name('updatePass');
});
Route::group(['prefix'=>'user','as'=>'users.'],function (){
    Route::get('/logout', [Controllers\HomeController::class, 'logout'])->name('logout');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'CheckLogIn'], function () {
        Route::get('/login', [Controllers\Admin\AdminController::class, 'getLogin'])->name('login');
        Route::post('/login', [Controllers\Admin\AdminController::class, 'postLogin'])->name('login');
    });
    Route::get('/logout', [Controllers\Admin\AdminController::class, 'logout'])->name('logout');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'CheckLogOut'], function () {
        Route::get('/dashboard', [Controllers\Admin\AdminController::class, 'getViewAdminDashboard'])->name('dashboard');

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [Controllers\Admin\UserController::class, 'showUsers'])->name('showUsers');
            Route::get('/edit-user/{id}', [Controllers\Admin\UserController::class, 'showViewEditUser'])->name('editUsers');
            Route::post('/edit-user/{id}', [Controllers\Admin\UserController::class, 'postEditUser'])->name('editUsers');
        });

        Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
            Route::get('/', [Controllers\Admin\CityController::class, 'showCities'])->name('showCities');
            Route::get('/add-city', [Controllers\Admin\CityController::class, 'showViewAddCities'])->name('addCities');
            Route::post('/add-city', [Controllers\Admin\CityController::class, 'postAddCities'])->name('addCities');
            Route::get('/edit-city/{id}', [Controllers\Admin\CityController::class, 'showViewEditCities'])->name('editCities');
            Route::post('/edit-city/{id}', [Controllers\Admin\CityController::class, 'postEditCities'])->name('editCities');
            Route::get('/delete-city/{id}', [Controllers\Admin\CityController::class, 'deleteCity'])->name('deleteCity');
        });
    });
});
