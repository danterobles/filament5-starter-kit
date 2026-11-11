<?php

use App\Filament\Widgets\AgendaCalendarWidget;
use App\Models\Agenda;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Illuminate\Support\Carbon;
use Livewire\Livewire;
use Spatie\Permission\PermissionRegistrar;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
    $this->window = [
        'start' => Carbon::parse('2026-03-01')->toIso8601String(),
        'end' => Carbon::parse('2026-03-31')->toIso8601String(),
    ];
});

function fetchedEventTitles(array $window): array
{
    return collect((new AgendaCalendarWidget)->fetchEvents($window))->pluck('title')->all();
}

test('an event inside the visible window is returned', function () {
    Agenda::factory()->for($this->user)->create([
        'title' => 'Inside',
        'start_date' => '2026-03-10 09:00:00',
        'end_date' => '2026-03-10 10:00:00',
    ]);

    expect(fetchedEventTitles($this->window))->toBe(['Inside']);
});

test('a multi-day event that started before the window but overlaps it is returned', function () {
    Agenda::factory()->for($this->user)->create([
        'title' => 'Overlapping',
        'start_date' => '2026-02-27 09:00:00',
        'end_date' => '2026-03-03 18:00:00',
    ]);

    expect(fetchedEventTitles($this->window))->toBe(['Overlapping']);
});

test('events entirely outside the window are not returned', function () {
    Agenda::factory()->for($this->user)->create([
        'title' => 'Before',
        'start_date' => '2026-02-10 09:00:00',
        'end_date' => '2026-02-12 09:00:00',
    ]);
    Agenda::factory()->for($this->user)->create([
        'title' => 'After',
        'start_date' => '2026-04-05 09:00:00',
        'end_date' => null,
    ]);
    Agenda::factory()->for($this->user)->create([
        'title' => 'Open-ended before',
        'start_date' => '2026-02-20 09:00:00',
        'end_date' => null,
    ]);

    expect(fetchedEventTitles($this->window))->toBe([]);
});

test('an event without end date that starts inside the window is returned', function () {
    Agenda::factory()->for($this->user)->create([
        'title' => 'Open-ended',
        'start_date' => '2026-03-15 09:00:00',
        'end_date' => null,
    ]);

    expect(fetchedEventTitles($this->window))->toBe(['Open-ended']);
});

test('the create event action follows the Agenda policy', function () {
    $this->seed(ShieldSeeder::class);

    $viewer = User::factory()->create();
    $viewer->givePermissionTo('View:AgendaCalendarWidget');
    $this->actingAs($viewer);

    Livewire::test(AgendaCalendarWidget::class)->assertActionHidden('create');

    $viewer->givePermissionTo('Create:Agenda');
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    Livewire::test(AgendaCalendarWidget::class)->assertActionVisible('create');
});

test('editing and deleting an event requires the matching Agenda permission', function () {
    $this->seed(ShieldSeeder::class);

    $viewer = User::factory()->create();
    $viewer->givePermissionTo('View:AgendaCalendarWidget');
    $this->actingAs($viewer);
    $event = Agenda::factory()->for($viewer)->create();

    Livewire::test(AgendaCalendarWidget::class)
        ->call('onEventClick', ['id' => $event->id])
        ->assertActionHidden('edit')
        ->assertActionHidden('delete');
});
