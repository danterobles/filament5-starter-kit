<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Integracion de FilamentUser
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;

use Spatie\Permission\Traits\HasRoles;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;


#[Fillable(['name', 'last', 'email', 'phone', 'avatar_url', 'password', 'active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles, TwoFactorAuthenticatable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     /**
     * Obtiene la URL del avatar que Filament debe mostrar para el usuario.
     *
     * @return string|null URL pública absoluta o null si no existe avatar configurado.
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }

    /**
     * Determina si el usuario puede acceder al panel de Filament indicado.
     *
     * @param  Panel  $panel  Instancia del panel solicitada.
     * @return bool true cuando la cuenta se encuentra activa.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->active;
        
        /*if ($panel->getId() === 'admin' && $this->active) {
            return $this->hasRole('super_admin');
        }*/
        //return false;
    }

    /**
     * Calcula el nombre completo concatenando nombre y apellido.
     *
     * @return string Nombre completo sin espacios sobrantes.
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->name} {$this->last}");
    }
}
