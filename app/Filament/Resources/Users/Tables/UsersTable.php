<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn (Builder $query) => $query->with('roles')
            )
            ->columns([
                ImageColumn::make('avatar_url')
                    ->label('Avatar')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name='.urlencode($record->name).'&color=7F9CF5&background=EBF4FF')
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('last')
                    ->label('Apellido')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('full_name')
                    ->label('Nombre Completo')
                    ->searchable(['name', 'last'])
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight('medium'),

                TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->weight('medium'),

                TextColumn::make('email')
                    ->label('Email')
                    ->icon('heroicon-o-envelope')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copiado al portapapeles')
                    ->copyMessageDuration(1500),

                TextColumn::make('roles.name')
                    ->label('Rol')
                    ->badge()
                    ->formatStateUsing(fn ($state) => Arr::first(Arr::wrap($state)))
                    ->color(fn (?string $state): string => match ($state) {
                        'super_admin' => 'danger',
                        'admin' => 'warning',
                        'panel_user' => 'success',
                        null => 'gray',
                        default => 'info',
                    })
                    ->icon(fn (?string $state): string => match ($state) {
                        'super_admin' => 'heroicon-o-shield-exclamation',
                        'admin' => 'heroicon-o-shield-check',
                        'panel_user' => 'heroicon-o-user-circle',
                        null => 'heroicon-o-question-mark-circle',
                        default => 'heroicon-o-user',
                    })
                    ->searchable()
                    ->placeholder('Sin rol asignado')
                    ->toggleable(),

                IconColumn::make('active')
                    ->label('Estado')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->since()
                    ->tooltip(fn ($record) => $record->created_at->format('d/m/Y H:i:s'))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Última Actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->since()
                    ->tooltip(fn ($record) => $record->updated_at->format('d/m/Y H:i:s'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('active')
                    ->label('Estado de Usuario')
                    ->placeholder('Todos los usuarios')
                    ->trueLabel('Solo usuarios activos')
                    ->falseLabel('Solo usuarios inactivos')
                    ->native(false),

                SelectFilter::make('roles')
                    ->label('Filtrar por Rol')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->placeholder('Todos los roles')
                    ->indicator('Rol'),
            ])
            ->recordActions([
                ViewAction::make()
                    ->iconButton()
                    ->tooltip('Ver detalles'),
                EditAction::make()
                    ->iconButton()
                    ->tooltip('Editar usuario'),
                DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Eliminar usuario'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ])
                    ->label('Acciones masivas'),
            ])
            ->defaultSort('created_at', 'desc')
            ->persistFiltersInSession()
            ->persistSortInSession()
            ->persistSearchInSession()
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->deferFilters(false);
    }
}
