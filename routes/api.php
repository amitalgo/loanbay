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
Route::group(['middleware' => 'cors'], function(){
	Route::get('unauthorized', 'API\UserController@unauthorized')->name('api.unauthorized');
	Route::post('login', 'API\UserController@login');
	Route::post('register', 'API\UserController@register');
	Route::post('forgot-password', 'API\UserController@forgotPassword');
	Route::post('reset-password', 'API\UserController@resetPassword');
	Route::post('social/login/validate-user', 'API\UserController@checkUser');
	Route::post('social/login', 'API\UserController@socialLogin');
	Route::group(['middleware' => 'auth:api'], function(){
	    Route::get('logout', 'API\UserController@logout');
	    Route::get('user/detail', 'API\UserController@detail');
	    Route::post('user/change-password','API\UserController@changePassword');
	    Route::post('user/update/account', 'API\UserController@updateAccount');
	    Route::post('user/update/profile-pic', 'API\UserController@updateProfilePicture');
        Route::post('enquiry/save', 'API\EnquiryController@saveEnquiry');
        Route::get('aboutus', 'API\AboutController@getAboutUs');
	});
});