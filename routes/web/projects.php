<?php

declare(strict_types=1);

use App\Http\Controllers\Projects;
use Illuminate\Support\Facades\Route;

Route::get('/', Projects\IndexController::class)->name('index');
