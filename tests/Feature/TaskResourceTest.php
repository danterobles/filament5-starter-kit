<?php

use App\Filament\Resources\Tasks\Pages\CreateTask;
use App\Filament\Resources\Tasks\Pages\EditTask;
use App\Filament\Resources\Tasks\Pages\ListTasks;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Illuminate\Notifications\DatabaseNotification;
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

test('a user without update permission cannot change task status via bulk action', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:Task', 'View:Task');

    $tasks = Task::factory()->todo()->for($viewer)->count(3)->create();

    $this->actingAs($viewer);

    Livewire::test(ListTasks::class)
        ->selectTableRecords($tasks->pluck('id')->toArray())
        ->callAction(TestAction::make('bulk_status')->table()->bulk(), data: ['status' => 'completed']);

    foreach ($tasks as $task) {
        assertDatabaseHas(Task::class, [
            'id' => $task->id,
            'status' => 'todo',
        ]);
    }
});

test('a user with update permission can change task status via bulk action', function () {
    $editor = User::factory()->create();
    $editor->givePermissionTo('ViewAny:Task', 'View:Task', 'Update:Task');

    $tasks = Task::factory()->todo()->for($editor)->count(3)->create();

    $this->actingAs($editor);

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

test('creating a task with an assigned user sends them a reminder notification', function () {
    $assignee = User::factory()->create();

    Livewire::test(CreateTask::class)
        ->fillForm([
            'title' => 'Preparar reporte mensual',
            'status' => 'todo',
            'user_id' => $assignee->id,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas('notifications', [
        'notifiable_type' => User::class,
        'notifiable_id' => $assignee->id,
    ]);

    $task = Task::where('title', 'Preparar reporte mensual')->firstOrFail();
    $notification = $assignee->fresh()->unreadNotifications()->sole();

    expect($notification->data['actions'][0]['url'] ?? null)
        ->toBe(EditTask::getUrl(['record' => $task]));
});

test('creating a task without an assigned user sends no notification', function () {
    Livewire::test(CreateTask::class)
        ->fillForm([
            'title' => 'Tarea sin dueño',
            'status' => 'todo',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(DatabaseNotification::count())->toBe(0);
});

test('a regular user only sees tasks assigned to them in the table', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:Task', 'View:Task');

    $ownTask = Task::factory()->for($viewer)->create();
    $othersTask = Task::factory()->create();

    $this->actingAs($viewer);

    Livewire::test(ListTasks::class)
        ->assertCanSeeTableRecords(collect([$ownTask]))
        ->assertCanNotSeeTableRecords(collect([$othersTask]));
});

test('a regular user creating a task cannot assign it to another user', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:Task', 'View:Task', 'Create:Task');
    $otherUser = User::factory()->create();

    $this->actingAs($viewer);

    Livewire::test(CreateTask::class)
        ->fillForm([
            'title' => 'Tarea propia',
            'status' => 'todo',
            'user_id' => $otherUser->id,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Task::class, [
        'title' => 'Tarea propia',
        'user_id' => $viewer->id,
    ]);

    assertDatabaseMissing(Task::class, [
        'title' => 'Tarea propia',
        'user_id' => $otherUser->id,
    ]);
});

test('a regular user editing a task cannot reassign it to another user', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:Task', 'View:Task', 'Update:Task');
    $otherUser = User::factory()->create();
    $task = Task::factory()->for($viewer)->create();

    $this->actingAs($viewer);

    Livewire::test(EditTask::class, ['record' => $task->id])
        ->fillForm([
            'user_id' => $otherUser->id,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Task::class, [
        'id' => $task->id,
        'user_id' => $viewer->id,
    ]);
});

test('a super_admin can still assign a task to another user when editing', function () {
    $task = Task::factory()->for($this->admin)->create();
    $otherUser = User::factory()->create();

    Livewire::test(EditTask::class, ['record' => $task->id])
        ->fillForm([
            'user_id' => $otherUser->id,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(Task::class, [
        'id' => $task->id,
        'user_id' => $otherUser->id,
    ]);
});
