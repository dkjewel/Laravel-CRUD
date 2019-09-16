<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('department', 'DepartmentController');

Route::resource('course', 'CourseController');

Route::resource('student', 'StudentController');










