<?php

class SchemaController extends BaseController {

/* Create Database on Schema */

//create database YahooListing default charset 'utf8';
//CREATE USER las_user IDENTIFIED BY 'Q5lrgSBA';
//GRANT ALL PRIVILEGES ON `LAS`.* TO 'las_user'@'localhost';
//FLUSH PRIVILEGES;

    public function create($table_name){
// var_dump($table_name);exit;
        //テーブルの存在確認
        if(!Schema::hasTable($table_name))
        {
            switch($table_name){
                 //usersテーブルの作成 ※デフォルト
                case 'users':
                    Schema::create('users', function($table)
                    {
                        $table->engine = 'InnoDB';

                        $table->increments('id');
                        $table->string('user_id', 255);
                        $table->string('password', 255);
                        $table->text('name')->nullable();
                        $table->string('email', 255);
                        $table->timestamps();
                        $table->timestamp('deleted_at');

                        $table->unique(array('user_id', 'email'));

                    });
                    default;
                break;
                //campaignsテーブルの作成
                case 'campaigns':
                Schema::create('campaigns', function($table)
                {
                    $table->engine = 'InnoDB';

                    $table->increments('id');
                    $table->text('cam_name')->nullable();
                    $table->integer('cam_budget');
                    $table->timestamps();
                    $table->timestamp('deleted_at');

                });
                break;
                //keywordsテーブルの作成
                case 'keywords':
                Schema::create('keywords', function($table)
                {
                    $table->engine = 'InnoDB';

                    $table->increments('id');
                    $table->string('keyword', 255);
                    $table->tinyInteger('match_type');
                    $table->timestamps();
                    $table->timestamp('deleted_at');
                    $table->integer('cam_id');

                });
                break;
                //adgroupsテーブルの作成
                case 'adgroups':
                Schema::create('adgroups', function($table)
                {
                    $table->engine = 'InnoDB';

                    $table->increments('id');
                    $table->string('adgroup', 255);
                    $table->integer('cost');
                    $table->timestamps();
                    $table->timestamp('deleted_at');
                    $table->integer('cam_id');

                });
                break;
                //adadsesテーブルの作成
                case 'adadses':
                Schema::create('adadses', function($table)
                {
                    $table->engine = 'InnoDB';

                    $table->increments('id');
                    $table->string('adads', 255);
                    $table->string('title', 255);
                    $table->string('note01', 255);
                    $table->string('note02', 255);
                    $table->string('display_url', 255);
                    $table->text('encoded_url', 255);
                    $table->timestamps();
                    $table->timestamp('deleted_at');
                    $table->integer('cam_id');
                    $table->integer('keyword_id');
                    $table->integer('adgroup_id');

                });
                //titleテーブルの作成
                case 'titles':
                Schema::create('titles', function($table)
                {
                    $table->engine = 'InnoDB';

                    $table->increments('id');
                    $table->string('word', 255);
                    $table->string('phrase', 255);
                    $table->timestamps();
                    $table->timestamp('deleted_at');
                    $table->integer('cam_id');
                    $table->integer('keyword_id');
                    $table->integer('adgroup_id');
                    $table->integer('adads_id');
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

}
