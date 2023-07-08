<?php

namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Contracts\View\View;

class NumberController extends Controller
{
    public function __invoke(): View
    {
        $number = new Number(request('number'));

        return view('number', ['number' => $number]);
    }
}
