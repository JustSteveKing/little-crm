<?php

declare(strict_types=1);

namespace App\Http\Controllers\Concerns;

use Inertia\ResponseFactory;

trait InertiaRoute
{
    public function __construct(
        protected ResponseFactory $factory,
    ) {}
}
