<?php

declare(strict_types=1);

namespace App\Jobs\Onboarding;

use App\Actions\Workspace\SwitchUserWorkspace;
use App\Models\Workspace;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

final class UpdateUserWorkspace implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Workspace $workspace,
    ) {}

    public function handle(SwitchUserWorkspace $action): void
    {
        $action->handle(
            workspace: $this->workspace,
        );
    }
}
