<?php

use App\Filament\Resources\Tasks\Pages\CreateTask;
use App\Filament\Resources\Tasks\Pages\EditTask;
use App\Filament\Resources\Tasks\Pages\ListTasks;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Livewire\Livewire;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
    $this->actingAs($this->admin);
});

test('admin can list tasks in table', function () {
    $tasks = Task::factory()->count(3)->create();

    Livewire::test(ListTasks::class)
        ->assertCanSeeTableRecords($tasks);
});

test('admin can create a task with user assignment', function () {
    $user = User::factory()->create();

    Livewire::test(CreateTask::class)
        ->fillForm([
            'title' => 'Implementar login',
            'description' => 'Crear formulario de autenticación',
            'status' => 'in_progress',
            'user_id' => $user->id,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Task::class, [
        'title' => 'Implementar login',
        'status' => 'in_progress',
        'user_id' => $user->id,
    ]);
});

test('create form requires title and status', function () {
    Livewire::test(CreateTask::class)
        ->fillForm([
            'title' => null,
            'status' => null,
        ])
        ->call('create')
        ->assertHasFormErrors([
            'title' => 'required',
            'status' => 'required',
        ]);
});

test('admin can create a task without user assignment', function () {
    Livewire::test(CreateTask::class)
        ->fillForm([
            'title' => 'Tarea sin asignar',
            'status' => 'todo',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Task::class, [
        'title' => 'Tarea sin asignar',
        'user_id' => null,
    ]);
});

test('admin can edit a task', function () {
    $task = Task::factory()->todo()->create(['title' => 'Título original']);

    Livewire::test(EditTask::class, ['record' => $task->id])
        ->fillForm([
            'title' => 'Título editado',
            'status' => 'completed',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Task::class, [
        'id' => $task->id,
        'title' => 'Título editado',
        'status' => 'completed',
    ]);
});

test('admin can delete a task', function () {
    $task = Task::factory()->create();

    Livewire::test(EditTask::class, ['record' => $task->id])
        ->callAction(DeleteAction::class);

    assertDatabaseMissing(Task::class, ['id' => $task->id]);
});

test('table filters tasks by status', function () {
    $todo = Task::factory()->todo()->count(2)->create();
    $completed = Task::factory()->completed()->count(2)->create();

    Livewire::test(ListTasks::class)
        ->filterTable('status', 'todo')
        ->assertCanSeeTableRecords($todo)
        ->assertCanNotSeeTableRecords($completed);
});

test('table filters tasks by user', function () {
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    $tasksA = Task::factory()->count(2)->create(['user_id' => $userA->id]);
    $tasksB = Task::factory()->count(2)->create(['user_id' => $userB->id]);

    Livewire::test(ListTasks::class)
        ->filterTable('user_id', $userA->id)
        ->assertCanSeeTableRecords($tasksA)
        ->assertCanNotSeeTableRecords($tasksB);
});

test('bulk action changes status of multiple tasks', function () {
    $tasks = Task::factory()->todo()->count(3)->create();

    Livewire::test(ListTasks::class)
        ->selectTableRecords($tasks->pluck('id')->toArray())
        ->callAction(TestAction::make('bulk_status')->table()->bulk(), data: ['status' => 'completed']);

    foreach ($tasks as $task) {
        assertDatabaseHas(Task::class, [
            'id' => $task->id,
            'status' => 'completed',
        ]);
    }
});

test('table search finds tasks by title', function () {
    $target = Task::factory()->create(['title' => 'Migracion de base de datos']);
    $other = Task::factory()->create(['title' => 'Diseno de interfaz']);

    Livewire::test(ListTasks::class)
        ->searchTable('Migracion')
        ->assertCanSeeTableRecords(collect([$target]))
        ->assertCanNotSeeTableRecords(collect([$other]));
});
