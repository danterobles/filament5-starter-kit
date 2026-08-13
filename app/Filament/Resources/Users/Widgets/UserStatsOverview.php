<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class UserStatsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        $data = Cache::remember('user_stats_overview', 60, function () {
            $stats = User::selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN active = 1 THEN 1 ELSE 0 END) as active_count
            ')->first();

            $totalUsers = (int) $stats->total;
            $activeUsers = (int) $stats->active_count;

            return [
                'total' => $totalUsers,
                'active' => $activeUsers,
                'inactive' => $totalUsers - $activeUsers,
                'new_this_month' => User::whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->count(),
                'with_roles' => User::has('roles')->count(),
                'growth' => User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                    ->where('created_at', '>=', now()->subDays(7))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->pluck('count')
                    ->toArray(),
            ];
        });

        return [
            Stat::make('Total Usuarios', $data['total'])
                ->description('Total de usuarios registrados')
                ->descriptionIcon('heroicon-o-users')
                ->chart($data['growth'])
                ->color('primary'),

            Stat::make('Usuarios Activos', $data['active'])
                ->description(number_format(($data['active'] / max($data['total'], 1)) * 100, 1).'% del total')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Usuarios Inactivos', $data['inactive'])
                ->description($data['inactive'] > 0 ? 'Requieren atención' : 'Todo bien')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color($data['inactive'] > 0 ? 'danger' : 'gray'),

            Stat::make('Nuevos Este Mes', $data['new_this_month'])
                ->description('Registrados en '.now()->translatedFormat('F'))
                ->descriptionIcon('heroicon-o-calendar')
                ->color('info'),

            Stat::make('Con Roles Asignados', $data['with_roles'])
                ->description(number_format(($data['with_roles'] / max($data['total'], 1)) * 100, 1).'% tienen roles')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('warning'),

            Stat::make('Sin Roles', $data['total'] - $data['with_roles'])
                ->description('Usuarios sin roles específicos')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('danger'),
        ];
    }
}
