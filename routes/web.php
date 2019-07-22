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

Route::resource('/admin', 'AdminController');


Route::get('/signin', function () {
    return view('auth.login');
});

//Route::get('/forget', function () {
//    return view('auth.forget');
//});


Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register_action','AdminController@store');
Route::post('/login_check','AdminController@login');
//Route::get('verfyEmailFirst','AdminController@login')->name('verfyEmailFirst');




//Route::get('/users/confirmation/{token}','AdminController@confirmation')->name('confirmation');


