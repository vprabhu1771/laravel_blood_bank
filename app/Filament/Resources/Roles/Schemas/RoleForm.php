<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Schemas\Schema;

// FORMS
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make('User Roles')
                ->description('Role Must be Minimum 2 Maximum 255 Character')
                ->schema([            
                    TextInput::make('name')
                        ->minLength(2)
                        ->maxLength(255)
                        ->required()
                        ->unique()
                ])
            ]);
    }
}
