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


Route::namespace('Frontend\Auth')->group(function () {
    Route::post('/login', 'LoginController@login')->name('user.login');
    Route::post('/register', 'RegisterController@create')->name('user.register');
    Route::get('/logout', 'LoginController@logout')->name('user.logout');
});
//FRONT ROUTE
Route::group(['namespace' => 'Frontend', 'middleware' => ['header.data']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/index', 'HomeController@index')->name('login');
    Route::post('/country', 'HomeController@country')->name('visa.country');
    Route::get('/visa/{country}', 'ServiceController@index')->name('frontend.service.country');
    Route::get('/service', 'ServiceController@service')->name('frontend.service');
    Route::get('/details/{country}/{category}/{service}', 'ServiceController@serviceDetails')->name('frontend.category.service.details');
    Route::post('/getservices', 'ServiceController@getServices')->name('frontend.service.details');
    Route::post('/get-services-details', 'ServiceController@getServiceDetails')->name('frontend.service.details.ajax');
    Route::get('/about-us', 'PageController@getAboutUs')->name('frontend.about-us');
    Route::get('/contact-us', 'PageController@getContactUs')->name('frontend.contact-us');
    Route::post('/contact', 'ContactController@store')->name('frontend.contact');
    Route::get('/privacy', 'PageController@getPrivacy')->name('frontend.privacy');
    Route::get('/disclaimer', 'PageController@getDisclaimer')->name('frontend.disclaimer');
    Route::get('/terms-and-conditions', 'PageController@getTermsAndConditions')->name('frontend.terms-and-conditions');
    Route::get('/news', 'NewsController@getNews')->name('frontend.news');
    Route::get('/news/{slug}', 'NewsController@getNewsDetails')->name('frontend.news.details');
    Route::post('/feedback', 'ContactController@feedbackStore')->name('frontend.feedback');
    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('/profile', 'UserController@index')->name('frontend.user.profile');
        Route::post('/profile', 'UserController@update')->name('frontend.user.profile.update');
        Route::get('/application/{id}', 'ServiceApplicationController@index')->name('frontend.service.application.index');
        Route::post('/application', 'ServiceApplicationController@applyUpdate')->name('frontend.user.application.update');
        Route::get('/services', 'UserController@services')->name('frontend.user.application.service');
    });
});




