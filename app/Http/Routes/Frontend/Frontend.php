<?php

/**
 * Frontend Controllers
 */
get('/', 'FrontendController@index')->name('home');
get('macros', 'FrontendController@macros');

// 查看服务
get('services/{id}', 'PackageGoodController@show')->name('package_goods.show');

// 订单相关服务
post('orders', 'OrderController@store')->name('orders.store');
get('orders/{order_no}/payment/success',
    'OrderController@payment_success')->name('order.payment.success');

/**
 * These frontend controllers require the user to be logged in
 */
$router->group(['middleware' => 'auth'], function ()
{
	get('dashboard', 'DashboardController@index')->name('frontend.dashboard');
	get('profile/edit', 'ProfileController@edit')->name('frontend.profile.edit');
	patch('profile/update', 'ProfileController@update')->name('frontend.profile.update');
});