<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @property User $resource */
final class UserResource extends JsonResource
{
    /** @return array<string,string|array<string,string|bool>|JsonResource> */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'initials' => $this->resource->initials(),
            'email' => [
                'address' => $this->resource->email,
                'verified' => $this->resource->hasVerifiedEmail(),
            ],
            'workspace' => new WorkspaceResource(
                resource: $this->resource->workspace,
            ),
        ];
    }
}
