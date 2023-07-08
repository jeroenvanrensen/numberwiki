<?php

namespace App\Models;

class Number
{
    public int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }
}
