<?php

use App\Http\Middleware\CheckApiToken;
use Illuminate\Support\Facades\Route;

Route::get('/super-admin', function () {
    return view('app');
});
Route::get('/department', function () {
    return view('department.app');
});

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

// Route::any('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('auth_logout');



