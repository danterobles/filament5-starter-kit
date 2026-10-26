<?php

namespace App\Filament\Resources\ActivityLogs\Tables;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Jacobtims\FilamentLogger\Resources\ActivityResource\Tables\ActivitiesTable;

class ActivityLogsTable extends ActivitiesTable
{
    public static function configure(Table $table): Table
    {
        parent::configure($table);

        $filters = collect($table->getFilters(withHidden: true))
            ->map(fn (BaseFilter $filter): BaseFilter => match ($filter->getName()) {
                'properties->old' => static::propertiesFilter('properties->old', 'old', 'old', 'old_attributes'),
                'properties->attributes' => static::propertiesFilter('properties->attributes', 'new', 'attributes', 'new_attributes'),
                default => $filter,
            })
            ->all();

        return $table->filters($filters);
    }

    protected static function propertiesFilter(string $name, string $field, string $property, string $indicatorLabel): Filter
    {
        return Filter::make($name)
            ->indicateUsing(function (array $data) use ($field, $indicatorLabel): ?string {
                $value = $data[$field] ?? null;

                if (blank($value)) {
                    return null;
                }

                return __("filament-logger::filament-logger.resource.label.{$indicatorLabel}").$value;
            })
            ->schema([
                TextInput::make($field)
                    ->label(__('filament-logger::filament-logger.resource.label.'.($field === 'new' ? 'new' : 'old')))
                    ->hint(__('filament-logger::filament-logger.resource.label.properties_hint')),
            ])
            ->query(function (Builder $query, array $data) use ($field, $property): Builder {
                $value = $data[$field] ?? null;

                if (blank($value)) {
                    return $query;
                }

                return $query->where("properties->{$property}", 'like', "%{$value}%");
            });
    }
}
