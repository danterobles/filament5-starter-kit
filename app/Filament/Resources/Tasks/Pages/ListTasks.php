<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Filament\Resources\Tasks\TaskResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected static ?string $title = 'Tareas';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nueva tarea'),
        ];
    }
}
