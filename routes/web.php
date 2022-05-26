<?php

use App\Http\Livewire\BladeComponents;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/dark-mode', 'dark-mode')->name('dark-mode');
Route::get('/blade-components', BladeComponents::class)->name('blade-components');
Route::view('/alpine', 'alpine')->name('alpine');
