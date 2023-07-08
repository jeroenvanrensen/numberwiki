<?php

use App\Http\Controllers\NumberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/{number}', NumberController::class)->where('number', '[0-9]+')->name('number');
