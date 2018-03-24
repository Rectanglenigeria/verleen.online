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

//Route::get('/', 'HomeController@showLandingPage')->name('landing.page');

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/ref/{phone}', 'Auth\RegisterController@showRegistrationForm')->name('register');



Auth::routes();

Route::get('/about-us', 'HomeController@about')->name('about-us');


Route::get('/testimonies', 'HomeController@showTestimonies')->name('testimonies');

Route::get('/contact-us', 'HomeController@showContactForm')->name('contact-us');

Route::post('/contact-us', 'HomeController@submitContactForm')->name('contact-us.submit');

Route::get('/faqs', 'HomeController@faqs')->name('faqs');

Route::get('/how-it-works', 'HomeController@hiw')->name('hiw');




Route::get('/activate_user/{id}', 'Auth\RegisterController@showActivationForm')->name('activate.user');

Route::post('/activate_user', 'Auth\RegisterController@activateUser')->name('activate.user.submit');

Route::get('/reVerify/{id}', 'Auth\RegisterController@reVerify')->name('activate.user.reverify');






//remove this when done
Route::get('/reVerify', 'Auth\RegisterController@reVerify')->name('user.ph.create');
//remove this when done
Route::get('/reVerify', 'Auth\RegisterController@showRegistrationForm')->name('terms');








Route::group(['middleware'=>['auth']], function(){

	Route::get('/user/profile', 'Dashboard\ProfileController@index')->name('user.profile');

	Route::post('/user/profile', 'Dashboard\ProfileController@update')->name('user.profile.update');

});


Route::group(['middleware'=>['auth', 'completeProfile']], function(){

	Route::get('/home', 'Dashboard\HomeController@index')->name('home');

	Route::get('/user/profile-view', 'Dashboard\ProfileController@view')->name('user.profile.view');

	Route::get('/user/help/provide', 'Dashboard\PhController@showPhForm')->name('user.help.provide');

	Route::post('/user/help/provide', 'Dashboard\PhController@create')->name('user.help.provide.submit');

	Route::get('/user/wallet', 'Dashboard\WalletController@view')->name('user.wallet');

	Route::get('/user/merges/phDetails/{id}', 'Dashboard\MergeController@viewPhDetails')->name('user.merges.phdetails');

	Route::get('/user/merges/ghDetails/{id}', 'Dashboard\MergeController@viewGhDetails')->name('user.merges.ghdetails');

	Route::get('/user/bonus/reg', 'Dashboard\BonusController@viewReg')->name('user.bonus.reg');

	Route::get('/user/bonus/ref', 'Dashboard\BonusController@viewRef')->name('user.bonus.ref');

	Route::get('/user/wallet/view', 'Dashboard\WalletController@view')->name('user.wallet.view');

	Route::get('/user/news/list', 'Dashboard\NewsController@list')->name('user.news.list');

	Route::get('/user/news/view/{id}', 'Dashboard\NewsController@view')->name('user.news.view');

	Route::get('/user/testimony/view', 'Dashboard\TestimonyController@view')->name('user.testimony.view');

	Route::get('/user/testimony/create', 'Dashboard\TestimonyController@showCreateForm')->name('user.testimony.create');

	Route::post('/user/testimony/create', 'Dashboard\TestimonyController@create')->name('user.testimony.create.submit');




	

});

















Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::group(['middleware'=>['auth:admin']], function(){

	Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');

}); 

Route::group(['middleware'=>['auth:admin', 'superadmin']], function(){

	Route::get('/admin/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');

	Route::post('/admin/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

});




