<?php

namespace App\Services;

use InvalidArgumentException;

class GreetingService
{
    public function greeting(string $name): string
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be empty');
        }
        return "hello $name";
    }
}