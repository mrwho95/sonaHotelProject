<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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

// user
Route::get('/', function () {

	$room = DB::table('rooms')->get();
	$array['room'] = $room;

    return view('user.home', $array);
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about_us', 'HomeController@about')->name('about_us');

Route::get('/pages', 'HomeController@pages')->name('pages');

Route::get('/rooms', 'HomeController@rooms')->name('rooms');

Route::get('/searchRooms', 'HomeController@searchRooms')->name('searchRooms');

Route::get('/roomDetails/{id}', 'User\roomDetailsController@index')->name('roomDetails');

Route::get('/roomReserve/{id}', 'User\roomDetailsController@roomReserve')->name('roomReserve');

Route::get('/roomReservePromoProcess/{id}', 'User\roomDetailsController@promo')->name('promo.store');

Route::get('/myBooking', 'User\bookingController@index')->name('myBooking');

Route::get('/bookingApplicationForm/{id}', 'User\pdfController@index')->name('bookingApplicationForm');

Route::get('/invoicePDF/{id}', 'User\pdfController@generatePDF')->name('invoicePDF');

Route::get('/roomBookingProcess/{id}', 'User\bookingController@bookingProcess')->name('bookingProcess');

Route::get('/blogs', 'HomeController@blogs')->name('blogs');

Route::get('/review', 'User\customerreviewController@index')->name('review');

Route::post('/reviewProcess', 'User\customerreviewController@store')->name('reviewProcess');

Route::get('/profile', 'User\profileController@index')->name('profile');

Route::post('/profile', 'User\profileController@update')->name('profile.update');

Route::get('/creditCardPayment/{id}', 'User\paymentController@creditCard')->name('creditCard');

// Route::get('/creditCardPayment', 'User\paymentController@creditCard')->name('creditCard');

// Route::get('/creditCardPayment', 'User\paymentController@creditCard')->name('creditCard');


Route::get('/contactcustomer', 'User\contactCustomerController@index')->name('contactcustomer');

// Route::get('/contactcustomer/details/{id}', 'User\contactCustomerController@details')->name('contactcustomerdetails');

Route::get('/room_details', 'HomeController@roomDetails')->name('room_details');

Route::get('/blog_details', 'HomeController@blogDetails')->name('blog_details');

Route::get('/inbox', 'User\inboxController@index')->name('inbox');

Route::resource('contactcustomer', 'User\contactCustomerController');

// admin
// Route::get('/adminHome', 'Admin\HomeController@index')->name('adminHome');

// Route::post('/adminUpload', 'Admin\HomeController@upload')->name('adminUpload');

Route::get('/adminDashboard', 'Admin\dashboardController@index')->name('adminDashboard');

Route::get('/adminCustomerReview', 'Admin\customerController@review')->name('adminCustomerReview');

Route::get('/deleteReview/{id}', 'Admin\customerController@deleteReview')->name('deleteReview');

Route::get('/adminCustomerContact', 'Admin\customerController@contact')->name('adminCustomerContact');

Route::resource('/adminCustomer', 'Admin\customerController');

Route::resource('adminEditRoom', 'Admin\RoomController');

Route::get('/adminAddRoomData', 'Admin\RoomController@addDataIndex')->name('addDataIndex');

Route::get('/adminPromotion', 'Admin\promoCodeController@index')->name('promotion');

Route::post('/adminPromotionProcess', 'Admin\promoCodeController@store')->name('promotion.store');

Route::get('/adminCustomerBooking', 'Admin\bookingController@index')->name('adminCustomerBooking');

Route::get('/adminBookingApprove/{id}', 'Admin\bookingController@bookingApprove')->name('bookingApprove');

Route::get('/adminBookingReject/{id}', 'Admin\bookingController@bookingReject')->name('bookingReject');


// Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){
	//namespace('Admin') == Admin folder inside controller folder
	//prefix('admin') == url ('admin/'), ('admin/categories'), ('admin/news') url of the prefix
	//as('admin') == name('admin.home') || name of the route prefix
	//middleware('auth') == all public contrust function middleware('auth') can be clear from all controller under admin floder controller. Because here set auth middleware in route group.

	//example
	// Route::get('/', 'homeController@index')->name('home');
	// Route::resource('/categories', 'categoriesController');
	// Route::resource('/news', 'newsController');

	// original
	// Route::get('/admin', 'Admin\homeController@index')->name('admin.home');
	// Route::resource('/admin/categories', 'Admin\categoriesController', ['as'=>'admin']);
	// Route::resource('/admin/news', 'Admin\newsController', ['as' => 'admin']);

	//resource controller don't have @index etc
// });