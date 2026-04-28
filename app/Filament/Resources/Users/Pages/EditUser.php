<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Editar Usuario';

    protected ?int $selectedRoleId = null;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('toggle_active')
                ->label(fn () => $this->record->active ? 'Desactivar' : 'Activar')
                ->icon(fn () => $this->record->active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                ->color(fn () => $this->record->active ? 'danger' : 'success')
                ->requiresConfirmation()
                ->modalHeading(fn () => ($this->record->active ? 'Desactivar' : 'Activar').' usuario')
                ->modalDescription(fn () => '¿Está seguro de que desea '.($this->record->active ? 'desactivar' : 'activar').' este usuario?')
                ->action(function () {
                    $this->record->update([
                        'active' => ! $this->record->active,
                    ]);

                    $this->record->refresh();
                    $this->refreshFormData(['active']);

                    Notification::make()
                        ->success()
                        ->title('Estado actualizado')
                        ->body('El usuario ha sido '.($this->record->active ? 'activado' : 'desactivado').' correctamente.')
                        ->send();
                }),

            DeleteAction::make()
                ->label('Eliminar')
                ->icon('heroicon-o-trash')
                ->successNotificationTitle('Usuario eliminado'),

            ForceDeleteAction::make()
                ->label('Eliminar permanentemente')
                ->icon('heroicon-o-trash'),

            RestoreAction::make()
                ->label('Restaurar')
                ->icon('heroicon-o-arrow-path'),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Usuario actualizado')
            ->body('Los cambios han sido guardados exitosamente.')
            ->duration(3000)
            ->icon('heroicon-o-check-circle')
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->selectedRoleId = $data['role_id'] ?? null;
        unset($data['role_id']);

        // Si no se proporciona contraseña, eliminarla del array para no actualizarla
        if (empty($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->selectedRoleId !== null) {
            $this->record->syncRoles([$this->selectedRoleId]);

            return;
        }

        $this->record->syncRoles([]);
    }
}
