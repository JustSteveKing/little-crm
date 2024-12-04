<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $client_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Client $client
 *
 * @use HasFactory<ContactFactory>
 */
final class Contact extends Model
{
    use HasFactory;
    use HasUlids;
    use Notifiable;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'email',
        'client_id',
    ];

    /** @return BelongsTo<Client> */
    public function client(): BelongsTo
    {
        return $this->belongsTo(
            related: Client::class,
            foreignKey: 'client_id',
        );
    }
}
