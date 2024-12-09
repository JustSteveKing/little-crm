<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Concerns\InertiaRoute;
use Illuminate\Http\Request;
use Inertia\Response;

final class LoginViewController
{
    use InertiaRoute;

    public function __invoke(Request $request): Response
    {
        return $this->factory->render(
            component: 'Auth/Login',
            props: [
                'status' => session('status'),
            ],
        );
    }
}
