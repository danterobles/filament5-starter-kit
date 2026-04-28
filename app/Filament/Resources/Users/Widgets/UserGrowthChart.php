<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class UserGrowthChart extends ChartWidget
{
    protected ?string $heading = 'Crecimiento de Usuarios';

    protected ?string $description = 'Nuevos registros por mes (últimos 6 meses)';

    protected int|string|array $columnSpan = 'full';

    protected ?string $pollingInterval = '10s';

    protected function getData(): array
    {
        $data = $this->getUsersPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Usuarios Registrados',
                    'data' => $data['counts'],
                    'backgroundColor' => 'rgba(72, 111, 173, 0.2)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'pointBackgroundColor' => 'rgb(59, 130, 246)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(59, 130, 246)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'enabled' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
        ];
    }

    private function getUsersPerMonth(): array
    {
        $now = Carbon::now();
        $months = collect();
        $counts = collect();

        // Obtener los últimos 6 meses
        for ($i = 5; $i >= 0; $i--) {
            $date = $now->copy()->subMonths($i);
            $monthStart = $date->startOfMonth();
            $monthEnd = $date->copy()->endOfMonth();

            $count = User::whereBetween('created_at', [$monthStart, $monthEnd])->count();

            $months->push($date->translatedFormat('M Y'));
            $counts->push($count);
        }

        return [
            'labels' => $months->toArray(),
            'counts' => $counts->toArray(),
        ];
    }
}
