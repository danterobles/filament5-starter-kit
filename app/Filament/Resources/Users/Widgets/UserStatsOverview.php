<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class UserStatsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        $stats = User::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN active = 1 THEN 1 ELSE 0 END) as active_count,
            SUM(CASE WHEN MONTH(created_at) = ? AND YEAR(created_at) = ? THEN 1 ELSE 0 END) as new_this_month
        ', [now()->month, now()->year])->first();

        $totalUsers = (int) $stats->total;
        $activeUsers = (int) $stats->active_count;
        $inactiveUsers = $totalUsers - $activeUsers;
        $newUsersThisMonth = (int) $stats->new_this_month;

        $usersWithRoles = DB::table('model_has_roles')
            ->distinct('model_id')
            ->count('model_id');

        $userGrowthData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();

        return [
            Stat::make('Total Usuarios', $totalUsers)
                ->description('Total de usuarios registrados')
                ->descriptionIcon('heroicon-o-users')
                ->chart($userGrowthData)
                ->color('primary'),

            Stat::make('Usuarios Activos', $activeUsers)
                ->description(number_format(($activeUsers / max($totalUsers, 1)) * 100, 1).'% del total')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Usuarios Inactivos', $inactiveUsers)
                ->description($inactiveUsers > 0 ? 'Requieren atención' : 'Todo bien')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color($inactiveUsers > 0 ? 'danger' : 'gray'),

            Stat::make('Nuevos Este Mes', $newUsersThisMonth)
                ->description('Registrados en '.now()->translatedFormat('F'))
                ->descriptionIcon('heroicon-o-calendar')
                ->color('info'),

            Stat::make('Con Roles Asignados', $usersWithRoles)
                ->description(number_format(($usersWithRoles / max($totalUsers, 1)) * 100, 1).'% tienen roles')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('warning'),

            Stat::make('Sin Roles', $totalUsers - $usersWithRoles)
                ->description('Usuarios sin roles específicos')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('danger'),
        ];
    }
}
