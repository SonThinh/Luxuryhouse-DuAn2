<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/place', [Controllers\HomeController::class, 'index'])->name('place');
Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'CheckLoginUser'], function () {
    Route::get('/login', [Controllers\HomeController::class, 'login'])->name('login');
    Route::post('/login', [Controllers\HomeController::class, 'postLogin'])->name('login');
    Route::get('/register', [Controllers\HomeController::class, 'register'])->name('register');
    Route::post('/register', [Controllers\HomeController::class, 'postRegister'])->name('register');
});
Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'CheckLogoutUser'], function () {
    Route::get('/profile/{id}', [Controllers\MemberController::class, 'showProfile'])->name('showProfile');
    Route::post('/edit-user/{id}', [Controllers\MemberController::class, 'updateUser'])->name('updateUser');
    Route::get('/edit-pass/{id}', [Controllers\MemberController::class, 'showViewUpdatePass'])->name('showViewUpdatePass');
    Route::post('/edit-pass/{id}', [Controllers\MemberController::class, 'updatePass'])->name('updatePass');
    Route::get('/register-host/{id}', [Controllers\HostController::class, 'showViewRegisterHost'])->name('host');
    Route::post('/register-host/{id}', [Controllers\HostController::class, 'postRegisterHost'])->name('host');
    Route::group(['prefix' => 'host', 'as' => 'host.'], function () {
        Route::get('/dashboard/{id}',[App\Http\Controllers\HostController::class,'ViewDashboard'])->name('showDashboard');
        Route::get('/dashboard/{id}/add-house',[App\Http\Controllers\HostController::class,'viewAddHouse'])->name('addHouse');
        Route::post('/dashboard/{id}/add-house',[App\Http\Controllers\HostController::class,'postAddHouse'])->name('addHouse');
        Route::post('/select-district',[Controllers\HostController::class,'selectDistrict'])->name('selectDistrict');
    });
});

Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
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
        });

        Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
            Route::get('/dashboard-city', [Controllers\Admin\CityController::class, 'showDashboard'])->name('showDashboard');

            Route::get('/cities', [Controllers\Admin\CityController::class, 'showCities'])->name('showCities');
            Route::get('/add-city', [Controllers\Admin\CityController::class, 'showViewAddCities'])->name('addCities');
            Route::post('/add-city', [Controllers\Admin\CityController::class, 'postAddCities'])->name('addCities');
            Route::get('/edit-city/{id}', [Controllers\Admin\CityController::class, 'showViewEditCities'])->name('editCities');
            Route::post('/edit-city/{id}', [Controllers\Admin\CityController::class, 'postEditCities'])->name('editCities');
            Route::get('/delete-city/{id}', [Controllers\Admin\CityController::class, 'deleteCity'])->name('deleteCity');

            Route::get('/areas',[Controllers\Admin\CityController::class, 'showAreas'])->name('showAreas');
            Route::get('/add-area',[Controllers\Admin\CityController::class, 'showViewAddAreas'])->name('addAreas');
            Route::post('/add-area',[Controllers\Admin\CityController::class, 'addAreas'])->name('addAreas');
            Route::get('/edit-area/{id}',[Controllers\Admin\CityController::class, 'showViewEditAreas'])->name('editAreas');
            Route::post('/edit-area/{id}',[Controllers\Admin\CityController::class, 'editAreas'])->name('editAreas');
            Route::get('/delete-area/{id}',[Controllers\Admin\CityController::class, 'deleteAreas'])->name('deleteAreas');
        });
        Route::group(['prefix'=>'house','as'=>'house.'],function (){
            Route::get('/dashboard',[Controllers\Admin\HouseController::class,'showDashboardHouse'])->name('showDashboard');
            Route::get('/house-manage',[Controllers\Admin\HouseController::class,'showViewHouses'])->name('showViewHouses');

            Route::get('/house-type',[Controllers\Admin\HouseController::class,'showViewType'])->name('showViewType');
            Route::get('/house-type/add',[Controllers\Admin\HouseController::class,'showViewAddType'])->name('addType');
            Route::post('/house-type/add',[Controllers\Admin\HouseController::class,'addType'])->name('addType');
            Route::get('/house-type/edit/{id}',[Controllers\Admin\HouseController::class,'showViewEditType'])->name('editType');
            Route::post('/house-type/edit/{id}',[Controllers\Admin\HouseController::class,'editType'])->name('editType');
            Route::get('/house-type/delete/{id}', [Controllers\Admin\HouseController::class, 'deleteType'])->name('deleteType');

            Route::get('/house-utility',[Controllers\Admin\HouseController::class,'showViewUtility'])->name('showViewUtility');
            Route::get('/house-utility/add',[Controllers\Admin\HouseController::class,'showViewAddUtility'])->name('addUtility');
            Route::post('/house-utility/add',[Controllers\Admin\HouseController::class,'addUtility'])->name('addUtility');
            Route::get('/house-utility/edit/{id}',[Controllers\Admin\HouseController::class,'showViewEditUtility'])->name('editUtility');
            Route::post('/house-utility/edit/{id}',[Controllers\Admin\HouseController::class,'editUtility'])->name('editUtility');
            Route::get('/house-utility/delete/{id}', [Controllers\Admin\HouseController::class, 'deleteUtility'])->name('deleteUtility');

            Route::get('/trip-type',[Controllers\Admin\HouseController::class,'showViewTripType'])->name('showViewTripType');
            Route::get('/trip-type/add',[Controllers\Admin\HouseController::class,'showViewAddTripType'])->name('addTripType');
            Route::post('/trip-type/add',[Controllers\Admin\HouseController::class,'addTripType'])->name('addTripType');
            Route::get('/trip-type/edit/{id}',[Controllers\Admin\HouseController::class,'showViewEditTripType'])->name('editTripType');
            Route::post('/trip-type/edit/{id}',[Controllers\Admin\HouseController::class,'editTripType'])->name('editTripType');
            Route::get('/trip-type/delete/{id}', [Controllers\Admin\HouseController::class, 'deleteTripType'])->name('deleteTripType');


        });
    });
});
