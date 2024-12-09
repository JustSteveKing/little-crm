<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Concerns\InertiaRoute;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

final class EmailVerificationPromptController extends Controller
{
    use InertiaRoute;

    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user()->hasVerifiedEmail()
            ? new RedirectResponse(
                url: route('dashboard'),
            ) : $this->factory->render(
                component: 'Auth/VerifyEmail',
                props: ['status' => session('status')],
            );
    }
}
