<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Throwable;

final class LoginController
{
    /** @throws Throwable */
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        return new RedirectResponse(
            url: route('dashboard'),
        );
    }
}
