<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Collection;
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

    public function divisors(): array|null
    {
        if ($this->number === 0) {
            return null;
        }

        $divisors = [];
        $divisor = 2;

        while ($divisor <= sqrt($this->number)) {
            if (is_int($this->number / $divisor)) {
                $divisors[] = $divisor;
                $divisors[] = $this->number / $divisor;
            }
            $divisor++;
        }

        return collect($divisors)->push(1, $this->number)->unique()->sort()->values()->toArray();
    }

    public function base(int $base): string
    {
        $number = $this->number;
        $digits = new Collection();

        while ($number >= $base) {
            $digits->push($this->digitToSymbol($number % $base));
            $number = floor($number / $base);
        }

        return $digits
            ->push($this->digitToSymbol($number % $base))
            ->whenEmpty(fn ($digits) => $digits->push('0'))
            ->reverse()
            ->join('');
    }

    public function polygon($width = 500): string
    {
        if ($this->number === 0 || $this->number === 1 || $this->number === 2) {
            throw new Exception("A regular {$this->number}-sided polygon can't be created");
        }

        $svg = '<svg viewBox="0 0 500 500"><polygon style="fill: none; stroke: black; stroke-width: 10;" points="';

        for ($i = 0; $i <= $this->number; $i++) {
            $x = ((500 - 10) * cos(deg2rad(360 * $i / $this->number - 90)) + 500) / 2;
            $y = ((500 - 10) * sin(deg2rad(360 * $i / $this->number - 90)) + 500) / 2;
            $svg .= "{$x},{$y} ";
        }

        $svg = substr($svg, 0, -1);

        $svg .= '" /></svg>';

        return $svg;
    }

    protected function digitToSymbol(int $digit): string
    {
        return [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'][$digit];
    }
}
