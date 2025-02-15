<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Main page';
});

Route::get('/greet/{name}', function ($name){
    return "Hello, $name!";
});

Route::get('/hallo', function (){
    return redirect('/greet/John');
})->name('hello'); // đặt tên cho route là hello

Route::get('/xxx',function (){
    return redirect()->route('hello'); // chuyển hướng đến route có tên là hello
});

Route::fallback(function (){
    return '404 Not Found';
});