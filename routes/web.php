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

//Front End
Route::get('/','HomeController@index')->name('home');

//About Us
Route::get('/about-us','AboutController@index')->name('about-us');

//Loans
Route::get('loan/{slug}','LoanController@fetchLoanBySlug')->name('loan-detail');

//Contact Us
Route::get('contact','ContactController@index')->name('contact.index');
Route::post('contact','ContactController@send')->name('contact.send');

//Register
Route::get('/register','RegisterController@create')->name('user.register.create');
Route::post('/register','RegisterController@store')->name('user.register.store');

//Login
Route::get('/login','LoginController@index')->name('user.login.create');
Route::post('/login','LoginController@verify')->name('user.login.verify');

// Apply Loan
Route::resource('/{type}/apply','ApplyLoanController');

//Contact Us
Route::get('/contact','ContactController@index')->name('contact.index');
Route::post('/contact','ContactController@send')->name('contact.send');

//Cptui
Route::post('/fetchLoanDetailsByCptuiId','LoanController@fetchLoanDetailsByCptuiId')->name('loan.details');

//Front End Dashboard
Route::group(['middleware'=>'auth:web'],function(){
    Route::resource('/dashboard','DashboardController');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

//Admin
Route::get('/admin', 'Admin\LoginController@login')->name('admin.login');
Route::group(['prefix'=>'admin'], function (){
    Route::post('/process-login', 'Admin\LoginController@doLogin')->name('admin.login.submit');
    Route::group(['middleware'=>'auth:admin'], function (){
        Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::get('/account', 'Admin\AdminController@account')->name('admin.account');
        Route::post('/account/update', 'Admin\AdminController@accountUpdate')->name('admin.account.update');
        Route::get('/account/change-password', 'Admin\AdminController@changePassword')->name('admin.account.change-password');
        Route::post('/account/change-password', 'Admin\AdminController@updatePassword')->name('admin.account.update-password');

        Route::group(['middleware'=>'checkPermission'],function() {

        });

        // SubAdmin
        Route::resource('/sub-admin', 'Admin\AdminController');

        // Role
        Route::resource('/role', 'Admin\RoleController');

        //User
        Route::resource('/user', 'Admin\UserController');

        // Enquiry
        Route::resource('/enquiries', 'Admin\EnquiryController');
        Route::post('/enquiries/getEnquiryById', 'Admin\EnquiryController@getEnquiryById')->name('enquiries.get');

        //User Role Detail
        Route::resource('/userRoleDetail','Admin\UserRoleDetailController');

        //Pages
        Route::resource('/page','Admin\PageController');

        //CPT
        Route::resource('/cpt','Admin\CptController');

        // Cptui
        Route::get('/cptui/add/{slug}','Admin\CptuiController@create')->name('cptui.create');
        Route::get('/cptui/list/{slug}','Admin\CptuiController@index')->name('cptui.index');
        Route::get('/cptui/{id}/edit','Admin\CptuiController@edit')->name('cptui.edit');
        Route::resource('/cptui','Admin\CptuiController');

        // Questionaries
        Route::resource('/question','Admin\QuestionariesController');

         // Document Type
        Route::resource('/document-type','Admin\DocumentTypeController');
    });
});
