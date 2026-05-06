<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions\CreateAction;
use Saade\FilamentFullCalendar\Actions\DeleteAction;
use Saade\FilamentFullCalendar\Actions\EditAction;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class AgendaCalendarWidget extends FullCalendarWidget
{
    public Model|string|null $model = Agenda::class;

    public function fetchEvents(array $info): array
    {
        return Agenda::query()
            ->where('start_date', '>=', $info['start'])
            ->where('start_date', '<=', $info['end'])
            ->get()
            ->map(fn (Agenda $agenda) => EventData::make()
                ->id($agenda->id)
                ->title($agenda->title)
                ->start($agenda->start_date)
                ->end($agenda->end_date)
                ->allDay($agenda->all_day)
                ->backgroundColor($agenda->color ?? '#3b82f6')
                ->borderColor($agenda->color ?? '#3b82f6')
                ->extendedProps([
                    'description' => $agenda->description,
                    'location' => $agenda->location,
                ])
            )
            ->toArray();
    }

    public function getFormSchema(): array
    {
        return [
            TextInput::make('title')
                ->label('Título')
                ->required()
                ->maxLength(255),

            Grid::make(2)
                ->schema([
                    DateTimePicker::make('start_date')
                        ->label('Inicio')
                        ->required(),

                    DateTimePicker::make('end_date')
                        ->label('Fin')
                        ->after('start_date'),
                ]),

            Grid::make(2)
                ->schema([
                    Toggle::make('all_day')
                        ->label('Todo el día'),

                    ColorPicker::make('color')
                        ->label('Color'),
                ]),

            TextInput::make('location')
                ->label('Ubicación')
                ->maxLength(255),

            Textarea::make('description')
                ->label('Descripción')
                ->rows(3)
                ->maxLength(1000),
        ];
    }

    protected function headerActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function modalActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
