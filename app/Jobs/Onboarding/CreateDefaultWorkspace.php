<?php

declare(strict_types=1);

namespace App\Jobs\Onboarding;

use App\Actions\Workspace\CreateWorkspace;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

final class CreateDefaultWorkspace implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly string $user,
    ) {}

    public function handle(CreateWorkspace $action): void
    {
        $action->handle(
            name: 'default',
            user: $this->user,
        );
    }
}
