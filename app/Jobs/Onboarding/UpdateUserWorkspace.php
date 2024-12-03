<?php

declare(strict_types=1);

namespace App\Jobs\Onboarding;

use App\Models\Workspace;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

final class UpdateUserWorkspace implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Workspace $workspace,
    ) {}

    public function handle(DatabaseManager $database): void
    {
        $database->transaction(
            callback: fn() => $this->workspace->owner()->update(
                values: [
                    'workspace_id' => $this->workspace->id,
                ],
            ),
            attempts: 3,
        );
    }
}
