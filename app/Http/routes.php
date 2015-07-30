<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*-----------------------------------------------------------*\
    BlogController
\*-----------------------------------------------------------*/

Route::get('/', 'BlogController@index');
Route::get('single/{id}', 'BlogController@showPost');
Route::get('tag/{id}', 'BlogController@showPostByTag');

/*-----------------------------------------------------------*\
    Controller de RESTfull
\*-----------------------------------------------------------*/
Route::resource('comment', 'CommentController');
Route::resource('post', 'PostController');

/*-----------------------------------------------------------*\
    Authentification DASHBOARD
\*-----------------------------------------------------------*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
/*-----------------------------------------------------------*\
    DASHBOARD
\*-----------------------------------------------------------*/
Route::get('admin', 'PostController@index');
Route::put('status/{id}', 'PostController@changeToStatus');
/*-----------------------------------------------------------*\
    Service Mail
\*-----------------------------------------------------------*/
Route::get('contact', 'MailController@createToMail');
Route::post('contact', 'MailController@sendToMail');