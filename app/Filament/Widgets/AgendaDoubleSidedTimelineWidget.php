<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use Devletes\FilamentTimelineView\Tables\Columns\TimelineEntry;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class AgendaDoubleSidedTimelineWidget extends TableWidget
{
    protected static ?string $heading = 'Todos los Eventos — Vista Doble';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Agenda::query()->orderBy('start_date')
            )
            ->columns([
                TimelineEntry::make()
                    ->title('title')
                    ->content('description')
                    ->image(fn (Agenda $record): string => $record->initials_avatar_url)
                    ->author(
                        fn (Agenda $record): string => $record->location ?? 'Sin ubicación',
                    )
                    ->time(
                        fn (Agenda $record): string => $record->all_day
                            ? 'Todo el día'
                            : $record->start_date->format('g:i A').($record->end_date ? ' – '.$record->end_date->format('g:i A') : ''),
                    ),
            ])
            ->defaultGroup(
                Group::make('start_date')
                    ->date()
                    ->collapsible()
            )
            ->paginated([6])
            ->asDoubleSidedTimeline();
    }
}
