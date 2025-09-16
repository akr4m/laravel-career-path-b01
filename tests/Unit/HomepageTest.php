<?php

// it('has a home page')
//     ->get('/')
//     ->assertStatus(200);

it('has a home page', function () {
    $response = $this->get(route('welcome'));

    $response->assertStatus(200);

    $response->assertSee('Interactive Cures');
});
