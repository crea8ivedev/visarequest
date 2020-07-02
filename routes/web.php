<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



//Processor
Route::prefix('processor')->namespace('Backend\Auth')->group(function() {
    Route::get('/login', 'ProcessorLoginController@showLoginForm')->name('processor.login');
    Route::post('/login', 'ProcessorLoginController@login')->name('processor.login.submit');
    Route::post('/logout', 'ProcessorLoginController@logout')->name('processor.logout');

    // Password reset routes
    Route::post('/password/email', 'ProcessorForgotPasswordController@sendResetLinkEmail')->name('processor.password.email');
    Route::get('/password/reset', 'ProcessorForgotPasswordController@showLinkRequestForm')->name('processor.password.request');
    Route::post('/password/reset', 'ProcessorResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'ProcessorResetPasswordController@showResetForm')->name('processor.password.reset');
});

//Agent
Route::prefix('agent')->namespace('Backend\Auth')->group(function() {
    Route::get('/login', 'AgentLoginController@showLoginForm')->name('agent.login');
    Route::post('/login', 'AgentLoginController@login')->name('agent.login.submit');
    Route::post('/logout', 'AgentLoginController@logout')->name('agent.logout');

    // Password reset routes
    Route::post('/password/email', 'AgentForgotPasswordController@sendResetLinkEmail')->name('agent.password.email');
    Route::get('/password/reset', 'AgentForgotPasswordController@showLinkRequestForm')->name('agent.password.request');
    Route::post('/password/reset', 'AgentResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'AgentResetPasswordController@showResetForm')->name('agent.password.reset');
});


//Admin
Route::prefix('admin')->namespace('Backend\Auth')->group(function() {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    

});


//Auth Admin
Route::group(['namespace' => 'Backend\Admin', 'middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::post('/profile/update', "AdminController@updateProfile")->name("admin.profile.post");

    Route::get('/profile/changePassword','AdminController@showChangePasswordForm')->name("admin.change_password");
    Route::post('/changePassword','AdminController@changePassword')->name('admin.changePassword');

    /* routes for admin view */
     Route::group(["prefix" => "admin"], function() {
        Route::get('/', "AdminController@index")->name("admin.admin");
        Route::post('/', "AdminController@index")->name("admin.admin"); 
        route::get('/add', "AdminController@create")->name("admin.admin.add");
        Route::get('/edit/{id}', "AdminController@edit")->name("admin.admin.edit");
        Route::post('/store', "AdminController@store")->name("admin.admin.store");
        Route::post('/update/{id}', "AdminController@update")->name("admin.admin.update");
        Route::post('/destroy/{id}', 'AdminController@destroy')->name("admin.admin.destroy");
    });

    /* routes for processor view */
     Route::group(["prefix" => "processor"], function() {
        Route::get('/', "ProcessorController@index")->name("admin.processor");
        Route::post('/', "ProcessorController@index")->name("admin.processor"); 
        route::get('/add', "ProcessorController@create")->name("admin.processor.add");
        Route::get('/edit/{id}', "ProcessorController@edit")->name("admin.processor.edit");
        Route::post('/store', "ProcessorController@store")->name("admin.processor.store");
        Route::post('/update/{id}', "ProcessorController@update")->name("admin.processor.update");
        Route::post('/destroy/{id}', 'ProcessorController@destroy')->name("admin.processor.destroy");
    });

    /* routes for processor view */
    Route::group(["prefix" => "agent"], function() {
        Route::get('/', "AgentController@index")->name("admin.agent");
        Route::post('/', "AgentController@index")->name("admin.agent");
        Route::get('/edit/{id}', "AgentController@edit")->name("admin.agent.edit");
        route::get('/add', "AgentController@create")->name("admin.agent.add");
        Route::post('/store', "AgentController@store")->name("admin.agent.store");
        Route::post('/update/{id}', "AgentController@update")->name("admin.agent.update");
        Route::post('/destroy/{id}', 'AgentController@destroy')->name("admin.agent.destroy");
    });

    /* routes for country view */
    Route::group(["prefix" => "country"], function() {
        Route::get('/', "CountryController@index")->name("admin.country");
        Route::get('/{id}/edit', "CountryController@edit")->name("admin.country.edit");
        Route::post('/store', "CountryController@store")->name("admin.country.store");
        Route::post('/update', "CountryController@update")->name("admin.country.update");
        Route::post('/destroy/{id}', 'CountryController@destroy')->name("admin.country.destroy");
    });

    /* routes for service view */
    Route::group(["prefix" => "service"], function() {
        Route::get('/', "ServiceController@index")->name("admin.service");
        Route::post('/', "ServiceController@index")->name("admin.service");
        route::get('/add', "ServiceController@create")->name("admin.service.add");
        Route::get('/edit/{id}', "ServiceController@edit")->name("admin.service.edit");
        Route::post('/store', "ServiceController@store")->name("admin.service.store");
        Route::post('/update/{id}', "ServiceController@update")->name("admin.service.update");
        Route::post('/destroy/{id}', 'ServiceController@destroy')->name("admin.service.destroy");
    });

});

//Auth Processor
Route::group(['namespace' => 'Backend\Processor', 'middleware' => ['auth:processor'], 'prefix' => 'processor'], function () {
    Route::get('/', 'ProcessorController@index')->name('processor.dashboard');
    Route::get('/profile', 'ProcessorController@profile')->name('processor.profile');
    Route::post('/profile/update', "ProcessorController@update")->name("processor.profile.post");

    Route::get('/profile/changePassword','ProcessorController@showChangePasswordForm')->name("processor.change_password");
    Route::post('/changePassword','ProcessorController@changePassword')->name('processor.changePassword');

});

//Auth Agent
Route::group(['namespace' => 'Backend\Agent', 'middleware' => ['auth:agent'], 'prefix' => 'agent'], function () {
    Route::get('/', 'AgentController@index')->name('agent.dashboard');
    Route::get('/profile', 'AgentController@profile')->name('agent.profile');
    Route::post('/profile/update', "AgentController@update")->name("agent.profile.post");

    Route::get('/profile/changePassword','AgentController@showChangePasswordForm')->name("agent.change_password");
    Route::post('/changePassword','AgentController@changePassword')->name('agent.changePassword');

});