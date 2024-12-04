<?php

declare(strict_types=1);

namespace App\Actions\Workspace;

use App\Models\Workspace;
use Illuminate\Database\DatabaseManager;

final readonly class SwitchUserWorkspace
{
    public function __construct(
        private DatabaseManager $database,
    ) {}

    public function handle(Workspace $workspace): void
    {
        $this->database->transaction(
            callback: fn() => $workspace->owner()->update(
                values: [
                    'workspace_id' => $workspace->id,
                ],
            ),
            attempts: 3,
        );
    }
}
