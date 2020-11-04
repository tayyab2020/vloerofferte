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

  Route::get('/','FrontendController@index')->name('front.index');
  Route::get('/thankyou/{id}','FrontendController@Thankyou');
  Route::get('/thankyou-page/{id}','FrontendController@ThankyouPage');
  Route::post('/lang-change','FrontendController@LanguageChange')->name('lang.change');
  Route::post('/lang-client-change','FrontendController@LanguageClientChange')->name('lang.clientchange');
  Route::post('/lang-handyman-change','FrontendController@LanguageHandymanChange')->name('lang.handymanchange');
  Route::get('/cart','FrontendController@Cart')->name('cart');
  Route::post('/update-rate','FrontendController@UpdateRate');
  Route::post('/delete-cart','FrontendController@DeleteCart');
  Route::get('/services', 'UserController@Services');
  Route::get('/get-quotation-data', 'UserController@GetQuotationData');
  Route::get('/sub-services', 'UserController@SubServices');
  Route::get('/get-id', 'UserController@GetID');
  Route::get('/user-services', 'UserController@UserServices');
  Route::get('/user-subservices', 'UserController@UserSubServices');
  Route::get('/payment-mollie','CategoryController@preparePayment')->name('payment-mollie');
  Route::name('webhooks.mollie')->post('webhooks/mollie', 'MollieWebhookController@handle');
  Route::name('webhooks.first')->post('/mollie', 'MollieFirstPayment@handle');
  Route::name('webhooks.last')->post('/mollie1', 'MollieLastPayment@handle');
  Route::get('/handymans','FrontendController@users')->name('front.users');
  Route::get('/handymans/featured','FrontendController@featured')->name('front.featured');
  Route::get('/handyman-profile/{id}','FrontendController@user')->name('front.user');
  Route::get('/category/{slug}','FrontendController@types')->name('front.types');
  Route::get('/handymans/search/','FrontendController@search')->name('user.search');
  Route::post('/handymans/quote/','FrontendController@quote')->name('user.quote');
  Route::post('/handymans/filter/','FrontendController@FilterHandymans')->name('filter-handymans');
  Route::get('/faq','FrontendController@faq')->name('front.faq');
  Route::get('/ads/{id}','FrontendController@ads')->name('front.ads');
  Route::get('/about','FrontendController@about')->name('front.about');
  Route::get('/contact','FrontendController@contact')->name('front.contact');
  Route::get('/blog','FrontendController@blog')->name('front.blog');
  Route::get('/blog/{id}','FrontendController@blogshow')->name('front.blogshow');
  Route::post('/contact','FrontendController@contactemail')->name('front.contact.submit');
  Route::post('/subscribe','FrontendController@subscribe')->name('front.subscribe.submit');
  Route::post('/handyman/contact','FrontendController@useremail')->name('front.user.submit');
  Route::get('/handyman/refresh_code','FrontendController@refresh_code');


  Route::prefix('handyman')->group(function() {

  Route::get('/quotation-requests', 'UserController@QuotationRequests')->name('client-quotation-requests');
  Route::get('/handyman-quotation-requests', 'UserController@HandymanQuotationRequests')->name('handyman-quotation-requests');
  Route::get('/handyman-quotations/{id?}', 'UserController@HandymanQuotations')->name('quotations');
  Route::get('/handyman-quotations-invoices/{id?}', 'UserController@HandymanQuotationsInvoices')->name('quotations-invoices');
  Route::get('/quotations/{id?}', 'UserController@Quotations')->name('client-quotations');
  Route::get('/quotations-invoices/{id?}', 'UserController@QuotationsInvoices')->name('client-quotations-invoices');
  Route::get('/view-quote-request/{id}', 'UserController@QuoteRequest');
  Route::get('/download-quote-request/{id}', 'UserController@DownloadQuoteRequest');
  Route::get('/download-quote-invoice/{id}', 'UserController@DownloadQuoteInvoice');
  Route::get('/download-client-quote-invoice/{id}', 'UserController@DownloadClientQuoteInvoice');
  Route::get('/ask-customization/{id}', 'UserController@AskCustomization');
  Route::get('/accept-quotation/{id}', 'UserController@AcceptQuotation');
  Route::get('/view-handyman-quote-request/{id}', 'UserController@HandymanQuoteRequest');
  Route::get('/download-handyman-quote-request/{id}', 'UserController@DownloadHandymanQuoteRequest');
  Route::get('/create-quotation/{id}', 'UserController@CreateQuotation');
  Route::post('/create-quotation', 'UserController@StoreQuotation')->name('store-quotation');
  Route::post('/update-quotation', 'UserController@StoreQuotation')->name('update-quotation');
  Route::post('/create-invoice', 'UserController@StoreQuotation')->name('create-invoice');
  Route::get('/view-quotation/{id}', 'UserController@ViewQuotation')->name('view-handyman-quotation');
  Route::get('/edit-quotation/{id}', 'UserController@ViewQuotation')->name('edit-handyman-quotation');
  Route::get('/create-invoice/{id}', 'UserController@ViewQuotation')->name('create-handyman-invoice');
  Route::get('/quotation/{id}', 'UserController@ViewClientQuotation')->name('view-client-quotation');
  Route::get('/handyman-panel', 'UserController@HandymanPanel')->name('handyman-panel');
  Route::get('/dashboard', 'UserController@index')->name('user-dashboard');
  Route::get('/experience-years', 'UserController@ExperienceYears')->name('experience-years');
  Route::post('/post-experience-years', 'UserController@PostExperienceYears')->name('post-experience-years');

  Route::post('/insurance-upload', 'UserController@InsuranceUpload')->name('insurance-upload');

  Route::get('/insurance', 'UserController@Insurance')->name('insurance');
  Route::get('/ratings', 'UserController@Ratings')->name('ratings');
  Route::get('/client-dashboard', 'UserController@ClientIndex')->name('client-dashboard');
  Route::get('/handyman-bookings', 'UserController@HandymanBookings')->name('handyman-bookings');
  Route::get('/purchased-bookings', 'UserController@PurchasedBookings')->name('purchased-bookings');
  Route::get('/client-bookings', 'UserController@ClientBookings')->name('client-bookings');
  Route::get('/reset', 'UserController@resetform')->name('user-reset');
  Route::post('/reset', 'UserController@reset')->name('user-reset-submit');
  Route::get('/profile', 'UserController@profile')->name('user-profile');
  Route::get('/availability-manager', 'UserController@AvailabilityManager')->name('user-availability');
  Route::get('/radius-management', 'UserController@RadiusManagement')->name('radius-management');
  Route::get('/client-profile', 'UserController@ClientProfile')->name('client-profile');
  Route::get('/my-services', 'UserController@MyServices')->name('user-services');
  Route::get('/my-items', 'UserController@MyItems')->name('user-items');
  Route::get('/create-item', 'UserController@CreateItem')->name('create-item');
  Route::post('/store-item', 'UserController@StoreItem')->name('store-item');
  Route::get('/edit-item/{id}', 'UserController@EditItem')->name('edit-item');
  Route::post('/update-item/{id}', 'UserController@UpdateItem')->name('update-item');
  Route::get('/delete-item/{id}', 'UserController@DestroyItem')->name('delete-item');
  Route::get('/my-subservices', 'UserController@MySubServices')->name('user-subservices');
  Route::get('/delete-services', 'UserController@DeleteServices');
  Route::get('/delete-subservices', 'UserController@DeleteSubServices');
  Route::post('/profile-update', 'UserController@TemporaryProfileUpdate')->name('user-temp-profile-update');
  Route::post('/profile', 'UserController@profileupdate')->name('user-profile-update');
  Route::post('/availability-manager', 'UserController@AvailabilityUpdate')->name('user-availability-update');
  Route::post('/radius-manager', 'UserController@RadiusUpdate')->name('user-radius-update');
  Route::post('/client-profile-update', 'UserController@ClientProfileUpdate')->name('client-profile-update');
  Route::post('/my-services-update', 'UserController@MyServicesUpdate')->name('user-services-update');
  Route::post('/my-subservices-update', 'UserController@MySubServicesUpdate')->name('user-subservices-update');
  Route::post('/complete-profile', 'UserController@CompleteProfileUpdate')->name('user-complete-profile-update');
  Route::get('/forgot', 'Auth\UserForgotController@showforgotform')->name('user-forgot');
  Route::post('/forgot', 'Auth\UserForgotController@forgot')->name('user-forgot-submit');
  Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user-login');
  Route::post('/login', 'Auth\UserLoginController@login')->name('user-login-submit');
  Route::get('/register', 'Auth\UserRegisterController@showRegisterForm')->name('user-register');
  Route::get('/complete-profile', 'UserController@CompleteProfile')->name('user-complete-profile');
  Route::get('/register-handyman', 'Auth\UserRegisterController@showHandymanRegisterForm')->name('handyman-register');
  Route::post('/register', 'Auth\UserRegisterController@register')->name('user-register-submit');
  Route::post('/handyman-register', 'Auth\UserRegisterController@HandymanRegister')->name('handyman-register-submit');
  Route::post('/handyman-status-update', 'UserController@HandymanStatusUpdate')->name('handyman-status-update');
  Route::post('/client-status-update', 'UserController@ClientStatusUpdate')->name('client-status-update');
  Route::get('/logout', 'Auth\UserLoginController@logout')->name('user-logout');
  Route::post('/add-cart', 'UserController@AddCart')->name('add-cart');
  Route::post('/book-handyman', 'UserController@BookHandyman')->name('book-handyman');

  Route::get('/invoice/{id}', 'UserController@Invoice');
  Route::get('/cancelled-invoice/{id}', 'UserController@CancelledInvoice');
  Route::get('/view-images/{id}', 'UserController@Images');


  Route::post('/payment', 'PaymentController@store')->name('payment.submit');
  Route::get('/payment/cancle', 'PaymentController@paycancle')->name('payment.cancle');
  Route::get('/payment/return', 'PaymentController@payreturn')->name('payment.return');

  Route::get('/publish', 'UserController@publish')->name('user-publish');
  Route::get('/feature', 'UserController@feature')->name('user-feature');
  });

  Route::get('finalize', 'FrontendController@finalize');
  Route::post('the/genius/ocean/2441139', 'FrontEndController@subscription');

  Route::post('/user/payment/notify', 'PaymentController@notify')->name('payment.notify');
  Route::post('/stripe-submit', 'StripeController@store')->name('stripe.submit');

  Route::prefix('logstof')->group(function() {

  Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
  Route::get('/invoice/{id}', 'AdminController@Invoice')->name('admin-hi');
  Route::get('/cancelled-invoice/{id}', 'AdminController@CancelledInvoice')->name('admin-chi');
  Route::get('/client-invoice/{id}', 'AdminController@ClientInvoice')->name('admin-ci');
  Route::get('/client-cancelled-invoice/{id}', 'AdminController@ClientCancelledInvoice')->name('admin-cci');
  Route::get('/view-images/{id}', 'AdminController@Images');
  Route::get('/download-invoice/{id}', 'AdminController@DownloadInvoice')->name('admin-download-hi');
  Route::get('/download-cancelled-invoice/{id}', 'AdminController@DownloadCancelledInvoice')->name('admin-download-chi');
  Route::get('/client-download-invoice/{id}', 'AdminController@ClientDownloadInvoice')->name('admin-download-ci');
  Route::get('/client-download-cancelled-invoice/{id}', 'AdminController@ClientDownloadCancelledInvoice')->name('admin-download-cci');
  Route::get('/add-terminals', 'AdminController@AddTerminals')->name('add-terminals');
  Route::get('/profile', 'AdminController@profile')->name('admin-profile');
  Route::post('/profile', 'AdminController@profileupdate')->name('admin-profile-update');
  Route::get('/reset-password', 'AdminController@passwordreset')->name('admin-password-reset');
  Route::post('/reset-password', 'AdminController@changepass')->name('admin-password-change');
  Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin-login-submit');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
  Route::post('/admin-status-update', 'AdminController@AdminStatusUpdate')->name('admin-status-update');
  Route::get('/handyman-terms', 'AdminController@HandymanTerms')->name('admin-handyman-terms');
  Route::get('/client-terms', 'AdminController@ClientTerms')->name('admin-client-terms');
  Route::post('/handyman-terms-post', 'AdminController@HandymanTermsPost')->name('admin-handyman-terms-post');
  Route::post('/client-terms-post', 'AdminController@ClientTermsPost')->name('admin-client-terms-post');


  Route::get('/quotation-questions', 'AdminUserController@QuotationQuestions')->name('quotation-questions');
  Route::get('/create-question', 'AdminUserController@CreateQuestion')->name('create-question');
  Route::post('/create-question', 'AdminUserController@SubmitQuestion')->name('save-question');
  Route::get('/edit-question/{id}', 'AdminUserController@EditQuestion')->name('edit-question');
  Route::post('/edit-question/{id}', 'AdminUserController@UpdateQuestion');
  Route::get('/delete-question/{id}', 'AdminUserController@DeleteQuestion')->name('delete-question');


  Route::get('/quotation-requests', 'AdminUserController@QuotationRequests')->name('quotation-requests');
  Route::get('/handyman-quotations/{id?}', 'AdminUserController@HandymanQuotations')->name('handyman-quotations');
  Route::get('/handyman-quotations-invoices/{id?}', 'AdminUserController@HandymanQuotationsInvoices')->name('handyman-quotations-invoices');
  Route::get('/view-quote-request/{id}', 'AdminUserController@QuoteRequest');
  Route::get('/view-quotation/{id}', 'AdminUserController@ViewQuotation')->name('view-quotation');
  Route::get('/download-quote-request/{id}', 'AdminUserController@DownloadQuoteRequest');
  Route::get('/download-quote-invoice/{id}', 'AdminUserController@DownloadQuoteInvoice');
  Route::get('/send-quote-request/{id}', 'AdminUserController@SendQuoteRequest');
  Route::post('/send-quote-request', 'AdminUserController@SendQuoteRequestHandymen')->name('send-quote-request');
  Route::post('/approve-handyman-quotations', 'AdminUserController@ApproveHandymanQuotations')->name('approve-handyman-quotations');
  Route::get('/handymans', 'AdminUserController@index')->name('admin-user-index');
  Route::get('/clients', 'AdminUserController@Clients')->name('admin-user-client');
  Route::get('/bookings', 'AdminUserController@UserBookings')->name('admin-user-bookings');
  Route::get('/user-requests', 'AdminUserController@UserRequests')->name('admin-user-requests');
  Route::get('/request/{id}', 'AdminUserController@UserRequest')->name('admin-user-request');
  Route::post('/request-update', 'AdminUserController@RequestProfileUpdate')->name('request-profile-update');
  Route::get('/handymans/create', 'AdminUserController@create')->name('admin-user-create');
  Route::post('/handymans/create', 'AdminUserController@store')->name('admin-user-store');
  Route::get('/handymans/edit/{id}', 'AdminUserController@edit')->name('admin-user-edit');
  Route::post('/handymans/update/{id}', 'AdminUserController@update')->name('admin-user-update');
  Route::post('/handymans/insurance-update/{id}', 'AdminUserController@InsuranceUpdate')->name('admin-user-insurance-update');
  Route::get('/handymans/delete/{id}', 'AdminUserController@destroy')->name('admin-user-delete');
  Route::get('/handymans/insurance/{id}', 'AdminUserController@Insurance')->name('admin-user-insurance');

  Route::get('/handymans/details/{id}', 'AdminUserController@Details')->name('admin-user-details');

  Route::get('/handymans/client-details/{id}', 'AdminUserController@ClientDetails')->name('admin-user-client-details');

  Route::get('/handymans/status/{id1}/{id2}', 'AdminUserController@status')->name('admin-user-st');

  Route::get('/category', 'CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/update/{id}', 'CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('admin-cat-delete');

  Route::get('/items', 'ItemController@index')->name('admin-item-index');
  Route::get('/item/create', 'ItemController@create')->name('admin-item-create');
  Route::post('/item/create', 'ItemController@store')->name('admin-item-store');
  Route::get('/item/edit/{id}', 'ItemController@edit')->name('admin-item-edit');
  Route::post('/item/update/{id}', 'ItemController@update')->name('admin-item-update');
  Route::get('/item/delete/{id}', 'ItemController@destroy')->name('admin-item-delete');

  Route::get('/faq', 'FaqController@index')->name('admin-fq-index');
  Route::get('/faq/create', 'FaqController@create')->name('admin-fq-create');
  Route::post('/faq/create', 'FaqController@store')->name('admin-fq-store');
  Route::get('/faq/edit/{id}', 'FaqController@edit')->name('admin-fq-edit');
  Route::post('/faq/update/{id}', 'FaqController@update')->name('admin-fq-update');
  Route::post('/faqup', 'PageSettingController@faqupdate')->name('admin-faq-update');
  Route::get('/faq/delete/{id}', 'FaqController@destroy')->name('admin-fq-delete');


  Route::get('/blog', 'AdminBlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'AdminBlogController@create')->name('admin-blog-create');
  Route::post('/blog/create', 'AdminBlogController@store')->name('admin-blog-store');
  Route::get('/blog/edit/{id}', 'AdminBlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/edit/{id}', 'AdminBlogController@update')->name('admin-blog-update');
  Route::get('/blog/delete/{id}', 'AdminBlogController@destroy')->name('admin-blog-delete');

  Route::get('/testimonial', 'PortfolioController@index')->name('admin-ad-index');
  Route::get('/testimonial/create', 'PortfolioController@create')->name('admin-ad-create');
  Route::post('/testimonial/create', 'PortfolioController@store')->name('admin-ad-store');
  Route::get('/testimonial/edit/{id}', 'PortfolioController@edit')->name('admin-ad-edit');
  Route::post('/testimonial/edit/{id}', 'PortfolioController@update')->name('admin-ad-update');
  Route::get('/testimonial/delete/{id}', 'PortfolioController@destroy')->name('admin-ad-delete');


  Route::get('/advertise', 'AdvertiseController@index')->name('admin-adv-index');
  Route::get('/advertise/st/{id1}/{id2}', 'AdvertiseController@status')->name('admin-adv-st');
  Route::get('/advertise/create', 'AdvertiseController@create')->name('admin-adv-create');
  Route::post('/advertise/create', 'AdvertiseController@store')->name('admin-adv-store');
  Route::get('/advertise/edit/{id}', 'AdvertiseController@edit')->name('admin-adv-edit');
  Route::post('/advertise/edit/{id}', 'AdvertiseController@update')->name('admin-adv-update');
  Route::get('/advertise/delete/{id}', 'AdvertiseController@destroy')->name('admin-adv-delete');

  Route::get('/page-settings/about', 'PageSettingController@about')->name('admin-ps-about');
  Route::post('/page-settings/about', 'PageSettingController@aboutupdate')->name('admin-ps-about-submit');
  Route::get('/page-settings/contact', 'PageSettingController@contact')->name('admin-ps-contact');
  Route::post('/page-settings/contact', 'PageSettingController@contactupdate')->name('admin-ps-contact-submit');



  Route::get('/social', 'SocialSettingController@index')->name('admin-social-index');
  Route::get('/how-it-works', 'AdminController@HowItWorks')->name('admin-how-it-works');
  Route::post('/social/update', 'SocialSettingController@update')->name('admin-social-update');
  Route::post('/how-it-works/update', 'AdminController@HowItWorksUpdate')->name('admin-how-it-works-update');
  Route::get('/reasons-to-book', 'AdminController@ReasonsToBook')->name('admin-reasons-to-book');
  Route::post('/reasons-to-book/update', 'AdminController@ReasonsToBookUpdate')->name('admin-reasons-to-book-update');

  Route::get('/filter-settings', 'SocialSettingController@FilterSettings')->name('admin-filter-settings');
  Route::post('/filter/update', 'SocialSettingController@FilterUpdate')->name('admin-filter-update');


  Route::get('/seotools/analytics', 'SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');

  Route::get('/general-settings/logo', 'GeneralSettingController@logo')->name('admin-gs-logo');
  Route::post('/general-settings/logo', 'GeneralSettingController@logoup')->name('admin-gs-logoup');

  Route::get('/general-settings/favicon', 'GeneralSettingController@fav')->name('admin-gs-fav');
  Route::post('/general-settings/favicon', 'GeneralSettingController@favup')->name('admin-gs-favup');


  Route::get('/general-settings/loader', 'GeneralSettingController@load')->name('admin-gs-load');
  Route::post('/general-settings/loader', 'GeneralSettingController@loadup')->name('admin-gs-loadup');

  Route::get('/general-settings/payments', 'GeneralSettingController@payments')->name('admin-gs-payments');
  Route::post('/general-settings/payments', 'GeneralSettingController@paymentsup')->name('admin-gs-paymentsup');

  Route::get('/general-settings/contents', 'GeneralSettingController@contents')->name('admin-gs-contents');
  Route::post('/general-settings/contents', 'GeneralSettingController@contentsup')->name('admin-gs-contentsup');

  Route::post('/general-settings/contents-change', 'GeneralSettingController@contentsChange')->name('theme.change');

  Route::get('/general-settings/bgimg', 'GeneralSettingController@bgimg')->name('admin-gs-bgimg');
  Route::post('/general-settings/bgimgup', 'GeneralSettingController@bgimgup')->name('admin-gs-bgimgup');

  Route::get('/general-settings/about', 'GeneralSettingController@about')->name('admin-gs-about');
  Route::post('/general-settings/about', 'GeneralSettingController@aboutup')->name('admin-gs-aboutup');

  Route::get('/general-settings/address', 'GeneralSettingController@address')->name('admin-gs-address');
  Route::post('/general-settings/address', 'GeneralSettingController@addressup')->name('admin-gs-addressup');

  Route::get('/general-settings/footer', 'GeneralSettingController@footer')->name('admin-gs-footer');
  Route::post('/general-settings/footer', 'GeneralSettingController@footerup')->name('admin-gs-footerup');

  Route::get('/general-settings/bg-info', 'GeneralSettingController@bginfo')->name('admin-gs-bginfo');
  Route::post('/general-settings/bg-info', 'GeneralSettingController@bginfoup')->name('admin-gs-bginfoup');

  Route::get('/subscribers', 'SubscriberController@index')->name('admin-subs-index');
  Route::get('/subscribers/download', 'SubscriberController@download')->name('admin-subs-download');

  Route::get('/languages', 'LanguageController@lang')->name('admin-lang-index');
  Route::post('/languages', 'LanguageController@langup')->name('admin-lang-submit');
  });
