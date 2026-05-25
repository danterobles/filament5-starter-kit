<?php

namespace App\Livewire;

use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;

class CustomPersonalInfo extends PersonalInfo
{
    public array $only = [
        'name',
        'last',
        'email',
        'phone',
    ];

    protected function getNameComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('name')
            ->label('Nombre')
            ->required()
            ->maxLength(255);
    }

    protected function getLastComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('last')
            ->label('Apellido')
            ->required()
            ->maxLength(255);
    }

    protected function getEmailComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('email')
            ->label('Email')
            ->email()
            ->disabled()
            ->dehydrated(false)
            ->helperText('El email no puede ser modificado.')
            ->maxLength(255);
    }

    protected function getPhoneComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('phone')
            ->label('Teléfono')
            ->tel()
            ->maxLength(255)
            ->placeholder('Ingrese el teléfono')
            ->prefixIcon('heroicon-o-phone');
    }

    protected function getProfileFormSchema(): array
    {
        $components = [];

        if ($this->hasAvatars) {
            $components[] = filament('filament-breezy')->getAvatarUploadComponent();
        }

        $components[] = Section::make('Información Personal')
            ->description('Actualiza tu información de perfil')
            ->schema([
                $this->getNameComponent(),
                $this->getLastComponent(),
                $this->getEmailComponent(),
                $this->getPhoneComponent(),
            ])
            ->columns(2)
            ->columnSpanFull();

        return $components;
    }

    protected function sendNotification(): void
    {
        Notification::make()
            ->success()
            ->title('¡Perfil actualizado!')
            ->body('Tu información ha sido guardada correctamente.')
            ->send();
    }
}
