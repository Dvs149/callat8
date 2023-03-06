<?php

namespace App\Http\Controllers;

use Helpers;
use Illuminate\Http\Request;

class BreadcrumbPageHeaderthings extends Controller
{
    public function dashboard(){
        $data=array(
            'breadcrumb'=>'Dashboard',
            'pageHeaderTagLine'=>'ALL FEATURES SUMMARY',
            'pageHeaderTitle'=>'Dashboard',
            'add_btn'=>'',
            'table_name'=>'',
            

        );
        return $data;
    }

    public function how_it_works(){
        $data=array(
            'breadcrumb'=>'How It Works',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR How It Works',
            'pageHeaderTitle'=>'How It Works Management',
            'add_btn'=>'Add',
            'table_name'=>'How It Works',
        );
        return $data;
    }
    public function how_it_works_edit()
    {
        $data = array(
            'breadcrumb' => 'How It Works',
            'pageHeaderTagLine' => 'MANAGE ALL OF YOUR How It Works',
            'pageHeaderTitle' => 'How It Works Management',
            'add_btn' => '',
            'table_name' => 'How It Works',
            'back_button_link' => url(Helpers::admin_url('how_it_works')),
            'back_btn' => 'Back'
        );
        return $data;
    }

    public function address_list()
    {
        $data = array(
            'breadcrumb' => 'Address',
            'pageHeaderTagLine' => 'MANAGE ALL OF YOUR Address List',
            'pageHeaderTitle' => 'Address List Management',
            'add_btn' => 'Add Address',
            'table_name' => 'Address List',
            'back_button_link' => url(Helpers::admin_url('customer')),
            'back_btn' => 'Back'
        );
        return $data;
    }

    public function order_management(){

        $data=array(
            'breadcrumb'=>'Order',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR ORDERS',
            'pageHeaderTitle'=>'Order Management',
            'add_btn'=>'Add order',
            'table_name'=>'Orders'
        );
        // dd($data);
        return $data;
    }
    public function add_order()
    {

        $data = array(
            'breadcrumb' => 'Add Order',
            'pageHeaderTagLine' => 'ADD YOUR ORDERS',
            'pageHeaderTitle' => 'Order Management',
            'add_btn' => '',
            'table_name' => 'Orders',
            'back_button_link' => url(Helpers::admin_url('order')),
            'back_btn' => 'Back'
        );
        // dd($data);
        return $data;
    }
    public function add_order_pickup()
    {

        $data = array(
            'breadcrumb' => 'Add Order for Pick up',
            'pageHeaderTagLine' => 'ADD YOUR ORDERS FOR PICK UP',
            'pageHeaderTitle' => 'Order Management',
            'add_btn' => '',
            // 'table_name' => 'Orders',
            'back_button_link' => url(Helpers::admin_url('order/create')),
            'back_btn' => 'Back'
        );
        // dd($data);
        return $data;
    }

    public function add_order_successfully()
    {

        $data = array(
            'breadcrumb' => 'Order status',
            'pageHeaderTagLine' => 'See order status',
            'pageHeaderTitle' => 'Order Management',
            'add_btn' => '',
            // 'table_name' => 'Orders',
            'back_button_link' => url(Helpers::admin_url('order/create')),
            'back_btn' => 'Back'
        );
        // dd($data);
        return $data;
    }

