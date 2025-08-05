<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Services\GreetingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function __construct(
        protected GreetingService $greetingService
    )
    {
    }

    public function helloWorld($name)
    {
        $data = $this->greetingService->greeting($name);
        return Response::json([
            'message' => $data
        ]);
    }
}
