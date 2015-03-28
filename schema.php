<?php

/* Create Database on Schema */

//create database YahooListing default charset utf8

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






 ?>
