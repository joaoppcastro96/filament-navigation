<?php

namespace RyanChandler\FilamentNavigation;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentNavigationServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->publishes([
            __DIR__.'/../config/filament-navigation.php' => config_path('filament-navigation.php'),
        ], 'filament-navigation-config');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'filament-navigation-migrations');

        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
        ]);

        $this->loadViewsFrom([
            __DIR__ . '/../resources/views',
        ], 'filament-navigation');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-navigation');

        FilamentAsset::register([
            Css::make('filament-navigation-styles', __DIR__ . '/../resources/dist/plugin.css'),
            Js::make('filament-navigation-scripts', __DIR__ . '/../resources/dist/plugin.js'),
        ], 'filament-navigation');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/filament-navigation.php',
            'filament-navigation'
        );
    }
}
