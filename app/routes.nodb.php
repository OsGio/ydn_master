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

//Route::controller('AdAds', 'AdAdsController');
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


Route::get('/', 'PageController@getIndex');
Route::any('/preview', 'FunctionController@postPreview');
Route::any('/saved', 'FunctionController@postSaved');


Route::get('/excepts_keywords', 'PageController@getExceptsKeywords');
Route::post('/excepts_keywords', 'FunctionController@postExceptsKeywords');

Route::get('/ads_group', 'PageController@getAdsGroup');
Route::post('/ads_group', 'FunctionController@postAdsGroup');

Route::get('/add_ads', 'PageController@getAddAds');
Route::post('/add_ads', 'FunctionController@postAddAds');

Route::any('/csv', 'FunctionController@postCsv');


// Making Schema
Route::get('create/{table_name}', 'SchemaController@create');

// Route::get('create/users/table',function()
// {
    //  //usersテーブルの存在確認
    //  if(!Schema::hasTable('users'))
    //  {
    //      // usersテーブルの作成
    //      Schema::create('users', function($table)
    //      {
    //          $table->engine = 'InnoDB';
     //
    //         //  $table->create();
    //          $table->increments('id');
    //          $table->string('user_id', 255);
    //          $table->string('password', 255);
    //          $table->text('name')->nullable();
    //          $table->string('email', 255);
    //          $table->timestamps();
    //          $table->timestamp('deleted_at');
     //
    //         //  $table->primary('id');
    //          $table->unique(array('user_id', 'email'));
     //
    //     });
    //     return 'usersテーブルを作成しました。';
    //  }
    //  else
    //  {
    //      return 'usersテーブルが存在しますので、処理を中止します。';
    //  }
// });
