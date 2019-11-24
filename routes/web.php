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


Route::get("/", 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('getJobDetails/{id}', 'HomeController@getJobDetails');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile-picture', 'UserController@uploadPicture')->name('profile.picture');
Route::post('/user-cv', 'UserController@uploadCv')->name('user.cv');
Route::post('/user_skill', 'UserController@addUserSkill');
Route::get('delete_skill', 'UserController@destroy');
Route::get('/getOneSkill', 'UserController@showSkill');
Route::get('apply-job/{id}', 'UserController@applyJob');

Route::group(['prefix' => 'employeer'], function () {
	Route::get('home', 'EmployeerController@index')->name('employeer.dashboard');

	Route::get('/', 'Employeer\LoginController@showLoginForm')->name('employeer.login');
	Route::post('employeerLogin', 'Employeer\LoginController@login')->name('employeerLogin');

	Route::get('employeerRegistration', 'Employeer\RegisterController@showRegistrationForm')->name('employeer.register');
	Route::post('employeerRegistration', 'Employeer\RegisterController@register')->name('employeerRegistration');

	Route::get('job_info', 'EmployeerController@create')->name('employeer.job_info');
	Route::post('job_info', 'EmployeerController@store')->name('employeer.job_info.submit');

	Route::get('dashboard', 'EmployeerController@dashboard')->name('dashboard');
	Route::get('getCandidateInfo/{id}', 'EmployeerController@getCandidateInfo');

});