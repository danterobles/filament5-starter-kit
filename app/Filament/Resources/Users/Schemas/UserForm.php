<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información Personal')
                    ->description('Información básica del usuario')
                    ->icon('heroicon-o-user')
                    ->collapsible()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nombre')
                                    ->required()
                                    ->maxLength(255)
                                    ->autocomplete('given-name')
                                    ->placeholder('Ingrese el nombre'),

                                TextInput::make('last')
                                    ->label('Apellido')
                                    ->required()
                                    ->maxLength(255)
                                    ->autocomplete('family-name')
                                    ->placeholder('Ingrese el apellido'),
                            ]),

                        FileUpload::make('avatar_url')
                            ->label('Foto de Perfil')
                            ->image()
                            ->avatar()
                            ->imageEditor()
                            ->circleCropper()
                            ->directory('avatars')
                            ->visibility('private')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/webp'])
                            ->helperText('Tamaño máximo: 2MB. Formatos: PNG, JPG, WEBP'),
                    ])
                    ->columns(1),

                Section::make('Información de Contacto')
                    ->description('Datos de contacto y acceso')
                    ->icon('heroicon-o-envelope')
                    ->collapsible()
                    ->schema([
                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->autocomplete('email')
                            ->placeholder('usuario@ejemplo.com')
                            ->prefixIcon('heroicon-o-envelope')
                            ->columnSpanFull(),
                        TextInput::make('phone')
                            ->label('Teléfono')
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Ingrese el teléfono')
                            ->prefixIcon('heroicon-o-phone')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Seguridad y Acceso')
                    ->description('Contraseña y configuración de seguridad')
                    ->icon('heroicon-o-lock-closed')
                    ->collapsible()
                    ->schema([
                        TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrateStateUsing(fn ($state) => ! empty($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->minLength(8)
                            ->maxLength(255)
                            ->placeholder('Mínimo 8 caracteres')
                            ->revealable()
                            ->helperText('Deje en blanco para mantener la contraseña actual'),

                        TextInput::make('password_confirmation')
                            ->label('Confirmar Contraseña')
                            ->password()
                            ->same('password')
                            ->requiredWith('password')
                            ->maxLength(255)
                            ->placeholder('Repita la contraseña')
                            ->revealable()
                            ->dehydrated(false),
                    ])
                    ->columns(2),

                Section::make('Roles y Permisos')
                    ->description('Asignación de roles del usuario')
                    ->icon('heroicon-o-shield-check')
                    ->collapsible()
                    ->schema([
                        Select::make('role_id')
                            ->label('Rol')
                            // ->options(fn () => Role::query()->orderBy('name')->pluck('name', 'id')->toArray())
                            ->options(function () {
                                return Role::query()
                                    ->orderBy('name')
                                    ->get()
                                    ->mapWithKeys(function ($role) {
                                        return [
                                            $role->id => Str::ucwords(Str::replace('_', ' ', $role->name))
                                        ];
                                    })
                                    ->toArray();
                            })
                            ->required()
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->placeholder('Seleccione un rol')
                            ->helperText('El rol asignado determina los permisos del usuario en el sistema')
                            ->exists('roles', 'id')
                            ->afterStateHydrated(function (Select $component, ?User $record): void {
                                if (! $record) {
                                    return;
                                }

                                $roleId = $record->roles()->pluck('id')->first();
                                $component->state($roleId ? (string) $roleId : null);
                            })
                            ->dehydrateStateUsing(fn ($state) => $state ? (int) $state : null)
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Estado de la Cuenta')
                    ->description('Estado y configuración de la cuenta')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsible()
                    ->schema([
                        Toggle::make('active')
                            ->label('Usuario Activo')
                            ->helperText('Los usuarios inactivos no pueden acceder al sistema')
                            ->default(true)
                            ->inline(false)
                            ->onIcon('heroicon-o-check-circle')
                            ->offIcon('heroicon-o-x-circle')
                            ->onColor('success')
                            ->offColor('danger'),
                    ])
                    ->columns(1),
            ]);
    }
}
