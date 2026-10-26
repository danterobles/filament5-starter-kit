<?php

namespace App\Filament\Resources\ActivityLogs;

use App\Filament\Resources\ActivityLogs\Tables\ActivityLogsTable;
use Filament\Tables\Table;
use Jacobtims\FilamentLogger\Resources\ActivityResource;

/**
 * Subclase local de jacobtims/filament-logger: corrige los filtros old/new,
 * que fallan con "Undefined array key" en Filament 5.
 */
class ActivityLogResource extends ActivityResource
{
    public static function table(Table $table): Table
    {
        return ActivityLogsTable::configure($table);
    }
}
