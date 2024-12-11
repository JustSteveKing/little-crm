<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\Projects\Status;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\UserResource;
use App\Services\WorkspaceService;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Inertia\Middleware;

final class HandleInertiaRequests extends Middleware
{
    public function __construct(
        private readonly WorkspaceService $service,
        private readonly AuthManager $auth,
    ) {}

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $this->auth->check()
                    ? new UserResource(
                        resource: $this->auth->user(),
                    ) : null,
                'projects' => $this->auth->check()
                    ? ProjectResource::collection(
                        resource: $this->service->fetchProjects(
                            user: $this->auth->user(),
                            callback: fn(Collection $projects) => $projects->where('status', Status::Active),
                        )->take(5),
                    ) : null,
            ],
        ];
    }
}
