<?php

namespace RyanChandler\FilamentNavigation\Filament\Resources\NavigationResource\Pages;

use Filament\Resources\Pages\EditRecord;
use RyanChandler\FilamentNavigation\Filament\Resources\NavigationResource\Pages\Concerns\HandlesNavigationBuilder;
use RyanChandler\FilamentNavigation\FilamentNavigation;

class EditNavigation extends EditRecord
{
    use HandlesNavigationBuilder;

    public static function getResource(): string
    {
        return FilamentNavigation::get()->getResource();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (config('filament-navigation.teams')) {
            $data[config('filament-navigation.teamsId')] = \Filament\Facades\Filament::getTenant()->getAttribute('id');
        }

        return $data;
    }
}
