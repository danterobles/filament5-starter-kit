<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Filament\Resources\Tasks\TaskResource;
use Filament\Actions\Action;
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

        Notification::make()
            ->title('Nueva tarea asignada')
            ->body("Se te asignó la tarea \"{$this->record->title}\" como recordatorio.")
            ->icon('heroicon-o-clipboard-document-list')
            ->actions([
                Action::make('view')
                    ->label('Ver tarea')
                    ->url(TaskResource::getUrl('edit', ['record' => $this->record]))
                    ->button()
                    ->markAsRead(),
            ])
            ->sendToDatabase($assignee);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Guardar tarea'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
