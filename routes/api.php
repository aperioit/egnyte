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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::name('api.')->group(function () {
    Route::get('positions/{position}/tasklists', 'Api\PositionController@tasklists');
    Route::put('positions/{position}/attach/{tasklist}', 'Api\PositionController@attach');
    Route::delete('positions/{position}/detach/{tasklist}', 'Api\PositionController@detach');
    Route::resource('positions', 'Api\PositionController');
    Route::resource('vendors', 'Api\VendorController');
    Route::resource('vendorcontacts', 'Api\VendorContactController');
    Route::resource('equipment', 'Api\EquipmentController');
    Route::resource('equipmenttypes', 'Api\EquipmentTypeController');
    Route::resource('assignments', 'Api\AssignmentController');
    Route::resource('assignmentmethods', 'Api\AssignmentMethodController');
    Route::resource('orders', 'Api\OrderController');
    Route::resource('orderstatus', 'Api\OrderStatusController');
    Route::resource('tasklists', 'Api\TaskListController');
    Route::put('/tasks/updateorder', 'Api\TaskController@updateOrder')->name('tasks.updateorder');
    Route::put('/newhire/notes', 'Api\NewHireController@updateNotes')->name('newhire.notes');
    Route::resource('tasks', 'Api\TaskController');    
});
