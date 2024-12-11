<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Builder;

final readonly class ProjectRepository
{
    public function __construct(
        private DatabaseManager $database,
    ) {}

    public function all(User $user): Builder
    {
        return Project::query()->with(
            relations: ['client.contacts'],
        )->whereHas(
            relation: 'client',
            callback: fn($query) => $query->where(
                column: 'workspace_id',
                operator: '=',
                value: $user->workspace_id,
            ),
        )->latest();
    }
}