//END FRONT ROUTE

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
        Route::get('/view-jobs/{id}', "ProcessorController@viewJobs")->name("admin.processor.view-jobs");
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

    Route::group(["prefix" => "visa-client"], function () {
        Route::get('/', "VisaClientController@index")->name("admin.visa-client");
        Route::post('/', "VisaClientController@index")->name("admin.visa-client");
        Route::get('/edit/{id}', "VisaClientController@edit")->name("admin.visa-client.edit");
        route::get('/add', "VisaClientController@create")->name("admin.visa-client.add");
        Route::post('/store', "VisaClientController@store")->name("admin.visa-client.store");
        Route::post('/update/{id}', "VisaClientController@update")->name("admin.visa-client.update");
        Route::post('/destroy/{id}', 'VisaClientController@destroy')->name("admin.visa-client.destroy");
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

    /* routes for service view */
    Route::group(["prefix" => "application"], function () {
        Route::get('/', "ServiceApplicationController@index")->name("admin.service.application");
        Route::post('/', "ServiceApplicationController@index")->name("admin.service.application");
        route::get('/add', "ServiceApplicationController@create")->name("admin.service.application.add");
        Route::get('/edit/{id}', "ServiceApplicationController@edit")->name("admin.service.application.edit");
        Route::get('/view_application/{id}', "ServiceApplicationController@view")->name("admin.service.application.view_application");
        Route::post('/store', "ServiceApplicationController@store")->name("admin.s-assign.store");
        Route::post('/update/{id}', "ServiceApplicationController@update")->name("admin.service.application.update");
        Route::post('/destroy/{id}', 'ServiceApplicationController@destroy')->name("admin.service.application.destroy");
    });

    /* routes for finance view */
    Route::group(["prefix" => "finance"], function () {
        Route::get('/', "FinanceController@index")->name("admin.finance");
        Route::post('/', "FinanceController@index")->name("admin.finance");
    });

    /* routes for team member view */
    Route::group(["prefix" => "team-member"], function () {
        Route::get('/', "TeamMemberController@index")->name("admin.team-member");
        Route::post('/', "TeamMemberController@index")->name("admin.team-member");
        Route::get('/edit/{id}', "TeamMemberController@edit")->name("admin.team-member.edit");
        route::get('/add', "TeamMemberController@create")->name("admin.team-member.add");
        Route::post('/store', "TeamMemberController@store")->name("admin.team-member.store");
        Route::post('/update/{id}', "TeamMemberController@update")->name("admin.team-member.update");
        Route::post('/destroy/{id}', 'TeamMemberController@destroy')->name("admin.team-member.destroy");
    });

    /* routes for messages view */
    Route::group(["prefix" => "messages"], function () {
        Route::get('/', "MessagesController@index")->name("admin.messages");
        Route::post('/', "MessagesController@index")->name("admin.messages");
        route::get('/send', "MessagesController@create")->name("admin.messages.send");
        route::post('/store', "MessagesController@store")->name("admin.messages.store");
        Route::get('/reply/{id}', "MessagesController@edit")->name("admin.messages.reply");
        Route::post('/update/{id}', "MessagesController@update")->name("admin.messages.update");
        Route::post('/destroy/{id}', 'MessagesController@destroy')->name("admin.messages.destroy");
    });

    Route::group(["prefix" => "email-template"], function () {
        Route::get('/', "EmailTemplateController@index")->name("admin.email-template");
        Route::post('/', "EmailTemplateController@index")->name("admin.email-template");
        route::get('/add', "EmailTemplateController@create")->name("admin.email-template.add");
        route::post('/store', "EmailTemplateController@store")->name("admin.email-template.store");
        Route::get('/edit/{id}', "EmailTemplateController@edit")->name("admin.email-template.edit");
        Route::post('/update/{id}', "EmailTemplateController@update")->name("admin.email-template.update");
        Route::post('/destroy/{id}', 'EmailTemplateController@destroy')->name("admin.email-template.destroy");
    });

    Route::group(["prefix" => "terms-and-conditions"], function () {
        Route::get('/', "PageController@termsAndConditon")->name("admin.terms-and-conditions");
        Route::post('/store', "PageController@termsUpdate")->name("admin.terms-and-conditions.store");
    });

    /* routes for about us view */
    Route::group(["prefix" => "about-us"], function () {
        Route::get('/', "PageController@about")->name("admin.about-us");
        Route::post('/store', "PageController@aboutUpdate")->name("admin.about-us.store");
    });

    /* routes for terms and conditions view */
    Route::group(["prefix" => "terms-and-conditions"], function () {
        Route::get('/', "PageController@termsAndConditon")->name("admin.terms-and-conditions");
        Route::post('/store', "PageController@termsUpdate")->name("admin.terms-and-conditions.store");
    });

    /* routes for contact us view */
    Route::group(["prefix" => "contact-us"], function () {
        Route::get('/', "PageController@contactUs")->name("admin.contact-us");
        Route::post('/store', "PageController@contactUsUpdate")->name("admin.contact-us.store");
        Route::get('/edit/{id}', "PageController@contactUsEdit")->name("admin.contact-us.edit");
    });

    /* routes for Privacy view */
    Route::group(["prefix" => "privacy"], function () {
        Route::get('/', "PageController@privacy")->name("admin.privacy");
        Route::post('/store', "PageController@privacyUpdate")->name("admin.privacy.store");
    });

    /* routes for disclaimer view */
    Route::group(["prefix" => "disclaimer"], function () {
        Route::get('/', "PageController@disclaimer")->name("admin.disclaimer");
        Route::post('/store', "PageController@disclaimerUpdate")->name("admin.disclaimer.store");
    });


    /* routes for social links view */
    Route::group(["prefix" => "social-link"], function () {
        Route::get('/', "PageController@socialLink")->name("admin.social-link");
        Route::post('/store', "PageController@socialLinkUpdate")->name("admin.social-link.store");
    });

    /* routes for slider view */
    Route::group(["prefix" => "slider"], function () {
        Route::get('/', "SliderController@index")->name("admin.slider");
        Route::post('/', "SliderController@index")->name("admin.slider");
        route::get('/add', "SliderController@create")->name("admin.slider.add");
        Route::get('/edit/{id}', "SliderController@edit")->name("admin.slider.edit");
        Route::post('/store', "SliderController@store")->name("admin.slider.store");
        Route::post('/update/{id}', "SliderController@update")->name("admin.slider.update");
        Route::post('/destroy/{id}', 'SliderController@destroy')->name("admin.slider.destroy");
    });



    /* routes for visa question view */
    Route::group(["prefix" => "visa-question"], function () {
        Route::get('/', "VisaQuestionController@index")->name("admin.visa-question");
        Route::post('/', "VisaQuestionController@index")->name("admin.visa-question");
        route::get('/add', "VisaQuestionController@create")->name("admin.visa-question.add");
        route::post('/store', "VisaQuestionController@store")->name("admin.visa-question.store");
        Route::get('/edit/{id}', "VisaQuestionController@edit")->name("admin.visa-question.edit");
        Route::post('/update/{id}', "VisaQuestionController@update")->name("admin.visa-question.update");
        Route::post('/destroy/{id}', 'VisaQuestionController@destroy')->name("admin.visa-question.destroy");
    });

    /* routes for contacts view */
    Route::group(["prefix" => "contact"], function () {
        Route::get('/', "ContactController@index")->name("admin.contact");
        Route::post('/', "ContactController@index")->name("admin.contact");
        Route::get('/reply/{id}', "ContactController@reply")->name("admin.contact.reply");
        Route::post('/update', "ContactController@update")->name("admin.contact.update");
        Route::post('/destroy/{id}', 'ContactController@destroy')->name("admin.contact.destroy");
    });

    /* routes for feedback view */
    Route::group(["prefix" => "feedback"], function () {
        Route::get('/', "FeedbackController@index")->name("admin.feedback");
        Route::post('/', "FeedbackController@index")->name("admin.feedback");
        Route::get('/reply/{id}', "FeedbackController@reply")->name("admin.feedback.reply");
        Route::post('/update', "FeedbackController@update")->name("admin.feedback.update");
        Route::post('/destroy/{id}', 'FeedbackController@destroy')->name("admin.feedback.destroy");
    });

    /* routes for news view */
    Route::group(["prefix" => "news"], function () {
        Route::get('/', "NewsController@index")->name("admin.news");
        Route::post('/', "NewsController@index")->name("admin.news");
        route::get('/add', "NewsController@create")->name("admin.news.add");
        route::post('/store', "NewsController@store")->name("admin.news.store");
        Route::get('/edit/{id}', "NewsController@edit")->name("admin.news.edit");
        Route::post('/update/{id}', "NewsController@update")->name("admin.news.update");
        Route::post('/destroy/{id}', 'NewsController@destroy')->name("admin.news.destroy");
    });

    /* routes for meta tag view */
    Route::group(["prefix" => "meta-page"], function () {
        // Route::get('/', "TermsAndConditionsController@index")->name("admin.terms-and-conditions");
        Route::get('/', "MetaPageController@index")->name("admin.meta-page");
        Route::post('/store', "MetaPageController@store")->name("admin.meta-page.store");
        Route::get('/{page}/edit', "MetaPageController@edit")->name("admin.meta-page.edit");
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

    /* routes for service view */
    Route::group(["prefix" => "service"], function () {
        Route::get('/', "ServiceController@index")->name("processor.service");
        Route::post('/', "ServiceController@index")->name("processor.service");
        route::get('/add', "ServiceController@create")->name("processor.service.add");
        Route::get('/edit/{id}', "ServiceController@edit")->name("processor.service.edit");
        Route::post('/store', "ServiceController@store")->name("processor.service.store");
        Route::post('/update/{id}', "ServiceController@update")->name("processor.service.update");
        Route::post('/destroy/{id}', 'ServiceController@destroy')->name("processor.service.destroy");
        Route::get('/element/{id}', "ServiceController@createElement")->name("processor.service.element");
        Route::post('/element', "ServiceController@storeElement")->name("processor.service.element.store");
    });

    /* routes for service view */
    Route::group(["prefix" => "completed-service"], function () {
        Route::get('/', "CompletedServiceController@index")->name("processor.completed-service");
        Route::post('/', "CompletedServiceController@index")->name("processor.completed-service");
    });

    /* routes for finance view */
    Route::group(["prefix" => "finance"], function () {
        Route::get('/', "FinanceController@index")->name("processor.finance");
        Route::post('/', "FinanceController@index")->name("processor.finance");
    });
});

//Auth Agent
Route::group(['namespace' => 'Backend\Agent', 'middleware' => ['auth:agent'], 'prefix' => 'agent'], function () {
    Route::get('/', 'AgentController@index')->name('agent.dashboard');
    Route::get('/profile', 'AgentController@profile')->name('agent.profile');
    Route::post('/profile/update', "AgentController@update")->name("agent.profile.post");

    Route::get('/profile/changePassword', 'AgentController@showChangePasswordForm')->name("agent.change_password");
    Route::post('/changePassword', 'AgentController@changePassword')->name('agent.changePassword');

    /* routes for service view */
    Route::group(["prefix" => "service"], function () {
        Route::get('/', "ServiceController@index")->name("agent.service");
        Route::post('/', "ServiceController@index")->name("agent.service");
    });

    /* routes for service view */
    Route::group(["prefix" => "completed-service"], function () {
        Route::get('/', "CompletedServiceController@index")->name("agent.completed-service");
        Route::post('/', "CompletedServiceController@index")->name("agent.completed-service");
    });

    /* routes for finance view */
    Route::group(["prefix" => "finance"], function () {
        Route::get('/', "FinanceController@index")->name("agent.finance");
        Route::post('/', "FinanceController@index")->name("agent.finance");
    });
});

Route::get('assets/{path}/{file}', 'CommonController@displayImage')->name('display.image');
Route::get('download/{path}/{file}', 'CommonController@getDownload')->name('download');
