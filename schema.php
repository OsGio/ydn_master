<?php

class  SchemaController extends BaseController {

/* Create Database on Schema */

//create database YahooListing default charset 'utf8';
//CREATE USER las_user IDENTIFIED BY 'Q5lrgSBA';
//GRANT ALL PRIVILEGES ON `LAS`.* TO 'las_user'@'localhost';
//FLUSH PRIVILEGES;

public function create($table_name){
var_dump($table_name);exit;
    //テーブルの存在確認
    if(!Schema::hasTable($table_name))
    {
        switch($table_name){
             //usersテーブルの作成 ※デフォルト
            case 'users':
                Schema::create('users', function($table)
                {
                    $table->engine = 'InnoDB';

                    $table->create();
                    $table->increments('id');
                    $table->string('user_id', 255);
                    $table->string('password', 255);
                    $table->text('name')->nullable();
                    $table->string('email', 255);
                    $table->timestamps();
                    $table->timestamp('deleted_at');

                    $table->primary('id');
                    $table->unique(array('user_id', 'email'));

                });
                default;
            break;
            //campaignsテーブルの作成
            case 'campaigns':
            Schema::create('campaigns', function($table)
            {
                $table->engine = 'InnoDB';

                $table->create();
                $table->increments('id');
                $table->string('user_id', 255);
                $table->string('password', 255);
                $table->text('name')->nullable();
                $table->string('email', 255);
                $table->timestamps();
                $table->timestamp('deleted_at');

                $table->primary('id');
                $table->unique(array('user_id', 'email'));

            });
            break;
            //keywordsテーブルの作成
            case 'keywords':
            Schema::create('keywords', function($table)
            {
                $table->engine = 'InnoDB';

                $table->create();
                $table->increments('id');
                $table->string('user_id', 255);
                $table->string('password', 255);
                $table->text('name')->nullable();
                $table->string('email', 255);
                $table->timestamps();
                $table->timestamp('deleted_at');

                $table->primary('id');
                $table->unique(array('user_id', 'email'));

            });
            break;
            //adgroupsテーブルの作成
            case 'adgroups':
            Schema::create('adgroups', function($table)
            {
                $table->engine = 'InnoDB';

                $table->create();
                $table->increments('id');
                $table->string('user_id', 255);
                $table->string('password', 255);
                $table->text('name')->nullable();
                $table->string('email', 255);
                $table->timestamps();
                $table->timestamp('deleted_at');

                $table->primary('id');
                $table->unique(array('user_id', 'email'));

            });
            break;
            //adadsesテーブルの作成
            case 'adadses':
            Schema::create('adadses', function($table)
            {
                $table->engine = 'InnoDB';

                $table->create();
                $table->increments('id');
                $table->string('user_id', 255);
                $table->string('password', 255);
                $table->text('name')->nullable();
                $table->string('email', 255);
                $table->timestamps();
                $table->timestamp('deleted_at');

                $table->primary('id');
                $table->unique(array('user_id', 'email'));

            });
            break;
            }

        return $table_name. 'テーブルを作成しました。';
    }
    else
    {
        return $table_name. 'テーブルが存在しますので、処理を中止します。';
    }
}





 ?>
