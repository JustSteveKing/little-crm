<?php

declare(strict_types=1);

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Concerns\InertiaRoute;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Inertia\Response;

final class IndexController
{
    use InertiaRoute;

    public function __invoke(Request $request, #[CurrentUser] User $user): Response
    {
        $clients = Client::query()->where(
            column: 'workspace_id',
            operator: '=',
            value: $user->workspace_id,
        )->with(
            relations: ['contacts'],
        )->get();

        return $this->factory->render(
            component: 'Clients/Index',
            props: [
                'clients' => ClientResource::collection(
                    resource: $clients,
                ),
            ],
        );
    }
}
