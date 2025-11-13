<?php

namespace App\Filament\Resources\BloodRequests\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

use Filament\Forms\Components\Select;

class BloodRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('requester_id')
                    ->required()
                    ->relationship(name: 'requester', titleAttribute: 'name'),
                Select::make('donor_id')
                    ->relationship(name: 'donor', titleAttribute: 'name'),
                TextInput::make('blood_group')
                    ->required(),
                TextInput::make('city')
                    ->default(null),
                TextInput::make('units')
                    ->required()
                    ->numeric()
                    ->default(1),
                Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'pending',
                        'accepted' => 'accepted',
                        'declined' => 'declined',
                        'completed' => 'completed'
                    ])
                    ->default('pending'),
                Textarea::make('message')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
