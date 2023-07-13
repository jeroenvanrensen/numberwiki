<?php

test('the page can be loaded', function () {
    for ($i = 0; $i <= 100; $i++) {
        $this->get(route('number', $i))->assertStatus(200)->assertSee($i);
    }
});
