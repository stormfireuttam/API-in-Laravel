<?php

use Illuminate\Http\Request;

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
//Route to get all the countries
Route::get('country', 'Country\CountryController@country');
//Route to get a specific country
Route::get('country/{id}', 'Country\CountryController@countryById');
//Route to add a new country
Route::post('country', 'Country\CountryController@createCountry');