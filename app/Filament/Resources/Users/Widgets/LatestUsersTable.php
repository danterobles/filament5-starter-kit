<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class LatestUsersTable extends TableWidget
{
    protected static ?string $heading = 'Últimos Usuarios Registrados';

    protected int|string|array $columnSpan = 'full';

    protected ?string $pollingInterval = null;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => User::query()
                ->with('roles')
                ->fromSub($this->latestUsersQuery(), 'users'))
            ->defaultSort(fn (Builder $query): Builder => $this->orderByLatest($query))
            ->paginated(false)
            ->columns([
                ImageColumn::make('avatar_url')
                    ->label('Avatar')
                    ->circular(),

                TextColumn::make('full_name')
                    ->label('Nombre Completo')
                    ->searchable(['name', 'last'])
                    ->sortable(query: fn (Builder $query, string $direction): Builder => $query->orderByFullName($direction))
                    ->weight('medium'),

                TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->copyable()
                    ->copyMessage('Email copiado')
                    ->searchable(),

                TextColumn::make('roles.name')
                    ->label('Rol')
                    ->badge()
                    ->formatStateUsing(fn (mixed $state) => Arr::first(Arr::wrap($state)))
                    ->color(fn (?string $state): string => match ($state) {
                        'admin' => 'danger',
                        'super_admin' => 'warning',
                        'panel_user' => 'success',
                        null => 'gray',
                        default => 'gray',
                    })
                    ->icon(fn (?string $state): string => match ($state) {
                        'super_admin' => 'heroicon-o-shield-exclamation',
                        'admin' => 'heroicon-o-shield-check',
                        'panel_user' => 'heroicon-o-user-circle',
                        null => 'heroicon-o-question-mark-circle',
                        default => 'heroicon-o-user',
                    })
                    ->placeholder('Sin rol'),

                IconColumn::make('active')
                    ->label('Estado')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('created_at')
                    ->label('Registrado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->since()
                    ->tooltip(fn (User $record) => $record->created_at->format('d/m/Y H:i:s')),
            ]);
    }

    /**
     * The search is applied before the limit so that users outside the 10 newest
     * are still reachable; sorting then only reorders the resulting rows.
     *
     * @return Builder<User>
     */
    private function latestUsersQuery(): Builder
    {
        $query = User::query();

        foreach (preg_split('/\s+/', trim((string) $this->getTableSearch()), -1, PREG_SPLIT_NO_EMPTY) as $term) {
            $query->where(fn (Builder $query): Builder => $query
                ->whereLike('name', "%{$term}%")
                ->orWhereLike('last', "%{$term}%")
                ->orWhereLike('email', "%{$term}%"));
        }

        return $this->orderByLatest($query)->limit(10);
    }

    /**
     * @param  Builder<User>  $query
     * @return Builder<User>
     */
    private function orderByLatest(Builder $query): Builder
    {
        return $query->latest()->latest('id');
    }
}
