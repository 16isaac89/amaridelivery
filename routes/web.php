<?php

//Route::redirect('/', '/site/index');


Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@index')->name('front.index');
    Route::get('/about', 'SiteController@about')->name('front.about');
    Route::get('/faq', 'SiteController@faq')->name('front.faq');
    Route::get('/services', 'SiteController@services')->name('front.services');
    Route::get('/contact', 'SiteController@contact')->name('front.contact');
    Route::get('/privacy/policy', 'SiteController@privacy')->name('front.privacy');
    Route::get('/partner', 'SiteController@partner')->name('front.partner');
    Route::post('/partner/register', 'SiteController@partnerregister')->name('partner.front.register');
    Route::get('/site/payment', 'SiteController@paymentdone')->name('paymentdone.screen');

    //reset password vendor
Route::get('/vendor/password/reset','auth\ForgotPasswordController@showLinkReqForm')->name('site.vendorresetpwd');
Route::post('/vendor/password/email','auth\ForgotPasswordController@sendResLinkEmail')->name('site.vendorpwdemail');
Route::get('/vendor/password/reset/{token}','auth\ResetPasswordController@showResetForm')->name('site.vendortoken');
Route::post('/vendor/password/reset/post','auth\ResetPasswordController@reset')->name('site.vendorresetpwd.post');
//reset password driver
Route::get('/driver/password/reset','auth\ForgotPasswordController@showLinkReqForm')->name('site.driveresetpwd');
Route::post('/driver/password/email','auth\ForgotPasswordController@sendResLinkEmail')->name('site.driverpwdemail');
Route::get('/driver/password/reset/{token}','auth\ResetPasswordController@showResetForm')->name('site.drivertoken');
Route::post('/driver/password/reset/post','auth\ResetPasswordController@reset')->name('site.driverresetpwd.post');
});

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Vehicle Category

    Route::delete('vehicle-categories/destroy', 'VehicleCategoryController@massDestroy')->name('vehicle-categories.massDestroy');
    Route::post('vehicle-categories/media', 'VehicleCategoryController@storeMedia')->name('vehicle-categories.storeMedia');
    Route::post('vehicle-categories/parse-csv-import', 'VehicleCategoryController@parseCsvImport')->name('vehicle-categories.parseCsvImport');
    Route::post('vehicle-categories/process-csv-import', 'VehicleCategoryController@processCsvImport')->name('vehicle-categories.processCsvImport');
    Route::resource('vehicle-categories', 'VehicleCategoryController');

    // Fleet
    Route::delete('fleets/destroy', 'FleetController@massDestroy')->name('fleets.massDestroy');
    Route::post('fleets/media', 'FleetController@storeMedia')->name('fleets.storeMedia');
    Route::post('fleets/ckmedia', 'FleetController@storeCKEditorImages')->name('fleets.storeCKEditorImages');
    Route::post('fleets/parse-csv-import', 'FleetController@parseCsvImport')->name('fleets.parseCsvImport');
    Route::post('fleets/process-csv-import', 'FleetController@processCsvImport')->name('fleets.processCsvImport');
    Route::resource('fleets', 'FleetController');

    // Driver
    Route::delete('drivers/destroy', 'DriverController@massDestroy')->name('drivers.massDestroy');
    Route::post('drivers/media', 'DriverController@storeMedia')->name('drivers.storeMedia');
    Route::post('drivers/ckmedia', 'DriverController@storeCKEditorImages')->name('drivers.storeCKEditorImages');
    Route::post('drivers/parse-csv-import', 'DriverController@parseCsvImport')->name('drivers.parseCsvImport');
    Route::post('drivers/process-csv-import', 'DriverController@processCsvImport')->name('drivers.processCsvImport');
    Route::resource('drivers', 'DriverController');

    // System Setting
    Route::delete('system-settings/destroy', 'SystemSettingController@massDestroy')->name('system-settings.massDestroy');
    Route::post('system-settings/parse-csv-import', 'SystemSettingController@parseCsvImport')->name('system-settings.parseCsvImport');
    Route::post('system-settings/process-csv-import', 'SystemSettingController@processCsvImport')->name('system-settings.processCsvImport');
    Route::resource('system-settings', 'SystemSettingController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomerController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomerController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::post('customers/parse-csv-import', 'CustomerController@parseCsvImport')->name('customers.parseCsvImport');
    Route::post('customers/process-csv-import', 'CustomerController@processCsvImport')->name('customers.processCsvImport');
    Route::resource('customers', 'CustomerController');

    // Addres
    Route::delete('addres/destroy', 'AddresController@massDestroy')->name('addres.massDestroy');
    Route::post('addres/parse-csv-import', 'AddresController@parseCsvImport')->name('addres.parseCsvImport');
    Route::post('addres/process-csv-import', 'AddresController@processCsvImport')->name('addres.processCsvImport');
    Route::resource('addres', 'AddresController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::post('orders/parse-csv-import', 'OrderController@parseCsvImport')->name('orders.parseCsvImport');
    Route::post('orders/process-csv-import', 'OrderController@processCsvImport')->name('orders.processCsvImport');
    Route::get('orders/new', 'OrderController@neworders')->name('orders.new');
    Route::get('orders/new/assign/{order}', 'OrderController@neworderassignview')->name('assignorder.view');
    Route::put('orders/new/assignpost/{order}', 'OrderController@neworderassign')->name('assignorder.post');
    Route::resource('orders', 'OrderController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/parse-csv-import', 'PartnerController@parseCsvImport')->name('partners.parseCsvImport');
    Route::post('partners/process-csv-import', 'PartnerController@processCsvImport')->name('partners.processCsvImport');
    Route::get('partners/accept/{partner}', 'PartnerController@accept')->name('partners.accept');
    Route::get('partners/deny/{partner}', 'PartnerController@deny')->name('partners.deny');
    Route::resource('partners', 'PartnerController');

    // Partner User
    Route::delete('partner-users/destroy', 'PartnerUserController@massDestroy')->name('partner-users.massDestroy');
    Route::post('partner-users/parse-csv-import', 'PartnerUserController@parseCsvImport')->name('partner-users.parseCsvImport');
    Route::post('partner-users/process-csv-import', 'PartnerUserController@processCsvImport')->name('partner-users.processCsvImport');
    Route::resource('partner-users', 'PartnerUserController');

    // Route
    Route::delete('routes/destroy', 'RouteController@massDestroy')->name('routes.massDestroy');
    Route::post('routes/parse-csv-import', 'RouteController@parseCsvImport')->name('routes.parseCsvImport');
    Route::post('routes/process-csv-import', 'RouteController@processCsvImport')->name('routes.processCsvImport');
    Route::resource('routes', 'RouteController');

    // Zone
    Route::delete('zones/destroy', 'ZoneController@massDestroy')->name('zones.massDestroy');
    Route::post('zones/parse-csv-import', 'ZoneController@parseCsvImport')->name('zones.parseCsvImport');
    Route::post('zones/process-csv-import', 'ZoneController@processCsvImport')->name('zones.processCsvImport');
    Route::resource('zones', 'ZoneController');

    // Zone Vehicle Category
    Route::delete('zone-vehicle-categories/destroy', 'ZoneVehicleCategoryController@massDestroy')->name('zone-vehicle-categories.massDestroy');
    Route::post('zone-vehicle-categories/parse-csv-import', 'ZoneVehicleCategoryController@parseCsvImport')->name('zone-vehicle-categories.parseCsvImport');
    Route::post('zone-vehicle-categories/process-csv-import', 'ZoneVehicleCategoryController@processCsvImport')->name('zone-vehicle-categories.processCsvImport');
    Route::resource('zone-vehicle-categories', 'ZoneVehicleCategoryController');

    // Place
    Route::delete('places/destroy', 'PlaceController@massDestroy')->name('places.massDestroy');
    Route::post('places/parse-csv-import', 'PlaceController@parseCsvImport')->name('places.parseCsvImport');
    Route::post('places/process-csv-import', 'PlaceController@processCsvImport')->name('places.processCsvImport');
    Route::resource('places', 'PlaceController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('send/push',function(){
    $SERVER_API_KEY = 'AAAAklbjYF8:APA91bEvG2Vvv6cS0KUwhUpPH0t4TfqpaXsW5B-5oOSDpwGGXjGdpnVE4CQX0F49WOYXL5sFKUh7GwuEWdyQ8DOhkTdjXJZ_YGiSPKkVm5S1Qakj4d55-Bhj-Sai2zEKbCA3_9U1f5zW';
    $data = [
        //"registration_ids" => $tokens,
        'to' => "fiGlB9tFSoahQxDlV1N9Cy:APA91bGuJZOtSQScCO9awOkLuofSYowc2a7VgHSW3aSUsYuS9QPvYO58E3B2_7DRMrGodcxm-PhWvpNYFbUpWiLGRD56f0duwcCzFcKC9433nerGaNmwdt3HAkQblYge0hldkZm7C4un",
        "data" => array(
            'message'=>'hi',
            'title'=>"data"
        )


    ];
    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);
    dd($response);
});


