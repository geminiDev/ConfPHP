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
    Pattern
\*-----------------------------------------------------------*/
Route::pattern('id', '[1-9][0-9]*');
/*-----------------------------------------------------------*\
    BlogController
\*-----------------------------------------------------------*/

Route::get('/', 'BlogController@index');
Route::get('single/{id}', 'BlogController@showPost');
Route::get('tag/{id}', 'BlogController@showPostByTag');
Route::get('mentions', 'BlogController@noticesPage');
Route::get('about', 'BlogController@aboutPage');

/*-----------------------------------------------------------*\
    Controller de RESTfull
\*-----------------------------------------------------------*/
Route::resource('comment', 'CommentController');
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
Route::put('status/{id}', 'PostController@changeToStatus');
/*-----------------------------------------------------------*\
    Service Mail
\*-----------------------------------------------------------*/
Route::get('contact', 'MailController@createToMail');
Route::post('contact', 'MailController@sendToMail');

Route::group(['middleware'=>'auth'], function(){
    Route::resource('post', 'PostController');
    Route::get('admin', 'PostController@index');
});