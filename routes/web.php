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
        Route::get('/', 'AdminDashboard@admin')->name('dashboard');


        Route::prefix('/admins')
            ->name('admins.')
            ->group(function(){
                Route::get('/', 'AdminController@index')->name('list');
                Route::get('/list', 'AdminController@list');
                Route::get('/register', 'AdminController@create')->name('register');;
                Route::post('/register', 'AdminController@store');
                Route::post('/delete', 'AdminController@destroy');
            });

        Route::prefix('/teacher')
            ->name('teacher.')
            ->group(function(){
                Route::get('/', 'TeacherController@index')->name('list');
                Route::get('/list', 'TeacherController@list');
                Route::get('/register', 'TeacherController@create')->name('register');;;
                Route::post('/register', 'TeacherController@store');
                Route::post('/delete', 'TeacherController@destroy');
            });

        Route::prefix('/user')
            ->name('user.')
            ->group(function(){
                Route::get('/', 'UserController@index')->name('list');
                Route::get('/list', 'UserController@list');
                Route::get('/register', 'UserController@create')->name('register');;;
                Route::post('/register', 'UserController@store');
                Route::post('/delete', 'UserController@destroy');
            });

        Route::prefix('/course')
            ->name('course.')
            ->group(function(){
                Route::get('/', 'CourseController@index')->name('list');
                Route::get('/list', 'CourseController@list');
                Route::get('/register', 'CourseController@create');
                Route::post('/register', 'CourseController@store');
                Route::post('/delete', 'CourseController@destroy');
            });
});
Route::prefix('/teacher')
    ->middleware('auth:teacher')
    ->name('teacher.')
    ->namespace('Teacher')
    ->group(function(){
    //All the teacher routes will be defined here...
        Route::get('/', 'TeacherDashboard@teacher');
});
