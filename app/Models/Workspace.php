<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\WorkspaceObserver;
use Carbon\CarbonInterface;
use Database\Factories\WorkspaceFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $name
 * @property string $user_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property User $owner
 *
 * @use HasFactory<WorkspaceFactory>
 */
#[ObservedBy(WorkspaceObserver::class)]
final class Workspace extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'user_id',
    ];

    /** @return BelongsTo<User> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }
}
