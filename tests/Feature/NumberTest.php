<?php

test('the page can be loaded', function (int $number) {
    $this->get(route('number', $number))->assertStatus(200)->assertSee($number);
})->with([0, 3, 8, 13, 209]);
