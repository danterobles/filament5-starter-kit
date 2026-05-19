<?php

namespace App\Filament\Clusters\Users;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;

class UsersCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $slug = 'users';

    protected static ?int $navigationSort = 10;

    public static function getNavigationLabel(): string
    {
        return __('navigation.users.navigation_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.roles_permissions');
    }
}
