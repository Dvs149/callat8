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

// Route::get('/', 'ClientsideControl\HomeController@index');



/* Route::get('/gallery', 'ClientsideControl\GalleryController@index');
Route::get('/company', 'ClientsideControl\CompanyController@index');
Route::resource('/contact', 'ClientsideControl\ContactController');
Route::get('driver/{id}/product', 'AdminControl\CategoryProductController@index'); */

Route::get('/', 'FrontSite\frontendPages@homePage');

Route::get('/how_it_works','FrontSite\frontendPages@howItWorks');
Route::get('/how-it-works', 'FrontSite\HowItWork@howItWorks');/* mobile */

Route::get('/terms_and_condition', 'FrontSite\frontendPages@termsAndCondition');
Route::get('/terms-condition', 'FrontSite\TermsCondition@termsCondition');/* mobile */

Route::get('/privacy_policy', 'FrontSite\frontendPages@privacyPolicy');
Route::get('/privacy-policy', 'FrontSite\PrivacyPolicy@privacyPolicy');/* mobile */

Route::get('/about_us','FrontSite\frontendPages@aboutUs');

Route::get('/contact','FrontSite\frontendPages@contact');
Route::get('/Customers-review', 'FrontSite\frontendPages@customersFeedback');


Route::prefix('order')->namespace('FrontSite')->group(function () {
    Route::get('/create', 'OrderController@addOrder');
    Route::get('/save',['as' => 'order_create','uses' => 'OrderController@save']);
});

Route::get('/contact-us', 'FrontSite\ContactUs@ContactUs');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminControl\AdminLoginController@login');
    Route::post('/', 'AdminControl\AdminLoginController@checkUserLogin');

    Route::group(['prefix' => '',"middleware"=>"admin"],function(){
        Route::group(['prefix' => '',"middleware"=>"sub_admin"],function(){

                // dashboard starts here
                Route::resource('dashboard', 'AdminControl\Dashboard');
                // dashboard ends here
                
                // Banner starts here
                Route::resource('banner', 'AdminControl\BannerController');
                Route::get('banner/delete/{id}', 'AdminControl\BannerController@destroy');
                // Banner ends here
                
                
                // customer starts 
                Route::resource('customer', 'AdminControl\CustomerController');
                Route::get('customer/delete/{id}', 'AdminControl\CustomerController@destroy');
                Route::get('customer/{id}/address_list/delete/{address_list}', 'AdminControl\CustomerAddressController@destroy');
                Route::resource('customer/{id}/address_list', 'AdminControl\CustomerAddressController');
                Route::post('customer/remark/customerRemark/{id}', 'AdminControl\CustomerAddressController@customerRemark');
                Route::post('customer/remark/{id}', 'AdminControl\CustomerAddressController@customerRemarkdata');
                // customer ends here
                
                // order starts here
                Route::resource('order', 'AdminControl\OrderController');
                Route::post('order/delete/{id}', 'AdminControl\OrderController@destroy');
                Route::post('order/remark/{id}', 'AdminControl\OrderController@addRemark');
                Route::post('order/remark/orderRemarkData/{id}', 'AdminControl\OrderController@orderRemarkdata');
                Route::post('order/status_change', 'AdminControl\OrderController@status_change');
                Route::post('order/edit_address/{id}', 'AdminControl\OrderController@orderAddressId');
                Route::post('order/create/', 'AdminControl\AddOrderController@addOrder');
                Route::post('order/create/adding', 'AdminControl\AddOrderController@addingOrder');
                Route::post('order/create/adding/pickup', 'AdminControl\AddOrderController@addingOrderForPickup');
                Route::get('order/create/added/successfully', 'AdminControl\AddOrderController@orderAddedSuccessfully');
                //delete manually single record with all other linked table data permanently 
                Route::get('order/{id}/del', 'AdminControl\OrderController@deleteOrderFromeAdmin');

                // order ends here
                // price starts here
                Route::resource('price', 'AdminControl\PriceController');
                Route::get('price/delete/{id}', 'AdminControl\PriceController@destroy');
                // price ends here

                // product_management starts here
                Route::resource('cities', 'AdminControl\CitiesManagementController');
                Route::get('cities/delete/{id}', 'AdminControl\CitiesManagementController@destroy');
                // product_management ends here

                // Route::resource('how_it_works', 'AdminControl\HowItWorksController');
                Route::resource('cms_pages', 'AdminControl\CMSPagesController');

                // driver starts here
                Route::resource('driver', 'AdminControl\DriverController');
                Route::get('driver/delete/{id}', 'AdminControl\DriverController@destroy');
                Route::post('driver/assignment', 'AdminControl\DriverController@driverAssignment');
                // driver ends here

                Route::group(['prefix' => '',"middleware"=>"sub_admin"],function(){
                    // store starts here
                    Route::resource('store', 'AdminControl\StoreController');
                    Route::get('store/delete/{id}', 'AdminControl\StoreController@destroy');
                    // store ends here
                });
                // user starts here
                Route::resource('users', 'AdminControl\UserController');
                Route::get('users/delete/{id}', 'AdminControl\UserController@destroy');
                Route::resource('edit_profile', 'AdminControl\EditprofileController');
                // Route::get('add_user','AdminControl\UserController@addUsers');

                Route::resource('phones', 'AdminControl\PhoneController');
                Route::get('phones/delete/{id}', 'AdminControl\PhoneController@destroy');
                Route::post('phones/remark/phonesRemark/{id}', 'AdminControl\PhoneController@phonesRemark');
                Route::post('phones/remark/{id}', 'AdminControl\PhoneController@phonesRemarkdata');
                // user ends here

                Route::resource('testimonial', 'AdminControl\TestimonialController');
                Route::get('testimonial/delete/{id}', 'AdminControl\TestimonialController@destroy');

                Route::resource('review', 'AdminControl\ReviewController');
                Route::get('review/delete/{id}', 'AdminControl\ReviewController@destroy');
                
                Route::get('logout', 'AdminControl\AdminLoginController@logout');
            });
    

    });


});
