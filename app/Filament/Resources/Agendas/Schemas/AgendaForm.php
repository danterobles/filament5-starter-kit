<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Evento')
                    ->description('Datos principales del evento')
                    ->icon('heroicon-o-calendar-days')
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nombre del evento')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->rows(3)
                            ->maxLength(65535)
                            ->placeholder('Descripción opcional del evento')
                            ->columnSpanFull(),

                        TextInput::make('location')
                            ->label('Ubicación')
                            ->maxLength(255)
                            ->placeholder('Lugar del evento')
                            ->prefixIcon('heroicon-o-map-pin')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Fecha y Hora')
                    ->description('Programación temporal del evento')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->schema([
                        Toggle::make('all_day')
                            ->label('Todo el día')
                            ->live()
                            ->inline(false)
                            ->onIcon('heroicon-o-sun')
                            ->offIcon('heroicon-o-clock')
                            ->onColor('success')
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                DateTimePicker::make('start_date')
                                    ->label('Fecha de inicio')
                                    ->required()
                                    ->seconds(false)
                                    ->native(false)
                                    ->displayFormat(fn (Get $get): string => $get('all_day') ? 'd/m/Y' : 'd/m/Y H:i'),

                                DateTimePicker::make('end_date')
                                    ->label('Fecha de fin')
                                    ->seconds(false)
                                    ->native(false)
                                    ->after('start_date')
                                    ->displayFormat('d/m/Y H:i')
                                    ->hidden(fn (Get $get): bool => (bool) $get('all_day')),
                            ]),
                    ])
                    ->columns(1),

                Section::make('Apariencia')
                    ->description('Color identificador del evento')
                    ->icon('heroicon-o-swatch')
                    ->collapsible()
                    ->schema([
                        ColorPicker::make('color')
                            ->label('Color'),
                    ])
                    ->columns(1),
            ]);
    }
}
