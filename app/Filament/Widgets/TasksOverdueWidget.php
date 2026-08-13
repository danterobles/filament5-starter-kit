<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * Surfaces tasks that need attention on the dashboard.
 *
 * The `tasks` table has no `due_date` column (see the
 * `create_tasks_table` migration), so "overdue" and "due soon" are
 * approximated from the columns that do exist: a task that is still
 * open (status other than `completed`) and was created more than 7
 * days ago is treated as overdue, while one created within the last
 * 7 days is treated as due soon.
 *
 * `Task::query()` already applies the global `OwnedByUserScope`, so a
 * regular user only sees counts for their own tasks, while a
 * super_admin sees counts across every user.
 */
class TasksOverdueWidget extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        $data = Cache::remember('tasks_overdue_widget_'.Auth::id(), 60, function () {
            $threshold = now()->subDays(7);

            return [
                'overdue' => Task::query()
                    ->where('status', '!=', 'completed')
                    ->where('created_at', '<', $threshold)
                    ->count(),
                'due_soon' => Task::query()
                    ->where('status', '!=', 'completed')
                    ->where('created_at', '>=', $threshold)
                    ->count(),
                'completed' => Task::query()
                    ->where('status', 'completed')
                    ->count(),
            ];
        });

        return [
            Stat::make('Tareas Vencidas', $data['overdue'])
                ->description('Abiertas hace más de 7 días')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color($data['overdue'] > 0 ? 'danger' : 'gray'),

            Stat::make('Por Vencer Pronto', $data['due_soon'])
                ->description('Abiertas en los últimos 7 días')
                ->descriptionIcon('heroicon-o-clock')
                ->color($data['due_soon'] > 0 ? 'warning' : 'gray'),

            Stat::make('Completadas', $data['completed'])
                ->description('Tareas finalizadas')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
