<?php

use App\Filament\Resources\Users\Widgets\UserGrowthChart;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Livewire;

beforeEach(function () {
    Cache::forget('user_growth_chart');
    Carbon::setTestNow(Carbon::create(2026, 6, 15));

    $this->seed(ShieldSeeder::class);
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');
    $this->actingAs($admin);
});

afterEach(function () {
    Carbon::setTestNow();
    Cache::forget('user_growth_chart');
});

test('chart renders without errors', function () {
    Livewire::test(UserGrowthChart::class)->assertSuccessful();
});

test('chart dataset counts reflect actual user creation months', function () {
    // Outside the 6-month window (now = 2026-06-15) — must not be counted.
    User::factory()->create(['created_at' => Carbon::create(2025, 11, 10)]);

    // January 2026 — 5 months back.
    User::factory()->count(3)->create(['created_at' => Carbon::create(2026, 1, 10)]);

    // March 2026 — 3 months back.
    User::factory()->count(2)->create(['created_at' => Carbon::create(2026, 3, 10)]);

    Livewire::test(UserGrowthChart::class)->assertSuccessful();

    $cached = Cache::get('user_growth_chart');

    expect($cached)->not->toBeNull();
    // Labels run Jan..Jun 2026; counts: Jan=3, Feb=0, Mar=2, Apr=0, May=0, Jun=1 (the admin from beforeEach).
    expect($cached['counts'])->toBe([3, 0, 2, 0, 0, 1]);
    expect($cached['labels'])->toHaveCount(6);
});

test('chart excludes users created more than 6 months ago', function () {
    User::factory()->count(5)->create(['created_at' => Carbon::create(2025, 1, 1)]);

    Livewire::test(UserGrowthChart::class)->assertSuccessful();

    $cached = Cache::get('user_growth_chart');

    expect(array_sum($cached['counts']))->toBe(1); // Only the admin created in beforeEach.
});
