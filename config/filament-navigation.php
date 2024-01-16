<?php

// config for RyanChandler/FilamentNavigation
return [
    // Default Model and Resource
    'navigation_model' => \RyanChandler\FilamentNavigation\Models\Navigation::class,
    'navigation_resource' => \RyanChandler\FilamentNavigation\Filament\Resources\NavigationResource::class,

    // Tenancy Support
    'teams' => true,
    'teamsClass' => null, // Teams::class
    'teamsId' => null, // team_id

    // Item Types Class
    'options' => \RyanChandler\FilamentNavigation\Filament\Fields\Options::class,

    // Mysql 5.7 Support
    'mysql57' => false,

    // Admin Navigation

];
