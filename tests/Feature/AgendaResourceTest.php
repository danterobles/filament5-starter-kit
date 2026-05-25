<?php

use App\Filament\Resources\Agendas\Pages\CreateAgenda;
use App\Filament\Resources\Agendas\Pages\EditAgenda;
use App\Filament\Resources\Agendas\Pages\ListAgendas;
use App\Models\Agenda;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Filament\Actions\DeleteAction;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
    $this->actingAs($this->admin);
});

test('admin can list agendas in table', function () {
    $agendas = Agenda::factory()->count(3)->create();

    Livewire::test(ListAgendas::class)
        ->assertCanSeeTableRecords($agendas);
});

test('admin can create an agenda with valid dates', function () {
    Livewire::test(CreateAgenda::class)
        ->fillForm([
            'title' => 'Reunión de equipo',
            'description' => 'Revisión semanal del proyecto',
            'start_date' => '2026-06-10 09:00:00',
            'end_date' => '2026-06-10 10:00:00',
            'all_day' => false,
            'color' => '#3b82f6',
            'location' => 'Sala de juntas',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Agenda::class, [
        'title' => 'Reunión de equipo',
        'location' => 'Sala de juntas',
    ]);
});

test('create form requires title and start_date', function () {
    Livewire::test(CreateAgenda::class)
        ->fillForm([
            'title' => null,
            'start_date' => null,
        ])
        ->call('create')
        ->assertHasFormErrors([
            'title' => 'required',
            'start_date' => 'required',
        ]);
});

test('end_date must be after start_date', function () {
    Livewire::test(CreateAgenda::class)
        ->fillForm([
            'title' => 'Evento inválido',
            'start_date' => '2026-06-10 10:00:00',
            'end_date' => '2026-06-10 08:00:00',
            'all_day' => false,
        ])
        ->call('create')
        ->assertHasFormErrors(['end_date' => 'after']);
});

test('admin can create an all_day agenda without end_date', function () {
    Livewire::test(CreateAgenda::class)
        ->fillForm([
            'title' => 'Día festivo',
            'start_date' => '2026-06-12 00:00:00',
            'all_day' => true,
            'color' => '#10b981',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Agenda::class, [
        'title' => 'Día festivo',
        'all_day' => true,
    ]);
});

test('admin can edit an agenda', function () {
    $agenda = Agenda::factory()->create(['title' => 'Título original']);

    Livewire::test(EditAgenda::class, ['record' => $agenda->id])
        ->fillForm([
            'title' => 'Título editado',
            'start_date' => '2026-06-15 09:00:00',
            'end_date' => '2026-06-15 11:00:00',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Agenda::class, [
        'id' => $agenda->id,
        'title' => 'Título editado',
    ]);
});

test('admin can delete an agenda', function () {
    $agenda = Agenda::factory()->create();

    Livewire::test(EditAgenda::class, ['record' => $agenda->id])
        ->callAction(DeleteAction::class);

    assertDatabaseMissing(Agenda::class, ['id' => $agenda->id]);
});

test('table filters agendas by all_day status', function () {
    $allDay = Agenda::factory()->allDay()->count(2)->create();
    $timed = Agenda::factory()->count(2)->create(['all_day' => false]);

    Livewire::test(ListAgendas::class)
        ->filterTable('all_day', true)
        ->assertCanSeeTableRecords($allDay)
        ->assertCanNotSeeTableRecords($timed);
});

test('table search finds agendas by title', function () {
    $target = Agenda::factory()->create(['title' => 'Conferencia anual']);
    $other = Agenda::factory()->create(['title' => 'Reunión breve']);

    Livewire::test(ListAgendas::class)
        ->searchTable('Conferencia')
        ->assertCanSeeTableRecords(collect([$target]))
        ->assertCanNotSeeTableRecords(collect([$other]));
});
