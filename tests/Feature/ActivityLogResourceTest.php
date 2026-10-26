<?php

use App\Filament\Resources\ActivityLogs\ActivityLogResource;
use App\Models\User;
use Jacobtims\FilamentLogger\Resources\ActivityResource\Pages\ListActivities;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('uses the local resource subclass', function () {
    expect(config('filament-logger.activity_resource'))->toBe(ActivityLogResource::class)
        ->and(ListActivities::getResource())->toBe(ActivityLogResource::class);
});

it('filters activities by old properties without errors', function () {
    $match = activity()->withProperties(['old' => ['name' => 'alpha']])->log('match');
    $other = activity()->withProperties(['old' => ['name' => 'beta']])->log('other');

    Livewire::test(ListActivities::class)
        ->filterTable('properties->old', ['old' => 'alpha'])
        ->assertSuccessful()
        ->assertCanSeeTableRecords([$match])
        ->assertCanNotSeeTableRecords([$other]);
});

it('filters activities by new properties without errors', function () {
    $match = activity()->withProperties(['attributes' => ['name' => 'alpha']])->log('match');
    $other = activity()->withProperties(['attributes' => ['name' => 'beta']])->log('other');

    Livewire::test(ListActivities::class)
        ->filterTable('properties->attributes', ['new' => 'alpha'])
        ->assertSuccessful()
        ->assertCanSeeTableRecords([$match])
        ->assertCanNotSeeTableRecords([$other]);
});
