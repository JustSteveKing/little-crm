<?php

declare(strict_types=1);

namespace App\Actions\Workspace;

use App\Models\Workspace;
use Illuminate\Database\DatabaseManager;

final readonly class CreateWorkspace
{
    public function __construct(
        private DatabaseManager $database,
    ) {}

    public function handle(string $name, string $user): void
    {
        $this->database->transaction(
            callback: fn() => Workspace::query()->create(
                attributes: [
                    'name' => $name,
                    'user_id' => $user,
                ],
            ),
            attempts: 3,
        );
    }
}
