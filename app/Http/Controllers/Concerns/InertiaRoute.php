<?php

namespace App\Http\Controllers\Concerns;

use Inertia\ResponseFactory;

trait InertiaRoute
{
    public function __construct(
        protected ResponseFactory $factory,
    ) {}
}
