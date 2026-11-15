<?php

use App\Models\User;

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('authenticated user sees dashboard with pasax route', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
    $response->assertSee('Pasax');
});

test('route pasax redirects to pasax dashboard entry', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('pasax'));

    $response->assertRedirect('/pasax');
});
