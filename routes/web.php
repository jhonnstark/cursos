<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::get('/teacher/login', 'Auth\TeacherLoginController@showLoginForm');

Route::post('/admin/login', 'Auth\AdminLoginController@Login');
Route::post('/teacher/login', 'Auth\TeacherLoginController@login');


Route::prefix('/admin')
    ->name('admin.')
    ->namespace('Admin')
    ->middleware('auth:admin')
    ->group(function(){
    //All the admin routes will be defined here...
        Route::get('/', 'AdminDashboard@admin');
});
Route::prefix('/teacher')
    ->middleware('auth:teacher')
    ->name('teacher.')
    ->namespace('Teacher')
    ->group(function(){
    //All the teacher routes will be defined here...
        Route::get('/', 'TeacherDashboard@teacher');
});
