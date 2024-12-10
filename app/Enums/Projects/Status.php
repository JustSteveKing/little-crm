<?php

declare(strict_types=1);

namespace App\Enums\Projects;

enum Status: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
