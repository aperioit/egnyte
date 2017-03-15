<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('test', function() {
	echo '<img src="' . asset('storage/logo.png') . '"></img>';
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contact', 'ContactController');
Route::resource('position', 'PositionController');
Route::resource('department', 'DepartmentController');

Route::get('newhire', 'Admin\NewHiresController@index');
Route::post('newhire', 'Admin\NewHiresController@store');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

Route::name('admin.')->prefix('admin')->middleware('role:admin')->group(function () {
	Route::get('/', function () {
		return view('admin.dashboard');
	});
    Route::resource('role', 'Admin\RoleController');
    Route::resource('permission', 'Admin\PermissionController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('location', 'Admin\LocationController');
	Route::resource('position', 'Admin\PositionController');
	Route::resource('status', 'Admin\StatusController');
	Route::resource('task', 'Admin\TaskController');
	Route::resource('tasklist', 'Admin\TaskListController');
	Route::resource('contact', 'Admin\ContactController');
	Route::resource('notifygroup', 'Admin\NotifyGroupController');
});