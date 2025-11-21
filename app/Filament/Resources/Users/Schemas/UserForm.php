<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource\Pages\CreateRecord;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('User Details')
                ->schema([
                    TextInput::make('name')
                    ->required(),
                    TextInput::make('email')
                        ->label('Email address')
                        ->email()
                        ->required(),
                    DateTimePicker::make('email_verified_at'),                    
                    Select::make('gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female'
                        ])
                        ->default(null),
                    TextInput::make('contact_no')
                        ->default(null),
                    Textarea::make('address')
                        ->default(null)
                        ->columnSpanFull(),
                    TextInput::make('city')
                        ->default(null),
                    Toggle::make('is_donor')
                        ->required(),
                    TextInput::make('blood_group')
                        ->default(null),
                    TextInput::make('firebase_uid')
                        ->default(null), 
                ])->columnSpanFull(),                
                Section::make('User New Password')->schema([
                    TextInput::make('password')
                        ->nullable()
                        ->password()
                        ->revealable()                        
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn ($livewire) => ($livewire instanceof CreateRecord))                    
                        ->rule(Password::default()),
                ]),
                Section::make('Role Management')->schema([
                    Select::make('roles')
                        ->multiple()
                        ->preload()
                        ->relationship('roles', 'name')
                ])                            
            ]);
    }
}
