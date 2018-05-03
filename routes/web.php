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
Route::get('/test', 'TestController@test');
Route::get('/taskcomplete/{id}', function ($id) {
    $task = \App\ActiveTask::findOrFail($id);
    $completed = !$task->complete;
    
    $task->complete = !$task->complete;
    $task->save();

    return back();
});
Route::get('/newhirecomplete/{id}', function ($id) {
    $newhire = \App\NewHire::findOrFail($id);
    $completed = !$newhire->completed;
    
    $newhire->completed = $completed;
    if ($completed) {
        $newhire->completed_at = \Carbon\Carbon::now();
    } else {
        $newhire->completed_at = NULL;
    }
    $newhire->save();

    return back();
});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('/', 'NewHireController@index');

Route::resource('newhires', 'NewHireController', ['except' => [
    'destroy'
]]);

Route::resource('positions', 'PositionController');
Route::resource('orders', 'OrderController', ['only' => [
    'index', 'show'
]]);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::resource('positions', 'Admin\PositionController', ['except' => ['delete']]);
    Route::resource('vendors', 'Admin\VendorController', ['except' => ['show', 'delete']]);
    Route::resource('vendorcontacts', 'Admin\VendorContactController', ['except' => ['show', 'delete']]);
    Route::resource('equipment', 'Admin\EquipmentController', ['except' => ['show', 'delete']]);
    Route::resource('equipmenttypes', 'Admin\EquipmentTypeController', ['except' => ['show', 'delete']]);
    Route::resource('assignments', 'Admin\AssignmentController', ['except' => ['show', 'delete']]);
    Route::resource('assignmentmethods', 'Admin\AssignmentMethodController', ['except' => ['show', 'delete']]);
    Route::resource('orders', 'Admin\OrderController', ['except' => ['show', 'delete']]);
    Route::resource('orderstatus', 'Admin\OrderStatusController', ['except' => ['show', 'delete']]);
    Route::resource('tasklists', 'Admin\TaskListController');
    Route::resource('tasks', 'Admin\TaskController');
});
