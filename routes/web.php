<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/place', [Controllers\HomeController::class, 'index'])->name('place');
Route::get('/search', [Controllers\SearchController::class, 'searchView'])->name('search');
Route::get('/search-city/name', [Controllers\SearchController::class, 'searchCityByName']);
Route::get('/search-house/name', [Controllers\SearchController::class, 'searchHouseByName']);
Route::get('/search-house', [Controllers\SearchController::class, 'searchHouses'])->name('searchHouses');

Route::group(['prefix' => 'place', 'as' => 'places.'], function () {
    Route::get('/{id}', [Controllers\PlaceController::class, 'viewCityDetail'])->name('CityDetail');
    Route::get('/house/{id}', [Controllers\PlaceController::class, 'viewHouseDetail'])->name('HouseDetail');
    Route::get('/{id}/search-house', [Controllers\PlaceController::class, 'searchHousesWithCityID'])->name('searchHousesWithCityID');
});
Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'CheckLoginUser'], function () {
    Route::get('/login', [Controllers\HomeController::class, 'login'])->name('login');
    Route::post('/login', [Controllers\HomeController::class, 'postLogin'])->name('login');
    Route::get('/register', [Controllers\HomeController::class, 'register'])->name('register');
    Route::post('/register', [Controllers\HomeController::class, 'postRegister'])->name('register');
});
Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'CheckLogoutUser'], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/{id}', [Controllers\MemberController::class, 'showDashboard'])->name('showDashboard');
        Route::group(['prefix' => 'booking', 'as' => 'booking-profile.'], function () {
            Route::get('/{id}', [Controllers\MemberController::class, 'showProfileBooking'])->name('showProfileBooking');
            Route::get('/user/{id}/booking-detail/{code}', [Controllers\MemberController::class, 'bookingDetail'])->name('bookingDetail');
        });
        Route::get('/delete-booking/{id}', [Controllers\MemberController::class, 'deleteBooking'])->name('deleteBooking');
        Route::post('/edit-user/{id}', [Controllers\MemberController::class, 'updateUser'])->name('updateUser');
        Route::get('/edit-pass/{id}', [Controllers\MemberController::class, 'showViewUpdatePass'])->name('showViewUpdatePass');
        Route::post('/edit-pass/{id}', [Controllers\MemberController::class, 'updatePass'])->name('updatePass');
        Route::get('/pay-history/{id}', [Controllers\MemberController::class, 'showViewPayHistory'])->name('showViewPayHistory');
    });
    Route::post('{id}/booking/{code}/comment', [Controllers\MemberController::class, 'postComment'])->name('postComment');
    Route::get('/register-host/{id}', [Controllers\HostController::class, 'showViewRegisterHost'])->name('host');
    Route::post('/register-host/{id}', [Controllers\HostController::class, 'postRegisterHost'])->name('host');

    Route::group(['prefix' => 'host', 'as' => 'host.'], function () {
        Route::get('/dashboard/{id}', [Controllers\HostController::class, 'ViewDashboard'])->name('showDashboard');
        Route::post('/dashboard/{id}/add-house', [Controllers\HostController::class, 'postAddHouse'])->name('addHouse');
        Route::post('/select-district', [Controllers\HostController::class, 'selectDistrict'])->name('selectDistrict');
        Route::get('/house/{id}', [Controllers\HostController::class, 'ViewHouse'])->name('ViewHouse');
        Route::get('/change-house-status', [Controllers\HostController::class, 'changeHouseStatus'])->name('changeStatus');
        Route::post('/house/{id}/edit', [Controllers\HostController::class, 'editHouse'])->name('editHouse');
        Route::get('/house/{id}/delete', [Controllers\HostController::class, 'deleteHouse'])->name('deleteHouse');
        Route::get('/booking/{id}', [Controllers\HostController::class, 'viewBooking'])->name('viewBooking');
        Route::get('/change-booking', [Controllers\HostController::class, 'changeStatusBooking'])->name('changeStatusBooking');
        Route::get('/show-bills/{id}', [Controllers\HostController::class, 'viewBills'])->name('viewBills');
    });
    Route::group(['prefix' => 'house', 'as' => 'house.'], function () {
        Route::post('/booking-house/{id}', [Controllers\OrderController::class, 'showPrice'])->name('showPrice');
        Route::post('/send-bill', [Controllers\OrderController::class, 'AddBill'])->name('AddBill');
    });
    Route::get('/booking-complete/{code}', [Controllers\OrderController::class, 'showViewBookingComplete'])->name('showViewBookingComplete');
    Route::get('/pay/{code}', [Controllers\OrderController::class, 'showPayView'])->name('showPayView');
    Route::get('/pay/{code}', [Controllers\OrderController::class, 'showPayView'])->name('showPayView');
    Route::get('/comment/house{id}', [Controllers\MemberController::class, 'comment'])->name('comment');
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
        Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
            Route::get('/events', [Controllers\Admin\SliderController::class, 'showViewEvent'])->name('showViewEvent');
            Route::get('/add-event', [Controllers\Admin\SliderController::class, 'showViewAddEvent'])->name('addEvent');
            Route::post('/add-event', [Controllers\Admin\SliderController::class, 'addEvent'])->name('addEvent');
            Route::get('/edit-event/{id}', [Controllers\Admin\SliderController::class, 'showViewEditEvent'])->name('editEvent');
            Route::post('/edit-event/{id}', [Controllers\Admin\SliderController::class, 'editEvent'])->name('editEvent');
            Route::get('/delete-event/{id}', [Controllers\Admin\SliderController::class, 'deleteEvent'])->name('deleteEvent');
        });
        Route::group(['prefix' => 'city', 'as' => 'city.'], function () {
            Route::get('/cities', [Controllers\Admin\CityController::class, 'showCities'])->name('showCities');
            Route::get('/add-city', [Controllers\Admin\CityController::class, 'showViewAddCities'])->name('addCities');
            Route::post('/add-city', [Controllers\Admin\CityController::class, 'postAddCities'])->name('addCities');
            Route::get('/edit-city/{id}', [Controllers\Admin\CityController::class, 'showViewEditCities'])->name('editCities');
            Route::post('/edit-city/{id}', [Controllers\Admin\CityController::class, 'postEditCities'])->name('editCities');
            Route::get('/delete-city/{id}', [Controllers\Admin\CityController::class, 'deleteCity'])->name('deleteCity');

            Route::get('/areas', [Controllers\Admin\CityController::class, 'showAreas'])->name('showAreas');
            Route::get('/add-area', [Controllers\Admin\CityController::class, 'showViewAddAreas'])->name('addAreas');
            Route::post('/add-area', [Controllers\Admin\CityController::class, 'addAreas'])->name('addAreas');
            Route::get('/edit-area/{id}', [Controllers\Admin\CityController::class, 'showViewEditAreas'])->name('editAreas');
            Route::post('/edit-area/{id}', [Controllers\Admin\CityController::class, 'editAreas'])->name('editAreas');
            Route::get('/delete-area/{id}', [Controllers\Admin\CityController::class, 'deleteAreas'])->name('deleteAreas');
        });
        Route::group(['prefix' => 'house', 'as' => 'house.'], function () {
            Route::get('/house-manage', [Controllers\Admin\HouseController::class, 'showViewHouses'])->name('showViewHouses');
            Route::get('/delete-house/{id}', [Controllers\Admin\HouseController::class, 'deleteHouse'])->name('deleteHouse');
            Route::get('/change-status', [Controllers\Admin\HouseController::class, 'changeStatus'])->name('changeStatus');

            Route::get('/house-type', [Controllers\Admin\HouseController::class, 'showViewType'])->name('showViewType');
            Route::get('/house-type/add', [Controllers\Admin\HouseController::class, 'showViewAddType'])->name('addType');
            Route::post('/house-type/add', [Controllers\Admin\HouseController::class, 'addType'])->name('addType');
            Route::get('/house-type/edit/{id}', [Controllers\Admin\HouseController::class, 'showViewEditType'])->name('editType');
            Route::post('/house-type/edit/{id}', [Controllers\Admin\HouseController::class, 'editType'])->name('editType');
            Route::get('/house-type/delete/{id}', [Controllers\Admin\HouseController::class, 'deleteType'])->name('deleteType');

            Route::get('/house-utility', [Controllers\Admin\HouseController::class, 'showViewUtility'])->name('showViewUtility');
            Route::get('/house-utility/add', [Controllers\Admin\HouseController::class, 'showViewAddUtility'])->name('addUtility');
            Route::post('/house-utility/add', [Controllers\Admin\HouseController::class, 'addUtility'])->name('addUtility');
            Route::get('/house-utility/edit/{id}', [Controllers\Admin\HouseController::class, 'showViewEditUtility'])->name('editUtility');
            Route::post('/house-utility/edit/{id}', [Controllers\Admin\HouseController::class, 'editUtility'])->name('editUtility');
            Route::get('/house-utility/delete/{id}', [Controllers\Admin\HouseController::class, 'deleteUtility'])->name('deleteUtility');

            Route::get('/trip-type', [Controllers\Admin\HouseController::class, 'showViewTripType'])->name('showViewTripType');
            Route::get('/trip-type/add', [Controllers\Admin\HouseController::class, 'showViewAddTripType'])->name('addTripType');
            Route::post('/trip-type/add', [Controllers\Admin\HouseController::class, 'addTripType'])->name('addTripType');
            Route::get('/trip-type/edit/{id}', [Controllers\Admin\HouseController::class, 'showViewEditTripType'])->name('editTripType');
            Route::post('/trip-type/edit/{id}', [Controllers\Admin\HouseController::class, 'editTripType'])->name('editTripType');
            Route::get('/trip-type/delete/{id}', [Controllers\Admin\HouseController::class, 'deleteTripType'])->name('deleteTripType');
        });
        Route::group(['prefix' => 'bill', 'as' => 'bill.'], function () {
            Route::get('/', [Controllers\Admin\BillController::class, 'showBills'])->name('showBills');
        });
        Route::group(['prefix' => 'host', 'as' => 'host.'], function () {
            Route::get('/', [Controllers\Admin\UserController::class, 'showHosts'])->name('showHosts');
            Route::get('/change-status', [Controllers\Admin\UserController::class, 'changeStatus'])->name('changeStatus');
        });
    });
});


