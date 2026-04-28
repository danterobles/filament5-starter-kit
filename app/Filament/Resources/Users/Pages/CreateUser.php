<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Spatie\Permission\Models\Role;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Crear Usuario';

    protected ?int $selectedRoleId = null;

    protected function getRedirectUrl(): string
    {
        // return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
        return $this->getResource()::getUrl("index");
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Usuario creado exitosamente')
            ->body('El usuario ha sido registrado correctamente en el sistema.')
            ->duration(5000)
            ->icon('heroicon-o-check-circle')
            ->send();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->selectedRoleId = $data['role_id'] ?? null;
        unset($data['role_id']);

        // Asegurarse que active tenga un valor por defecto
        if (! isset($data['active'])) {
            $data['active'] = true;
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        // Asignar el rol al usuario
        if ($this->selectedRoleId !== null) {
            $this->record->syncRoles([$this->selectedRoleId]);
            return;
        }

        $this->record->syncRoles([]);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label("Registrar"),

            $this->getCancelFormAction()->label("Cancelar"),
        ];
    }
}
