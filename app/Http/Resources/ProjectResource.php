<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @property Project $resource */
final class ProjectResource extends JsonResource
{
    /** @return array<string,mixed> */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'status' => $this->resource->status->value,
            'details' => $this->resource->details,
            'client' => new ClientResource(
                resource: $this->resource->client,
            ),
            'contact' => $this->resource->contact_id,
        ];
    }
}
