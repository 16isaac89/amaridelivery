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
