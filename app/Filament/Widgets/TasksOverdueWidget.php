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
 * "Overdue" and "due soon" are computed from the real `due_date`
 * column on `tasks`:
 * - Overdue: still open (status other than `completed`) with a
 *   `due_date` in the past.
 * - Due soon: still open with a `due_date` between now and 7 days
 *   from now.
 * - Sin fecha límite: still open with no `due_date` set at all. A
 *   task without a deadline cannot violate one, so it is excluded
 *   from both the overdue and due-soon counts, but it is still
 *   surfaced as its own stat so this information isn't silently
 *   dropped from the widget.
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
            $now = now();
            $dueSoonThreshold = $now->clone()->addDays(7);

            return [
                'overdue' => Task::query()
                    ->where('status', '!=', 'completed')
                    ->whereNotNull('due_date')
                    ->where('due_date', '<', $now)
                    ->count(),
                'due_soon' => Task::query()
                    ->where('status', '!=', 'completed')
                    ->whereNotNull('due_date')
                    ->whereBetween('due_date', [$now, $dueSoonThreshold])
                    ->count(),
                'no_due_date' => Task::query()
                    ->where('status', '!=', 'completed')
                    ->whereNull('due_date')
                    ->count(),
                'completed' => Task::query()
                    ->where('status', 'completed')
                    ->count(),
            ];
        });

        return [
            Stat::make('Tareas Vencidas', $data['overdue'])
                ->description('Fecha límite pasada')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color($data['overdue'] > 0 ? 'danger' : 'gray'),

            Stat::make('Por Vencer Pronto', $data['due_soon'])
                ->description('Vencen en los próximos 7 días')
                ->descriptionIcon('heroicon-o-clock')
                ->color($data['due_soon'] > 0 ? 'warning' : 'gray'),

            Stat::make('Sin Fecha Límite', $data['no_due_date'])
                ->description('Abiertas sin fecha asignada')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('gray'),

            Stat::make('Completadas', $data['completed'])
                ->description('Tareas finalizadas')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
