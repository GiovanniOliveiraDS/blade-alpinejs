<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/dark-mode', 'dark-mode')->name('dark-mode');
Route::view('/alpine', 'alpine')->name('alpine');
