<?php

use Helpers\Route;

Route::get('/', function(){
    return view('welcome',['title'=>'home'],'bottom');
});