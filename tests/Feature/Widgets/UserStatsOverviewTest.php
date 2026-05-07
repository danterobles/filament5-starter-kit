<?php

use App\Filament\Resources\Users\Widgets\UserStatsOverview;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Livewire\Livewire;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');
    $this->actingAs($admin);
});

test('user stats widget renders without errors', function () {
    User::factory()->count(3)->create();
    User::factory()->count(2)->inactive()->create();

    Livewire::test(UserStatsOverview::class)
        ->assertSuccessful();
});

test('widget shows correct total user count', function () {
    User::factory()->count(4)->create();

    Livewire::test(UserStatsOverview::class)
        ->assertSee('5'); // 4 + the admin created in beforeEach
});
