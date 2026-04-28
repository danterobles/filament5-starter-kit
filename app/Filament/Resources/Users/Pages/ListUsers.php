<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Filament\Resources\Users\Widgets\LatestUsersTable;
use App\Filament\Resources\Users\Widgets\UserStatsOverview;
use App\Filament\Resources\Users\Widgets\UserGrowthChart;
use Filament\Actions\CreateAction;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nuevo Usuario')
                ->icon('heroicon-o-plus-circle')
                ->modalHeading('Crear Nuevo Usuario')
                ->successNotificationTitle('Usuario creado exitosamente'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserStatsOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            LatestUsersTable::class,
            UserGrowthChart::class,
        ];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return [
            'sm' => 2,
            'lg' => 3,
            'xl' => 6,
        ];
    }
}
