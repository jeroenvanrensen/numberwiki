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
