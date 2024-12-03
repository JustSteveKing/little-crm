<?php

declare(strict_types=1);

namespace App\Observers;

use App\Jobs\Onboarding\UpdateUserWorkspace;
use App\Models\Workspace;
use Illuminate\Contracts\Bus\Dispatcher;

use function Illuminate\Support\defer;

final readonly class WorkspaceObserver
{
    public function __construct(
        private Dispatcher $bus,
    ) {}

    public function created(Workspace $workspace): void
    {
        defer(
            callback: fn() => $this->bus->dispatch(
                command: new UpdateUserWorkspace(
                    workspace: $workspace,
                ),
            ),
        );
    }
}
