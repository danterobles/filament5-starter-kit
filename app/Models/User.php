<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

#[Fillable(['name', 'last', 'email', 'phone', 'avatar_url', 'password', 'active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser, HasAvatar
{
    public const AVATAR_DISK = 'public';

    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable, TwoFactorAuthenticatable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'active' => 'boolean',
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url ? Storage::disk(self::AVATAR_DISK)->url($this->avatar_url) : null;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->active;
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => trim("{$this->name} {$this->last}"),
        );
    }

    /**
     * Orders by the real columns behind the `full_name` accessor.
     *
     * @param  Builder<User>  $query
     */
    #[Scope]
    protected function orderByFullName(Builder $query, string $direction = 'asc'): void
    {
        $query
            ->orderBy($this->qualifyColumn('name'), $direction)
            ->orderBy($this->qualifyColumn('last'), $direction);
    }

    /**
     * Whether this user may edit or delete the target user. A super_admin can manage
     * anyone; anyone else can only manage users whose permissions are a subset of
     * their own, so a limited admin cannot take over a more privileged account.
     */
    public function canManage(User $target): bool
    {
        if ($this->hasRole('super_admin')) {
            return true;
        }

        if ($target->hasRole('super_admin')) {
            return false;
        }

        return $this->holdsAllPermissions($target->getAllPermissions()->pluck('name'));
    }

    /**
     * Whether this user may assign the given role. Only a super_admin can assign
     * super_admin, and nobody can hand out permissions they do not hold themselves.
     */
    public function canAssignRole(int|string|null $roleId): bool
    {
        if ($roleId === null || $this->hasRole('super_admin')) {
            return true;
        }

        $role = Role::find($roleId);

        if ($role === null) {
            return false;
        }

        return $role->name !== 'super_admin'
            && $this->holdsAllPermissions($role->permissions->pluck('name'));
    }

    /**
     * @param  Collection<int, string>  $permissionNames
     */
    private function holdsAllPermissions(Collection $permissionNames): bool
    {
        return $permissionNames->diff($this->getAllPermissions()->pluck('name'))->isEmpty();
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function agendas(): HasMany
    {
        return $this->hasMany(Agenda::class);
    }
}
