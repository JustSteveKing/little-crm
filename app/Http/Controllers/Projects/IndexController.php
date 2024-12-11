<?php

declare(strict_types=1);

namespace App\Http\Controllers\Projects;

use App\Http\Resources\ProjectResource;
use App\Models\User;
use App\Services\WorkspaceService;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

final readonly class IndexController
{
    public function __construct(
        private ResponseFactory $factory,
        private WorkspaceService $service,
    ) {}

    public function __invoke(Request $request, #[CurrentUser] User $user): Response
    {
        return $this->factory->render(
            component: 'Projects/Index',
            props: [
                'projects' => ProjectResource::collection(
                    resource: $this->service->fetchProjects($user, function (): void {})->all(),
                ),
            ],
        );
    }
}
