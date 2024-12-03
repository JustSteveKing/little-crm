<?php

declare(strict_types=1);

namespace App\Jobs\Onboarding;

use App\Models\Workspace;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Queue\Queueable;

final class CreateDefaultWorkspace implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly string $user,
    ) {}

    public function handle(DatabaseManager $database): void
    {
        $database->transaction(
            callback: fn() => Workspace::query()->create(
                attributes: [
                    'name' => 'default',
                    'user_id' => $this->user,
                ],
            ),
            attempts: 3,
        );
    }
}
