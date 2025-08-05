<?php

use App\Models\User;

test('Sqlite Connection Is ok', function () {
    $email = 'arxi.org@gmail.com';
    User::factory()->create([
        'email' => $email
    ]);

    $user = User::where('email', $email)->first();

    expect($user->email)->toBe($email);
});
