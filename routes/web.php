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

Route::get('/', 'Index\IndexController@index')->name('index');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*用户模块*/
Route::resource('users', 'Index\UsersController', ['only' => ['show', 'update', 'edit']]);

Route::resource('topics', 'Index\TopicController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}', 'Index\TopicController@show')->name('topics.show');
Route::post('upload_image', 'Index\TopicController@uploadImage')->name('topics.upload_image');

Route::resource('categories', 'Index\CategoryController', ['only' => ['show']]);

Route::resource('replies', 'Index\ReplyController', ['only' => ['store', 'destroy']]);

Route::resource('notifications', 'Index\NotificationsController', ['only' => ['index']]);

Route::get('admin', 'Admin\IndexController@index')->name('admin.index');

Route::get('admin/topics', 'Admin\TopicController@index')->name('admin.topics.index');
Route::delete('admin/topics/{topic}', 'Admin\TopicController@destory')->name('admin.topics.destory');

Route::get('admin/replies', 'Admin\ReplyController@index')->name('admin.replies.index');
Route::delete('admin/replies/{reply}', 'Admin\ReplyController@destory')->name('admin.replies.destory');

Route::get('admin/users', 'Admin\UserController@index')->name('admin.users.index');
Route::get('admin/users/create', 'Admin\UserController@create')->name('admin.users.create');
Route::post('admin/users', 'Admin\UserController@store')->name('admin.users.store');
Route::get('admin/users/{user}/edit', 'Admin\UserController@edit')->name('admin.users.edit');
Route::put('admin/users/{user}', 'Admin\UserController@update')->name('admin.users.update');
Route::delete('admin/users/{user}', 'Admin\UserController@destory')->name('admin.users.destory');

Route::get('admin/roles', 'Admin\RoleController@index')->name('admin.roles.index');
Route::get('admin/roles/create', 'Admin\RoleController@create')->name('admin.roles.create');
Route::post('admin/roles', 'Admin\RoleController@store')->name('admin.roles.store');
Route::get('admin/roles/{role}/edit', 'Admin\RoleController@edit')->name('admin.roles.edit');
Route::put('admin/roles/{role}', 'Admin\RoleController@update')->name('admin.roles.update');
Route::delete('admin/roles/{role}', 'Admin\RoleController@destory')->name('admin.roles.destory');

Route::get('admin/permissions', 'Admin\PermissionController@index')->name('admin.permissions.index');
Route::get('admin/permissions/create', 'Admin\PermissionController@create')->name('admin.permissions.create');
Route::post('admin/permissions', 'Admin\PermissionController@store')->name('admin.permissions.store');
Route::get('admin/permissions/{permission}/edit', 'Admin\PermissionController@edit')->name('admin.permissions.edit');
Route::put('admin/permissions/{permission}', 'Admin\PermissionController@update')->name('admin.permissions.update');
Route::delete('admin/permissions/{permission}', 'Admin\PermissionController@destory')->name('admin.permissions.destory');


