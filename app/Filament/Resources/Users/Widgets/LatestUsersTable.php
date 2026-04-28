<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Arr;

class LatestUsersTable extends TableWidget
{
    protected static ?string $heading = 'Últimos Usuarios Registrados';

    protected int|string|array $columnSpan = 'full';

    protected ?string $pollingInterval = '10s';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()
                    ->with('roles')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                ImageColumn::make('avatar_url')
                    ->label('Avatar')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name='.urlencode($record->name).'&color=7F9CF5&background=EBF4FF'),

                TextColumn::make('full_name')
                    ->label('Nombre Completo')
                    ->searchable(['name', 'last'])
                    ->sortable()
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
                    ->formatStateUsing(fn ($state) => Arr::first(Arr::wrap($state)))
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
                    ->tooltip(fn ($record) => $record->created_at->format('d/m/Y H:i:s')),
            ]);
    }
}
