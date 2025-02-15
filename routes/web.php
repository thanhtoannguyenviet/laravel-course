<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/par1', function () {
    return view('par1',['name'=>'Thanh Toan']);
    
    // return view('par1');
});