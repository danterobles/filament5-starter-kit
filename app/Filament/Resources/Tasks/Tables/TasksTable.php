<?php

namespace App\Filament\Resources\Tasks\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with('user'))
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'in_progress' => 'info',
                        'completed' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'todo' => 'To Do',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('user.full_name')
                    ->label('Asignado a')
                    ->placeholder('Sin asignar')
                    ->icon('heroicon-o-user-circle')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Estado')
                    ->options([
                        'todo' => 'To Do',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
                    ->placeholder('Todos los estados')
                    ->native(false)
                    ->indicator('Estado'),

                SelectFilter::make('user_id')
                    ->label('Asignado a')
                    ->options(
                        fn () => User::query()
                            ->orderBy('name')
                            ->get()
                            ->mapWithKeys(fn (User $user) => [$user->id => $user->full_name])
                            ->toArray()
                    )
                    ->placeholder('Todos los usuarios')
                    ->native(false)
                    ->searchable()
                    ->indicator('Usuario'),
            ])
            ->recordActions([
                EditAction::make()
                    ->iconButton()
                    ->tooltip('Editar tarea'),
                DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Eliminar tarea'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),

                    BulkAction::make('bulk_status')
                        ->label('Cambiar estado')
                        ->icon('heroicon-o-arrow-path')
                        ->authorizeIndividualRecords('update')
                        ->schema([
                            Select::make('status')
                                ->label('Nuevo estado')
                                ->options([
                                    'todo' => 'To Do',
                                    'in_progress' => 'In Progress',
                                    'completed' => 'Completed',
                                ])
                                ->required()
                                ->native(false),
                        ])
                        ->action(function (array $data, Collection $records): void {
                            $records->each->update(['status' => $data['status']]);
                        })
                        ->requiresConfirmation(false)
                        ->bulk(),
                ])
                    ->label('Acciones masivas'),
            ])
            ->headerActions([
                Action::make('task_board')
                    ->label('Ver Kanban')
                    ->icon('heroicon-o-view-columns')
                    ->color('gray')
                    ->url(route('filament.admin.pages.task-board')),
            ])
            ->defaultSort('created_at', 'desc')
            ->persistFiltersInSession()
            ->persistSortInSession()
            ->persistSearchInSession()
            ->striped()
            ->paginated([10, 25, 50])
            ->deferFilters(false);
    }
}
