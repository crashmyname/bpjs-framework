<?php

use App\Models\User;
use Helpers\Route;

Route::get('/', function(){
    $user = User::all();
    return view('welcome',['title'=>'home','user'=>$user],'bottom');
});