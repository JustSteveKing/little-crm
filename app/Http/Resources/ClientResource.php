<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @property Client $resource */
final class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'website' => $this->resource->website,
            'contacts' => ContactResource::collection(
                resource: $this->resource->contacts,
            ),
        ];
    }
}
