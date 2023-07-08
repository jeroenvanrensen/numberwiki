<?php

use App\Models\Number;

it('can be instantiated', function (int $value) {
    $number = new Number($value);
    expect($number->number)->toBe($value);
    expect((string) $number->number)->toBe((string) $value);
})->with([0, 3, 8, 13, 209]);

it('can compute its predecessor and successor', function (int $value, int|null $predecessor, int $successor) {
    $number = new Number($value);
    expect($number->predecessor()?->number)->toEqual($predecessor);
    expect($number->successor()->number)->toEqual($successor);
})->with([
    [0, null, 1],
    [3, 2, 4],
    [8, 7, 9],
    [13, 12, 14],
    [209, 208, 210],
]);

it('knows its name', function (int $value, string $name) {
    $number = new Number($value);
    expect($number->name())->toBe($name);
})->with([
    [0, 'zero'],
    [3, 'three'],
    [8, 'eight'],
    [13, 'thirteen'],
    [209, 'two hundred nine'],
]);

it('can find its prime factors', function (int $value, array|null $factors) {
    $number = new Number($value);
    expect($number->factors())->toBe($factors);
})->with([
    [0, null],
    [3, [3 => 1]],
    [8, [2 => 3]],
    [13, [13 => 1]],
    [209, [11 => 1, 19 => 1]],
]);

it('knows whether it is prime', function (int $value, bool|null $prime) {
    $number = new Number($value);
    expect($number->isPrime())->toBe($prime);
})->with([
    [0, null],
    [3, true],
    [8, false],
    [13, true],
    [209, false],
]);

it('can find all its divisors', function (int $value, array|null $divisors) {
    $number = new Number($value);
    expect($number->divisors())->toBe($divisors);
})->with([
    [0, null],
    [3, [1, 3]],
    [8, [1, 2, 4, 8]],
    [13, [1, 13]],
    [209, [1, 11, 19, 209]],
]);
