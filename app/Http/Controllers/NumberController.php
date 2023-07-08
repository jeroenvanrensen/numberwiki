<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class NumberController extends Controller
{
    public function __invoke(): View
    {
        return view('number');
    }
}
