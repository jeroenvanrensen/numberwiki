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

    public function factors(): array|null
    {
        if ($this->number === 0 || $this->number === 1) {
            return null;
        }

        $factors = [];
        $dividend = $this->number;
        $divisor = 2;

        while ($dividend !== 1) {
            if (is_int($dividend / $divisor)) {
                $dividend = $dividend / $divisor;

                if (array_key_exists($divisor, $factors)) {
                    $factors[$divisor]++;
                } else {
                    $factors[$divisor] = 1;
                }
            } else {
                $divisor++;
            }
        }

        return $factors;
    }

    public function isPrime(): bool|null
    {
        if ($this->number === 0 || $this->number === 1) {
            return null;
        }

        return array_key_exists($this->number, $this->factors());
    }
}
