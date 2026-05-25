<?php

namespace App\Filament\Resources\Agendas\Pages;

use App\Filament\Resources\Agendas\AgendaResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;

    protected static ?string $title = 'Crear Evento';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Evento creado exitosamente')
            ->body('El evento ha sido registrado correctamente en el sistema.')
            ->duration(5000)
            ->icon('heroicon-o-check-circle')
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label('Guardar evento'),
            $this->getCancelFormAction()->label('Cancelar'),
        ];
    }
}
