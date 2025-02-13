<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Main page';
});

Route::get('/greet/{name}', function ($name){
    return "Hello, $name!";
});
