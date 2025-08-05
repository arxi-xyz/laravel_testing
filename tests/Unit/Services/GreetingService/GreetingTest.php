<?php

use App\Services\GreetingService;

test('hello name', function () {
    $service = new GreetingService();
    $greet = $service->greeting('ahmad');

    expect($greet)->toBe('hello ahmad')->toBeString()->not->toBe('hello mohammad');
});

test('invalid arg', function () {
    $service = new GreetingService();
    expect(fn() => $service->greeting(''))->toThrow(InvalidArgumentException::class,'Name cannot be empty');
});
