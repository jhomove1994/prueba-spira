<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login');

Route::group(['middleware' => ['auth:api']], function() {
    Route::group(['middleware' => ['role:administrador']], function() {
        Route::resource('users', 'UserController');
        Route::resource('courses', 'CourseController');
        Route::resource('users.courses', 'UserCourseController');
    });

    Route::group(['middleware' => ['role:alumno']], function() {
        Route::get('users/courses/me', 'UserCourseController@me')->name('user.courses.me');
    });
    /*
    Route::resource('users.courses', 'UserCourseController');*/
});
