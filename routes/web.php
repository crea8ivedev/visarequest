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
Route::prefix('processor')->namespace('Backend\Auth')->group(function () {
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
Route::prefix('agent')->namespace('Backend\Auth')->group(function () {
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
Route::prefix('admin')->namespace('Backend\Auth')->group(function () {
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
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::post('/statistic', "DashboardController@statistic")->name("admin.statistic");
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    Route::post('/profile/update', "AdminController@updateProfile")->name("admin.profile.post");

    Route::get('/profile/changePassword', 'AdminController@showChangePasswordForm')->name("admin.change_password");
    Route::post('/changePassword', 'AdminController@changePassword')->name('admin.changePassword');

    /* routes for admin view */
    Route::group(["prefix" => "admin"], function () {
        Route::get('/', "AdminController@index")->name("admin.admin");
        Route::post('/', "AdminController@index")->name("admin.admin");
        route::get('/add', "AdminController@create")->name("admin.admin.add");
        Route::get('/edit/{id}', "AdminController@edit")->name("admin.admin.edit");
        Route::post('/store', "AdminController@store")->name("admin.admin.store");
        Route::post('/update/{id}', "AdminController@update")->name("admin.admin.update");
        Route::post('/destroy/{id}', 'AdminController@destroy')->name("admin.admin.destroy");
    });

    /* routes for admin view */
    Route::group(["prefix" => "client"], function () {
        Route::get('/', "ClientController@index")->name("admin.client");
        Route::post('/', "ClientController@index")->name("admin.client");
        route::get('/add', "ClientController@create")->name("admin.client.add");
        Route::get('/edit/{id}', "ClientController@edit")->name("admin.client.edit");
        Route::post('/store', "ClientController@store")->name("admin.client.store");
        Route::post('/update/{id}', "ClientController@update")->name("admin.client.update");
        Route::post('/destroy/{id}', 'ClientController@destroy')->name("admin.client.destroy");
    });

    /* routes for processor view */
    Route::group(["prefix" => "processor"], function () {
        Route::get('/', "ProcessorController@index")->name("admin.processor");
        Route::post('/', "ProcessorController@index")->name("admin.processor");
        route::get('/add', "ProcessorController@create")->name("admin.processor.add");
        Route::get('/edit/{id}', "ProcessorController@edit")->name("admin.processor.edit");
        Route::post('/store', "ProcessorController@store")->name("admin.processor.store");
        Route::post('/update/{id}', "ProcessorController@update")->name("admin.processor.update");
        Route::post('/destroy/{id}', 'ProcessorController@destroy')->name("admin.processor.destroy");
    });

    /* routes for processor view */
    Route::group(["prefix" => "agent"], function () {
        Route::get('/', "AgentController@index")->name("admin.agent");
        Route::post('/', "AgentController@index")->name("admin.agent");
        Route::get('/edit/{id}', "AgentController@edit")->name("admin.agent.edit");
        route::get('/add', "AgentController@create")->name("admin.agent.add");
        Route::post('/store', "AgentController@store")->name("admin.agent.store");
        Route::post('/update/{id}', "AgentController@update")->name("admin.agent.update");
        Route::post('/destroy/{id}', 'AgentController@destroy')->name("admin.agent.destroy");
    });

    /* routes for country view */
    Route::group(["prefix" => "country"], function () {
        Route::get('/', "CountryController@index")->name("admin.country");
        Route::post('/', "CountryController@index")->name("admin.country");
        Route::get('/edit/{id}', "CountryController@edit")->name("admin.country.edit");
        route::get('/add', "CountryController@create")->name("admin.country.add");
        Route::post('/store', "CountryController@store")->name("admin.country.store");
        Route::post('/update/{id}', "CountryController@update")->name("admin.country.update");
        Route::post('/destroy/{id}', 'CountryController@destroy')->name("admin.country.destroy");
    });

    /* routes for Service Category view */
    Route::group(["prefix" => "service-category"], function () {
        Route::get('/', "ServiceCategoryController@index")->name("admin.category.service");
        Route::post('/', "ServiceCategoryController@index")->name("admin.category.service");
        Route::get('/edit/{id}', "ServiceCategoryController@edit")->name("admin.category.service.edit");
        route::get('/add', "ServiceCategoryController@create")->name("admin.category.service.add");
        Route::post('/store', "ServiceCategoryController@store")->name("admin.category.service.store");
        Route::post('/update/{id}', "ServiceCategoryController@update")->name("admin.category.service.update");
        Route::post('/destroy/{id}', 'ServiceCategoryController@destroy')->name("admin.category.service.destroy");
    });

    /* routes for service view */
    Route::group(["prefix" => "service"], function () {
        Route::get('/', "ServiceController@index")->name("admin.service");
        Route::post('/', "ServiceController@index")->name("admin.service");
        route::get('/add', "ServiceController@create")->name("admin.service.add");
        Route::get('/edit/{id}', "ServiceController@edit")->name("admin.service.edit");
        Route::post('/store', "ServiceController@store")->name("admin.service.store");
        Route::post('/update/{id}', "ServiceController@update")->name("admin.service.update");
        Route::post('/destroy/{id}', 'ServiceController@destroy')->name("admin.service.destroy");
        Route::get('/element/{id}', "ServiceController@createElement")->name("admin.service.element");
        Route::post('/element', "ServiceController@storeElement")->name("admin.service.element.store");
    });
});

//Auth Processor
Route::group(['namespace' => 'Backend\Processor', 'middleware' => ['auth:processor'], 'prefix' => 'processor'], function () {
    Route::get('/', 'ProcessorController@index')->name('processor.dashboard');
    Route::get('/profile', 'ProcessorController@profile')->name('processor.profile');
    Route::post('/profile/update', "ProcessorController@update")->name("processor.profile.post");

    Route::get('/profile/changePassword', 'ProcessorController@showChangePasswordForm')->name("processor.change_password");
    Route::post('/changePassword', 'ProcessorController@changePassword')->name('processor.changePassword');

    
    /* routes for admin view */
    Route::group(["prefix" => "client"], function () {
        Route::get('/', "ClientController@index")->name("processor.client");
        Route::post('/', "ClientController@index")->name("processor.client");
        route::get('/add', "ClientController@create")->name("processor.client.add");
        Route::get('/edit/{id}', "ClientController@edit")->name("processor.client.edit");
        Route::post('/store', "ClientController@store")->name("processor.client.store");
        Route::post('/update/{id}', "ClientController@update")->name("processor.client.update");
        Route::post('/destroy/{id}', 'ClientController@destroy')->name("processor.client.destroy");
    });
});

//Auth Agent
Route::group(['namespace' => 'Backend\Agent', 'middleware' => ['auth:agent'], 'prefix' => 'agent'], function () {
    Route::get('/', 'AgentController@index')->name('agent.dashboard');
    Route::get('/profile', 'AgentController@profile')->name('agent.profile');
    Route::post('/profile/update', "AgentController@update")->name("agent.profile.post");

    Route::get('/profile/changePassword', 'AgentController@showChangePasswordForm')->name("agent.change_password");
    Route::post('/changePassword', 'AgentController@changePassword')->name('agent.changePassword');
});
