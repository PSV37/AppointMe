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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
 

// Route::get('admin/senseis', function () {
//     return view('admin/senseis');
// });

Route::get('admin/sensei/details/{id}','Admin\\SenseiController@getSenseiById');

Route::get('admin/billing', function () {
    return view('admin/billing');
});

Route::get('admin/settings', function () {
    return view('admin/setting');
});



 
Route::post('admin/update/profile','Admin\\SenseiController@updateProfile');
Route::get('admin/senseis','Admin\\SenseiController@index');
Route::get('admin/list','Admin\\SenseiController@getListMentors');
Route::get('admin/sync','Admin\\SenseiController@syncSenseisToDB');
Route::get('admin/clear-table','Admin\\SenseiController@truncateTable');



/**************** Users **************/
Route::get('users','Admin\\UserController@index');
Route::get('users/all','Admin\\UserController@getUsersList');
Route::get('user/edit','Admin\\UserController@editUser');
Route::get('user/remove','Admin\\UserController@removeUser');


/**************** Roles **************/
Route::get('roles', 'Admin\\RoleController@index');
Route::get('roles/all', 'Admin\\RoleController@getRolesList');
Route::get('role/{id}', 'Admin\\RoleController@getRoleObj');
Route::post('role/edit', 'Admin\\RoleController@editRole');
Route::get('role/remove', 'Admin\\RoleController@removeRole');
Route::post('role/create', 'Admin\\RoleController@createRole');

/************************ Google Calender Api's *****************************/
Route::get("/google-calendar/connect", "GoogleCalendarController@connect");
Route::get("/google-calendar/connect1", "GoogleCalendarController@store");

Route::get("get-resource", "GoogleCalendarController@getResources");

Route::get("google-calendar", "GoogleCalendarController@googleCalendar");
