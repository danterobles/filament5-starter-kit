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
                    ->image(function (Agenda $record): string {
                        $initials = mb_strtoupper(mb_substr($record->title, 0, 2));
                        $color = ltrim($record->color ?? '#3b82f6', '#');
                        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"><rect width="80" height="80" fill="#'.$color.'"/><text x="40" y="55" font-family="Arial,sans-serif" font-size="32" font-weight="bold" fill="white" text-anchor="middle">'.htmlspecialchars($initials).'</text></svg>';

                        return 'data:image/svg+xml;base64,'.base64_encode($svg);
                    })
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
