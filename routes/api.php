<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Vehicle Category
    Route::apiResource('vehicle-categories', 'VehicleCategoryApiController');

    // Fleet
    Route::post('fleets/media', 'FleetApiController@storeMedia')->name('fleets.storeMedia');
    Route::apiResource('fleets', 'FleetApiController');

    // Driver
    Route::post('drivers/media', 'DriverApiController@storeMedia')->name('drivers.storeMedia');
    Route::apiResource('drivers', 'DriverApiController');

    // System Setting
    Route::apiResource('system-settings', 'SystemSettingApiController');

    // Customer
    Route::post('customers/media', 'CustomerApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomerApiController');

    // Addres
    Route::apiResource('addres', 'AddresApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');

    // Partner
    Route::apiResource('partners', 'PartnerApiController');

    // Partner User
    Route::apiResource('partner-users', 'PartnerUserApiController');

    // Route
    Route::apiResource('routes', 'RouteApiController');

    // Zone
    Route::apiResource('zones', 'ZoneApiController');

    // Zone Vehicle Category
    Route::apiResource('zone-vehicle-categories', 'ZoneVehicleCategoryApiController');

    // Place
    Route::apiResource('places', 'PlaceApiController');
});


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\vendor'], function () {
    // Register
    Route::post('partner/register', 'auth\RegisterController@register');
    Route::post('/login/partner', 'auth\LoginController@login');

    //order
    Route::post('partner/get/zones', 'OrderController@getzones');
    Route::post('/partner/save/order', 'OrderController@saveorder');
    Route::post('/partner/get/orders', 'OrderController@getorders');
    Route::post('/partner/cancel/order', 'OrderController@cancel');
    //save token
    Route::post('/partner/token', 'auth\RegisterController@savetoken');
    Route::post('/partner/change/profile', 'auth\RegisterController@changeimage');
    Route::post('/partner/change/profiledata', 'auth\ProfileController@profileedit');
    Route::post('/partner/change/profilephone', 'auth\ProfileController@editphone');
    Route::post('/partner/change/password', 'auth\ProfileController@editpassword');


});
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\driver'], function () {
    // Register
    Route::post('driver/register', 'auth\RegisterController@register');
    Route::post('/login/driver', 'auth\LoginController@login');

    //save token
    Route::post('/driver/token', 'auth\RegisterController@savetoken');

    //order
    Route::post('/driver/get/orders', 'OrderController@getorders');
    //order states
    Route::post('/driver/neworders', 'OrderController@neworders');
    Route::post('/driver/order/accept', 'OrderController@acceptorder');
    Route::post('/driver/order/reject', 'OrderController@rejectorder');
    Route::post('/driver/activeorders', 'OrderController@activeorders');
    Route::post('/driver/history', 'OrderController@history');

});
