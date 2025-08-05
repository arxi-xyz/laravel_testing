<?php

use App\Http\Controllers\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/greet/{name}', [UserController::class, 'helloWorld']);