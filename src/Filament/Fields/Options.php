<?php

namespace RyanChandler\FilamentNavigation\Filament\Fields;

class Options {

    // Custom Item Types
    // Example:
    /*
    'itemTypes' => [
        ['content', [
            Select::make('slug')
                ->required()
                ->options(Content::all()->where('teams_id', '1')->pluck('slug', 'id')),
            ]
        ],
    ],
    */

    public function itemTypes(): array {
        return [];
    }


        // Extra Fields
    // Example
    /*
    'extraFields' => [
        ['teams', [
            public function up()
            {
                Schema::table('navigations', function (Blueprint $table)
                {
                    $table->bigInteger('team_id'))->default(1)->constrained('teams')->cascadeOnDelete();;
                    $table->dropUnique('navigations_handle_unique');
                    $table->unique(['handle', 'team_id']);
                }
            }
        public function down()
        {
            Schema::table('media', function (Blueprint $table) {
            $table->dropColumn('team_id');
            });
        }
            ]
        ]
    ],
    */
    public function extraFields(): array {
        return [];
    }
}