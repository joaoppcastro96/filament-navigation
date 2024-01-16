<?php

namespace RyanChandler\FilamentNavigation\Models;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $handle
 * @property array $items
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Navigation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'items' => 'json',
    ];

    public static function fromHandle(string $handle): ?static
    {
        return static::query()->firstWhere('handle', $handle);
    }

    protected static function booted(): void
    {
        if(config('filament-navigation.teams')){
            static::addGlobalScope('channel', function (Builder $query) {
                if (auth()->check()) {
                    $query->whereBelongsTo(auth()->user()->channels);
                }
            });
        }
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}
