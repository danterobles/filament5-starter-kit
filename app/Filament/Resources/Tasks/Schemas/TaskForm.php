<?php

namespace App\Filament\Resources\Tasks\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información de la Tarea')
                    ->description('Datos principales de la tarea')
                    ->icon('heroicon-o-clipboard-document-list')
                    ->collapsible()
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Descripción breve de la tarea')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Descripción')
                            ->rows(3)
                            ->maxLength(65535)
                            ->placeholder('Detalle adicional de la tarea')
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                Select::make('status')
                                    ->label('Estado')
                                    ->required()
                                    ->options([
                                        'todo' => 'To Do',
                                        'in_progress' => 'In Progress',
                                        'completed' => 'Completed',
                                    ])
                                    ->default('todo')
                                    ->native(false),

                                Select::make('user_id')
                                    ->label('Asignado a')
                                    ->options(
                                        fn () => User::query()
                                            ->orderBy('name')
                                            ->get()
                                            ->mapWithKeys(fn (User $user) => [
                                                $user->id => Str::of($user->full_name)->trim()->toString(),
                                            ])
                                    )
                                    ->searchable()
                                    ->native(false)
                                    ->placeholder('Sin asignar'),
                            ]),
                    ])
                    ->columns(1),
            ]);
    }
}
