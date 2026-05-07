<?php

namespace App\Filament\Widgets;

use App\Models\Agenda;
use Devletes\FilamentTimelineView\Tables\Columns\TimelineEntry;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class AgendaTimelineWidget extends TableWidget
{
    protected static ?string $heading = 'Próximos Eventos';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Agenda::query()
                    ->where('start_date', '>=', now())
                    ->orderBy('start_date')
            )
            ->columns([
                TimelineEntry::make()
                    ->title('title')
                    ->content(fn (Agenda $record): string => implode("\n", array_filter([
                        $record->description,
                        $record->location ? '📍 '.$record->location : null,
                    ])))
                    ->time('start_date', 'g:i A'),
            ])
            ->defaultGroup(
                Group::make('start_date')
                    ->date()
                    ->collapsible()
            )
            ->paginated([5])
            ->asTimeline();
    }
}
