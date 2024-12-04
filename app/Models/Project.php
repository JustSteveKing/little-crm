<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Projects\Status;
use Carbon\CarbonInterface;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $name
 * @property Status $status
 * @property null|string $details
 * @property string $client_id
 * @property null|string $contact_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Client $client
 * @property null|Contact $contact
 *
 * @use HasFactory<ProjectFactory>
 */
final class Project extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'status',
        'details',
        'client_id',
        'contact_id',
    ];

    /** @return BelongsTo<Client> */
    public function client(): BelongsTo
    {
        return $this->belongsTo(
            related: Client::class,
            foreignKey: 'client_id',
        );
    }

    /** @return BelongsTo<Contact> */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(
            related: Contact::class,
            foreignKey: 'contact_id',
        );
    }

    public function state(): void
    {
        //
    }

    /** @return array<string,class-string|string> */
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }
}
