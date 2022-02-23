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

Route::middleware('App\Http\Middleware\Authenticate')->name('home')->get('/home','Controller@home');

Route::name('index')->get('/','Controller@index');
//Route::name('login')->post('/login','Auth\\AuthenticatedSessionController@store');
//Route::name('logout')->post('/logout','Auth\\AuthenticatedSessionController@destroy');

