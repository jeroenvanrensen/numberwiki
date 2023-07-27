<?php

use App\Models\Number;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (request()->has('number')) {
        return redirect()->route('number', request('number'));
    }

    return view('home');
})->name('home');

Route::get('/{number}', function () {
    $number = new Number(request('number'));

    return view('number', ['number' => $number]);
})->where('number', '[0-9]+')->name('number');
