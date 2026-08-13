<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Filament\Resources\Tasks\TaskResource;
use App\Notifications\TaskAssignedNotification;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected static ?string $title = 'Crear Tarea';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! auth()->user()->hasRole('super_admin')) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tarea creada exitosamente')
            ->body('La tarea ha sido registrada correctamente.')
            ->duration(5000)
            ->icon('heroicon-o-check-circle')
            ->send();
    }

    protected function afterCreate(): void
    {
        $assignee = $this->record->user;

        if (! $assignee) {
            return;
        }

        $assignee->notify(new TaskAssignedNotification($this->record));
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Guardar tarea'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
