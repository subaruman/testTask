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

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>['role']], function(){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
    Route::resource('/users', 'UserController', ['as' => 'admin']);
    Route::put('/setban', 'UserController@setban', ['as' => 'users'])->name('admin.users.setban');

});
//Route::get('/admin', 'Admin\DashboardController@dashboard', ['namespace'=>['Admin'], 'middleware'=>['auth']])->name('admin.index');
//Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
//Route::post('admin/users/create', 'Admin\UserController@create')->name('admin.users.create');
//Route::delete('admin/users/destroy', 'Admin\UserController@destroy')->name('admin.users.destroy');
//Route::get('admin/users/edit', 'Admin\UserController@edit')->name('admin.users.edit');
//Route::put('admin/users/update', 'Admin\UserController@update')->name('admin.users.update');
//Route::patch('admin/users/setban', 'Admin\UserController@setban')->name('admin.users.setban');

Route::get('/ban', function () {
    return view('ban');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home',[
    'middleware' => 'ban',
    'uses' => 'RoleController@index',
]);




Route::group(['middleware'=>['auth']], function() {
    Route::resource('/checklist', 'ChecklistController');

});

//Route::get('/checklist', 'ChecklistController@index')->name('checklist.index');
//Route::get('/checklist/create', 'ChecklistController@create')->name('checklist.create');