    public function add_order_non_pickup($order_type='')
    {

        $data = array(
            'breadcrumb' => 'Add Order from '. $order_type,
            'pageHeaderTagLine' => 'ADD YOUR ORDERS FROM '. $order_type,
            'pageHeaderTitle' => 'Order Management',
            'add_btn' => '',
            // 'table_name' => 'Orders',
            'back_button_link' => url(Helpers::admin_url('order/create')),
            'back_btn' => 'Back'
        );
        // dd($data);
        return $data;
    }
    public function order_details(){

        $data=array(
            'breadcrumb'=>'Order',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR ORDERS',
            'pageHeaderTitle'=>'Order Management',
            'add_btn'=>'',
            'table_name'=>'Order details',
            'back_button_link' => url(Helpers::admin_url('order')),
            'back_btn' => 'Back'
        );
        // dd($data);
        return $data;
    }
    public function price_Management(){
        $data=array(
            'breadcrumb'=>'Price',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR PRICE',
            'pageHeaderTitle'=>'Price Management',
            'add_btn'=>'Add Price',
            'table_name'=>'Price Range'
        );
        return $data;
    }
    public function banner_management(){
        $data=array(
            'breadcrumb'=>'Banner',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR Banner',
            'pageHeaderTitle'=>'Banner Management',
            'add_btn'=>'Add Banner',
            'table_name'=>'Banners'
        );
        return $data;
    }
    public function customer_management(){
        $data=array(
            'breadcrumb'=>'Customer',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR Customer',
            'pageHeaderTitle'=>'Customer Management',
            'add_btn'=>'Add Customer',
            'table_name'=>'Customers'
        );
        return $data;
    }
    public function cities_management(){
        $data=array(
            'breadcrumb'=>'City',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR City',
            'pageHeaderTitle'=>'City Management',
            'add_btn'=>'Add City',
            'table_name'=>'Cities'
        );
        return $data;
    }
    public function category(){
        $data=array(
            'breadcrumb'=>'Category',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR CATEGORIES',
            'pageHeaderTitle'=>'Category',
            'add_btn'=>'Add Category',
            'table_name'=>'Categories'
        );
        return $data;
    }
    public function manage_Users(){
        $data=array(
            'breadcrumb'=>'User',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR USERS',
            'pageHeaderTitle'=>'Manage Users',
            'add_btn'=>'Add User',
            'table_name'=>'Users'
        );
        return $data;
    }

    public function edit_Users(){
        $data=array(
            'breadcrumb'=>'Edit Users',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR user',
            'pageHeaderTitle'=>'Manage Users',
            'add_btn'=>'',
            'table_name'=>'',
            'back_btn'=>'',
            'back_button_link' => '',

        );
        return $data;
    }

    public function add_user(){
        $data=array(
            'breadcrumb'=>'Add Users',
            'pageHeaderTagLine'=>'add user from here',
            'pageHeaderTitle'=>'add Users',
            'add_btn'=>'',
            'table_name'=>'',
            'back_btn'=>'Back'
        );
        return $data;
    }
    public function driver_management(){
        $data=array(
            'breadcrumb'=>'Driver',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR DRIVER',
            'pageHeaderTitle'=>'add Driver',
            'add_btn'=>'Add Driver',
            'table_name'=>'Drivers'

        );
        return $data;
    }

    public function store_management(){
        $data=array(
            'breadcrumb'=>'Store',
            'pageHeaderTagLine'=>'MANAGE ALL OF YOUR STORES',
            'pageHeaderTitle'=>'add Store',
            'add_btn'=>'Add Store',
            'table_name'=>'Stores'

        );
        return $data;
    }

    public function cms_pages_data()
    {
        $data = array(
            'breadcrumb' => 'CMS Page',
            'pageHeaderTagLine' => 'MANAGE ALL OF CMS PageS',
            'pageHeaderTitle' => 'CMS Page',
            'add_btn' => '',
            'table_name' => 'CMS Pages'
            
        );
        return $data;
    }

    public function cms_pages_edit_data()
    {
        $data = array(
            'breadcrumb' => 'CMS Page',
            'pageHeaderTagLine' => 'MANAGE ALL OF CMS PageS',
            'pageHeaderTitle' => 'CMS Page',
            'add_btn' => '',
            'table_name' => 'CMS Pages',
            'back_btn' => 'Back',
            'back_button_link' =>  url(Helpers::admin_url('cms_pages')),
        );
        return $data;
    }

    public function phones_data()
    {
        $data = array(
            'breadcrumb' => 'Phones',
            'pageHeaderTagLine' => 'MANAGE ALL OF Phones',
            'pageHeaderTitle' => 'Phones',
            'add_btn' => '',
            'table_name' => 'View call for update'
        );
        return $data;
    }

    public function testimonial_Management()
    {
        $data = array(
            'breadcrumb' => 'Testimonial',
            'pageHeaderTagLine' => 'MANAGE ALL OF Testimonial',
            'pageHeaderTitle' => 'Testimonial',
            'add_btn' => 'Add Testimonial',
            'table_name' => 'Testimonial'
        );
        return $data;
    }
    public function review_Management()
    {
        $data = array(
            'breadcrumb' => 'Review',
            'pageHeaderTagLine' => 'MANAGE ALL OF Reviews',
            'pageHeaderTitle' => 'Review',
            'add_btn' => 'Add Review',
            'table_name' => 'Review'
        );
        return $data;
    }

}
