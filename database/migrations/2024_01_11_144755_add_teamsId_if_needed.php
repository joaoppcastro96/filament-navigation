<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('navigations', function (Blueprint $table) {
            if (config('filament-navigation.teams')) {
                if (config('filament-navigation.teamsId') == null || config('filament-navigation.teamsClass') == null) {
                    throw new Exception('Error: Teams id and class in config must be set', 1);
                }

                $table->bigInteger(config('filament-navigation.teamsId'))
                    ->default(1);

                $table->index(config('filament-navigation.teamsId'), 'navigation_team_foreign_key_index');
                $table->dropUnique('navigations_handle_unique');
                $table->unique(['handle', config('filament-navigation.teamsId')], 'navigations_handle_teams_id_unique');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (config('filament-navigation.teams')) {
            Schema::table('navigations', function (Blueprint $table) {
                $table->dropUnique('navigation_team_foreign_key_index');
                $table->dropUnique('navigations_handle_teams_id_unique');
                $table->dropColumn(config('filament-navigation.teamsId'));
                $table->unique(['handle'], 'navigations_handle_unique');
            });
        }
    }
};
