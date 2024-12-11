<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\ProjectRepository;
use Closure;
use Illuminate\Cache\CacheManager;
use Illuminate\Database\Eloquent\Collection;

final readonly class WorkspaceService
{
    public function __construct(
        private CacheManager $cache,
        private ProjectRepository $projects,
    ) {}

    public function fetchProjects(User $user, Closure $callback): Collection
    {
        $this->cache->forever(
            key: sprintf('user:%s:projects', $user->id),
            value: $projects = $this->projects->all(
                user: $user,
            )->get(),
        );

        return tap($projects, $callback);
    }
}
