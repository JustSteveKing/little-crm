<?php

declare(strict_types=1);

namespace App\Observers;

use App\Jobs\Onboarding\CreateDefaultWorkspace;
use App\Models\User;
use Illuminate\Contracts\Bus\Dispatcher;

final readonly class UserObserver
{
    public function __construct(
        private Dispatcher $bus,
    ) {}

    public function created(User $user): void
    {
        $this->bus->dispatch(
            command: new CreateDefaultWorkspace(
                user: $user->id,
            ),
        );
    }
}
