<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Filament\Resources\Tasks\TaskResource;
use App\Notifications\TaskAssignedNotification;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTask extends EditRecord
{
    protected static string $resource = TaskResource::class;

    protected static ?string $title = 'Editar Tarea';

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (! auth()->user()->hasRole('super_admin')) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Eliminar')
                ->icon('heroicon-o-trash')
                ->successNotificationTitle('Tarea eliminada'),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Tarea actualizada')
            ->body('Los cambios han sido guardados exitosamente.')
            ->duration(3000)
            ->icon('heroicon-o-check-circle')
            ->send();
    }

    protected function afterSave(): void
    {
        $assignee = $this->record->user;

        if (! $this->record->wasChanged('user_id') || ! $assignee || $assignee->is(auth()->user())) {
            return;
        }

        $assignee->notify(new TaskAssignedNotification($this->record));
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
