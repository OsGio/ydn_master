<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind('adads', function($app){
    return new AdAdsController;
});
App::bind('adgroup', function($app){
    return new AdGroupController;
});
App::bind('keyword', function($app){
    return new KeywordController;
});
App::bind('campaign', function($app){
    return new CampaignController;
});


/* ver nodb
Route::get('/', 'PageController@getIndex');
Route::any('/preview', 'FunctionController@postPreview');
Route::any('/saved', 'FunctionController@postSaved');


Route::get('/excepts_keywords', 'PageController@getExceptsKeywords');
Route::post('/excepts_keywords', 'FunctionController@postExceptsKeywords');

Route::get('/ads_group', 'PageController@getAdsGroup');
Route::post('/ads_group', 'FunctionController@postAdsGroup');

Route::get('/add_ads', 'PageController@getAddAds');
Route::post('/add_ads', 'FunctionController@postAddAds');
*/

Route::get('/', 'PageController@getIndex');
Route::post('/', 'FunctionController@postIndex');
Route::get('/preview', 'PageController@getPreview');
Route::get('/ex_keywords', 'PageController@getExKeywords');
Route::post('/ex_keywords', 'FunctionController@postExKeywords');
Route::get('/add_adgroup', 'PageController@getAddAdgroup');
//Route::get('/add_adgroup', 'PageController@getAddAdads');



Route::any('/csv', 'FunctionController@postCsv');


// Making Schema
Route::get('create/{table_name}', 'SchemaController@create');
Route::get('delete/{table_name}', 'SchemaController@delete');
Route::get('truncate/{table_name}', 'SchemaController@truncate');
