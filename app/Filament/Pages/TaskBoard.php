<?php

namespace App\Filament\Pages;

use App\Models\Task;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Relaticle\Flowforge\Board;
use Relaticle\Flowforge\BoardPage;
use Relaticle\Flowforge\Column;

class TaskBoard extends BoardPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedViewColumns;

    protected static ?int $navigationSort = 20;

    private const STATUSES = ['todo', 'in_progress', 'completed'];

    public static function getNavigationLabel(): string
    {
        return __('navigation.task_board.navigation_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.management');
    }

    public function getTitle(): string
    {
        return __('navigation.task_board.title');
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->can('View:TaskBoard') ?? false;
    }

    public function board(Board $board): Board
    {
        return $board
            ->query($this->getEloquentQuery())
            ->recordTitleAttribute('title')
            ->columnIdentifier('status')
            ->positionIdentifier('position')
            ->columns([
                Column::make(self::STATUSES[0])->label('To Do')->color('gray'),
                Column::make(self::STATUSES[1])->label('In Progress')->color('blue'),
                Column::make(self::STATUSES[2])->label('Completed')->color('green'),
            ]);
    }

    /**
     * Moving a card updates the task, so it requires Update:Task and only the
     * statuses this board actually shows.
     */
    public function moveCard(
        string $cardId,
        string $targetColumnId,
        ?string $afterCardId = null,
        ?string $beforeCardId = null
    ): void {
        abort_unless(auth()->user()?->can('Update:Task'), 403);
        abort_unless(in_array($targetColumnId, self::STATUSES, true), 422);

        parent::moveCard($cardId, $targetColumnId, $afterCardId, $beforeCardId);
    }

    public function getEloquentQuery(): Builder
    {
        return Task::query();
    }
}
