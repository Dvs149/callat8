<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('order')->namespace('API')->group(function () {
    Route::post('/list','OrderController@listOrder');
    Route::post('/last_7_days_order','OrderController@last7DaysOrder');
    Route::post('/save','OrderController@save');
    Route::get('/order-type/list','OrderController@listOrderType');
    Route::get('/sending-item/list','OrderController@listSendingItem');
    Route::post('/delete_order','OrderController@deleteOrder');
    Route::post('/order_address_list','OrderController@orderAddressList');
    Route::post('/order_count_according_mobile','OrderController@orderCountAccordingMobile');
    Route::post('/check_order_driver_details ','OrderController@checkDriverDetails');
    Route::post('/get_order_detail ', 'OrderController@getOrderDetail');
});

Route::post('global_setting','API\LoginController@globalSetting');
Route::post('login','API\LoginController@login');
Route::post('check_user_status','API\LoginController@checkUserStatus');
Route::post('register','API\LoginController@register');
Route::post('forgot_password','API\LoginController@forgotPassword');
// Route::get('global_setting','API\LoginController@globalSetting');

Route::post('add_mobile_number', 'API\StoreCustomerController@addMobileNumber');
Route::post('add_rating_driver', 'API\StoreCustomerController@addRatingDriver');

Route::post('custumer_detail', 'API\CustomerController@custumerDetail');


//Driver api
Route::post('driver_register','API\DriverController@driver_register');
Route::post('driver_order_list','API\DriverController@driverOrderList');
Route::post('driver_last_7_days_order','API\DriverController@driverLast7DayOrderList');
Route::post('driver_order_status','API\DriverController@driverOrderStatus');
Route::post('driver_profile_update','API\DriverController@driverProfileUpdate');
Route::get('order_status_list','API\DriverController@orderStatusList');
Route::post('driver_upload_passport_photo','API\DriverController@uploadPassportPhoto');
Route::post('submit_driver_location', 'API\DriverController@submitDriverLocation');
Route::post( 'driver_get_remain_deliverey_orderList', 'API\DriverController@driverGetRemainDelivereyOrderList');
Route::post('driver_get_order_detail', 'API\DriverController@driverGetOrderDetail');

//Driver v2 api
Route::post('driver_order_status_pickup','API\v2\DriverV2Controller@driverOrderStatusV2');
Route::post('driver_order_status_delivered', 'API\v2\DriverV2Controller@driverOrderStatusV2');
Route::post('driver_get_location', 'API\v2\DriverV2Controller@driverGetLocation');
//Driver api ends here



Route::get('store_list','API\StoreController@storeList');

Route::post('update_profile','API\CustomerController@updateProfile');

Route::get('get_price','APIController\PriceAPIController@index');
Route::get('get_cities','APIController\CityAPIController@index');
Route::post('order_details','APIController\OrderAPIController@index');

Route::get('test','API\LoginController@test');


// version 2
Route::post('register_v2','API\v2\LoginControllerV2@registerV2');
Route::post('update_profile_v2','API\v2\CustomerControllerV2@updateProfileV2');
Route::post('login_v2','API\v2\LoginControllerV2@loginV2');


Route::prefix('/')->namespace('API\v2')->group(function () {
    Route::post('add_address', 'AddAddressAPIController@addAddress');
    Route::post('get_customer_address', 'AddAddressAPIController@getAddressByCustomer');
    Route::post('delete_address', 'AddAddressAPIController@deleteAddress');
    Route::post('update_address', 'AddAddressAPIController@updateAddress');
    Route::post('check_address_type', 'AddAddressAPIController@checkAddressType');
    Route::post('change_default_address', 'AddAddressAPIController@changeDefaultAddress');
    Route::get('list_testimonial', 'TestimonialsAPIController@listTestimonial');
    Route::post('submit_testimonial', 'TestimonialsAPIController@submitTestimonial');
    Route::post('submit_testimonial_v2', 'TestimonialsAPIControllerV2@submitTestimonial_v2');
    Route::get('store_list_v2', 'StoreControllerV2@storeListV2');
    Route::get('get_active_store_count', 'StoreControllerV2@getActiveStoreCount');
});

Route::prefix('order')->namespace('API\v2')->group(function () {
    Route::post('/save_v2','OrderControllerV2@saveV2');
});
    //
