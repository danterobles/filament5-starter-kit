<?php

namespace App\Filament\Resources\Agendas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AgendasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with('user'))
            ->columns([
                ColorColumn::make('color')
                    ->label('Color')
                    ->toggleable(),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('user.full_name')
                    ->label('Creado por')
                    ->placeholder('Sin asignar')
                    ->icon('heroicon-o-user-circle')
                    ->toggleable(),

                TextColumn::make('start_date')
                    ->label('Inicio')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('end_date')
                    ->label('Fin')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->placeholder('Todo el día'),

                IconColumn::make('all_day')
                    ->label('Todo el día')
                    ->boolean()
                    ->trueIcon('heroicon-o-sun')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('success')
                    ->falseColor('gray'),

                TextColumn::make('location')
                    ->label('Ubicación')
                    ->searchable()
                    ->icon('heroicon-o-map-pin')
                    ->placeholder('Sin ubicación')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('all_day')
                    ->label('Todo el día')
                    ->placeholder('Todos los eventos')
                    ->trueLabel('Solo eventos de día completo')
                    ->falseLabel('Solo eventos con hora')
                    ->native(false),

                Filter::make('start_date')
                    ->label('Rango de fechas')
                    ->schema([
                        DatePicker::make('desde')
                            ->label('Desde')
                            ->native(false)
                            ->displayFormat('d/m/Y'),

                        DatePicker::make('hasta')
                            ->label('Hasta')
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['desde'],
                                fn (Builder $query, string $date): Builder => $query->whereDate('start_date', '>=', $date),
                            )
                            ->when(
                                $data['hasta'],
                                fn (Builder $query, string $date): Builder => $query->whereDate('start_date', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['desde'] ?? null) {
                            $indicators[] = 'Desde: '.$data['desde'];
                        }

                        if ($data['hasta'] ?? null) {
                            $indicators[] = 'Hasta: '.$data['hasta'];
                        }

                        return $indicators;
                    }),
            ])
            ->recordActions([
                ViewAction::make()
                    ->iconButton()
                    ->tooltip('Ver evento'),
                EditAction::make()
                    ->iconButton()
                    ->tooltip('Editar evento'),
                DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Eliminar evento'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ])
                    ->label('Acciones masivas'),
            ])
            ->defaultSort('start_date', 'asc')
            ->persistFiltersInSession()
            ->persistSortInSession()
            ->persistSearchInSession()
            ->striped()
            ->paginated([10, 25, 50])
            ->deferFilters(false);
    }
}
