<?php

test('test greet api', function () {
    $response = $this->get('/api/greet/ahmad');

    $response->assertStatus(200);
    expect($response['message'])->toBe('hello ahmad')
        ->and($response['message'])->not()->toBe('hello mohammad');
});
