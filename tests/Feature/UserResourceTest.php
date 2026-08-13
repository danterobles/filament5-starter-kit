<?php

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Filament\Actions\DeleteAction;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('super_admin');
    $this->actingAs($this->admin);
});

test('admin can list users in table', function () {
    $users = User::factory()->count(3)->create();

    Livewire::test(ListUsers::class)
        ->assertCanSeeTableRecords($users);
});

test('table filters users by active status', function () {
    $active = User::factory()->count(2)->create();
    $inactive = User::factory()->count(2)->inactive()->create();

    Livewire::test(ListUsers::class)
        ->filterTable('active', true)
        ->assertCanSeeTableRecords($active)
        ->assertCanNotSeeTableRecords($inactive);
});

test('admin can create a user with a role', function () {
    $role = Role::findByName('super_admin', 'web');

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Juan',
            'last' => 'García',
            'email' => 'juan@test.com',
            'phone' => '5551234567',
            'password' => 'secretpass1',
            'password_confirmation' => 'secretpass1',
            'role_id' => $role->id,
            'active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(User::class, ['email' => 'juan@test.com', 'name' => 'Juan']);

    $created = User::where('email', 'juan@test.com')->first();
    expect($created->hasRole('super_admin'))->toBeTrue();
});

test('create form requires name, email, password, and role', function () {
    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => null,
            'email' => null,
            'password' => null,
            'role_id' => null,
        ])
        ->call('create')
        ->assertHasFormErrors([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
});

test('create form rejects invalid email', function () {
    Livewire::test(CreateUser::class)
        ->fillForm(['email' => 'not-an-email'])
        ->call('create')
        ->assertHasFormErrors(['email' => 'email']);
});

test('create form rejects password shorter than 8 characters', function () {
    Livewire::test(CreateUser::class)
        ->fillForm(['password' => 'short'])
        ->call('create')
        ->assertHasFormErrors(['password' => 'min']);
});

test('create form rejects duplicate email', function () {
    User::factory()->create(['email' => 'taken@test.com']);

    Livewire::test(CreateUser::class)
        ->fillForm(['email' => 'taken@test.com'])
        ->call('create')
        ->assertHasFormErrors(['email' => 'unique']);
});

test('admin can edit a user', function () {
    $user = User::factory()->create();
    $role = Role::findByName('super_admin', 'web');

    Livewire::test(EditUser::class, ['record' => $user->id])
        ->fillForm([
            'name' => 'Editado',
            'last' => 'Apellido',
            'email' => $user->email,
            'phone' => '5559999999',
            'role_id' => $role->id,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    assertDatabaseHas(User::class, ['id' => $user->id, 'name' => 'Editado']);
});

test('a regular user editing themself cannot grant the super_admin role', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:User', 'View:User', 'Update:User');

    $this->actingAs($viewer);

    $superAdminRole = Role::findByName('super_admin', 'web');

    Livewire::test(EditUser::class, ['record' => $viewer->id])
        ->fillForm([
            'name' => $viewer->name,
            'last' => $viewer->last,
            'email' => $viewer->email,
            'role_id' => $superAdminRole->id,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($viewer->fresh()->hasRole('super_admin'))->toBeFalse();
});

test('a regular user editing another user cannot grant the super_admin role', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:User', 'View:User', 'Update:User');
    $target = User::factory()->create();

    $this->actingAs($viewer);

    $superAdminRole = Role::findByName('super_admin', 'web');

    Livewire::test(EditUser::class, ['record' => $target->id])
        ->fillForm([
            'name' => $target->name,
            'last' => $target->last,
            'email' => $target->email,
            'role_id' => $superAdminRole->id,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($target->fresh()->hasRole('super_admin'))->toBeFalse();
});

test('a regular user creating a user cannot grant the super_admin role', function () {
    $viewer = User::factory()->create();
    $viewer->givePermissionTo('ViewAny:User', 'View:User', 'Create:User');

    $this->actingAs($viewer);

    $superAdminRole = Role::findByName('super_admin', 'web');

    Livewire::test(CreateUser::class)
        ->fillForm([
            'name' => 'Eve',
            'last' => 'Hacker',
            'email' => 'eve@test.com',
            'phone' => '5551112222',
            'password' => 'secretpass1',
            'password_confirmation' => 'secretpass1',
            'role_id' => $superAdminRole->id,
            'active' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $created = User::where('email', 'eve@test.com')->first();
    expect($created->hasRole('super_admin'))->toBeFalse();
});

test('admin can activate an inactive user', function () {
    $user = User::factory()->inactive()->create();

    Livewire::test(EditUser::class, ['record' => $user->id])
        ->callAction('toggle_active');

    expect($user->fresh()->active)->toBeTrue();
});

test('admin can deactivate an active user', function () {
    $user = User::factory()->create();

    Livewire::test(EditUser::class, ['record' => $user->id])
        ->callAction('toggle_active');

    expect($user->fresh()->active)->toBeFalse();
});

test('admin can delete a user', function () {
    $user = User::factory()->create();

    Livewire::test(EditUser::class, ['record' => $user->id])
        ->callAction(DeleteAction::class);

    assertDatabaseMissing(User::class, ['id' => $user->id]);
});

test('table search finds users by name', function () {
    $target = User::factory()->create(['name' => 'Búsqueda']);
    $other = User::factory()->create(['name' => 'Otro']);

    Livewire::test(ListUsers::class)
        ->searchTable('Búsqueda')
        ->assertCanSeeTableRecords(collect([$target]))
        ->assertCanNotSeeTableRecords(collect([$other]));
});
