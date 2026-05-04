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
        $startDate = Carbon::now()->subMonths(5)->startOfMonth();

        $results = User::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month_key, COUNT(*) as count")
            ->where('created_at', '>=', $startDate)
            ->groupByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->orderByRaw("DATE_FORMAT(created_at, '%Y-%m')")
            ->pluck('count', 'month_key');

        $labels = collect();
        $counts = collect();

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels->push($date->translatedFormat('M Y'));
            $counts->push((int) $results->get($date->format('Y-m'), 0));
        }

        return [
            'labels' => $labels->toArray(),
            'counts' => $counts->toArray(),
        ];
    }
}
