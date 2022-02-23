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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')
    ->namespace('\\App\\Domains\\Customer\\Http\\Controllers')
    ->group(function(){
        Route::name('api.customer.index')->get('customer/index','CustomerController@index');
        Route::name('api.customer.create')->post('customer/create','CustomerController@store');
        Route::name('api.customer.edit')->put('customer/edit/{customer}','CustomerController@update');
        Route::name('api.customer.show')->get('customer/show/{customer}','CustomerController@show');
        Route::name('api.customer.delete')->delete('customer/delete/{customer}','CustomerController@destroy');
    });