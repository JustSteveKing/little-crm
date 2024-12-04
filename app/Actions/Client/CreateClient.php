<?php

namespace App\Actions\Client;

use App\Models\Client;
use Illuminate\Database\DatabaseManager;

final readonly class CreateClient
{
    public function __construct(
        private DatabaseManager $database,
    ) {}

    public function handle(string $name, null|string $website, string $workspace): void
    {
        $this->database->transaction(
            callback: fn() => Client::query()->create(
                attributes: [
                    'name' => $name,
                    'website' => $website,
                    'workspace_id' => $workspace,
                ],
            ),
            attempts: 3,
        );
    }
}
