<?php

namespace RyanChandler\FilamentNavigation\Models;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        if (config('filament-navigation.teams')) {
            static::addGlobalScope('team', function (Builder $query) {
                if (auth()->check()) {
                    $query->where(config('filament-navigation.teamsId'), Filament::getTenant()->getAttribute('id'));
                }
            });
        }
    }
}
