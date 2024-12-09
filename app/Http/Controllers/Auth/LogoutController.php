<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\AuthManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final readonly class LogoutController
{
    public function __construct(
        private AuthManager $auth,
    ) {}

    public function __invoke(Request $request): RedirectResponse
    {
        $this->auth->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return new RedirectResponse(
            url: '/',
        );
    }
}
