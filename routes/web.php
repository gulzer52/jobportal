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
// Jobs Profile
Route::get('/', 'JobController@index');
Route::get('jobs/create', 'JobController@create')->name('jobs.create');
Route::post('jobs/store', 'JobController@store')->name('jobs.store');
Route::get('jobs/myjob', 'JobController@myjob')->name('jobs.myjob');
Route::post('jobs/apply/{id}', 'JobController@apply')->name('jobs.apply');
Route::get('jobs/applicants', 'JobController@applicants');
Route::get('jobs/alljobs', 'JobController@alljobs')->name('alljobs');
Route::post('/applications/{id}','JobController@apply')->name('apply');
// Search Jobs With vuejs
Route::get('/jobs/search', 'JobController@searchJob');
// Save and Unsave Job
Route::post('/save/{id}','FavoriteController@saveJob');
Route::post('/unsave/{id}','FavoriteController@unSaveJob');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
// Company Profile
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::post('/company/coverphoto', 'CompanyController@coverphoto')->name('company.coverphoto');
Route::post('/company/logo', 'CompanyController@logo')->name('company.logo');
Route::get('/company', 'CompanyController@company')->name('company');

// User Proifle
Route::get('user/profile', 'UserProfileController@index')->name('user.profile');
Route::post('user/profile/create', 'UserProfileController@store')->name('profile.store');
Route::post('profile/coverletter', 'UserProfileController@coverletter')->name('profile.coverletter');
Route::post('profile/resume', 'UserProfileController@resume')->name('profile.resume');
Route::post('profile/avatar', 'UserProfileController@avatar')->name('profile.avatar');

// Employer Profile
Route::view('employment/register', 'auth.emp-register')->name('employee.reg');
Route::post('employment/register', 'EmployerProfileController@employerProfile')->name('employer.register');

// Category Option
Route::get('/category/{id}','CategoryController@index')->name('category.index');
// Email Refer Route
Route::post('/email/job', 'EmailController@send')->name('mail');


















