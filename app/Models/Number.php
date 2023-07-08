<?php

namespace App\Models;

use NumberFormatter;

class Number
{
    public int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->number;
    }

    public function predecessor(): self|null
    {
        if ($this->number === 0) {
            return null;
        }

        return new self($this->number - 1);
    }

    public function successor(): self
    {
        return new self($this->number + 1);
    }

    public function name(): string
    {
        $formatter = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        return $formatter->format($this->number);
    }
}
