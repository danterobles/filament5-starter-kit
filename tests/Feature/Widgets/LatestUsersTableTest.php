<?php

use App\Filament\Resources\Users\Widgets\LatestUsersTable;
use App\Models\User;
use Database\Seeders\ShieldSeeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

beforeEach(function () {
    $this->seed(ShieldSeeder::class);
    $admin = User::factory()->create();
    $admin->assignRole('super_admin');
    $this->actingAs($admin);
});

test('widget renders without errors', function () {
    User::factory()->count(3)->create();

    Livewire::test(LatestUsersTable::class)->assertSuccessful();
});

test('users are listed newest first', function () {
    $oldest = User::factory()->create(['created_at' => Carbon::now()->subDays(3)]);
    $middle = User::factory()->create(['created_at' => Carbon::now()->subDays(2)]);
    $newest = User::factory()->create(['created_at' => Carbon::now()->subDay()]);

    Livewire::test(LatestUsersTable::class)
        ->assertCanSeeTableRecords([$newest, $middle, $oldest], inOrder: true);
});

test('the first page shows the 10 most recently created users', function () {
    User::factory()->count(15)->create();

    $expectedLatestTen = User::query()->latest()->latest('id')->limit(10)->get();

    Livewire::test(LatestUsersTable::class)
        ->assertCanSeeTableRecords($expectedLatestTen, inOrder: true);
});

test('the widget never shows more than the 10 most recently created users', function () {
    // The widget's `->limit(10)` on its base query previously got silently
    // overridden by Filament's own pagination (`CanPaginateRecords::paginateTableQuery()`
    // called `$query->paginate()`, which re-applies its own take()/skip() and computes
    // the total from an unlimited count query), so users beyond the newest 10 remained
    // reachable via pagination despite the heading "Últimos Usuarios Registrados".
    // The widget now disables pagination (`->paginated(false)`) so the `->limit(10)`
    // on the query is the only, and final, cap.
    User::factory()->count(15)->create();

    $expectedLatestTen = User::query()->latest()->latest('id')->limit(10)->get();
    $usersBeyondTheLatestTen = User::query()->latest()->latest('id')->skip(10)->take(6)->get();

    Livewire::test(LatestUsersTable::class)
        ->assertCanSeeTableRecords($expectedLatestTen, inOrder: true)
        ->assertCanNotSeeTableRecords($usersBeyondTheLatestTen);
});

test('the roles relation is eager loaded and does not cause N+1 queries', function () {
    User::factory()->count(3)->create()->each(
        fn (User $user) => $user->assignRole('super_admin')
    );

    DB::enableQueryLog();
    Livewire::test(LatestUsersTable::class)->assertSuccessful();
    $queryCountForThreeUsers = count(DB::getQueryLog());
    DB::flushQueryLog();
    DB::disableQueryLog();

    User::factory()->count(6)->create()->each(
        fn (User $user) => $user->assignRole('super_admin')
    );

    DB::enableQueryLog();
    Livewire::test(LatestUsersTable::class)->assertSuccessful();
    $queryCountForNineUsers = count(DB::getQueryLog());
    DB::disableQueryLog();

    expect($queryCountForNineUsers)->toBe($queryCountForThreeUsers);
});

test('the full name column sorts by real database columns', function () {
    User::factory()->create(['name' => 'Carlos', 'last' => 'Zamora']);

    DB::enableQueryLog();

    Livewire::test(LatestUsersTable::class)
        ->sortTable('full_name')
        ->assertSuccessful();

    $sql = collect(DB::getQueryLog())->pluck('query')->implode(' ');

    expect($sql)->not->toContain('"full_name"')
        ->and($sql)->toContain('"name" asc');
});

test('clicking a sortable column reorders the latest users', function () {
    User::factory()->create(['name' => 'Ana', 'last' => 'Lopez', 'created_at' => Carbon::now()->subDays(3)]);
    User::factory()->create(['name' => 'Bruno', 'last' => 'Perez', 'created_at' => Carbon::now()->subDays(2)]);
    User::factory()->create(['name' => 'Carla', 'last' => 'Diaz', 'created_at' => Carbon::now()->subDay()]);

    Livewire::test(LatestUsersTable::class)
        ->sortTable('created_at', 'asc')
        ->assertSeeInOrder(['Ana', 'Bruno', 'Carla'])
        ->sortTable('full_name', 'desc')
        ->assertSeeInOrder(['Carla', 'Bruno', 'Ana']);
});

test('sorting only reorders the 10 most recent users and never pulls in older ones', function () {
    $oldest = User::factory()->create(['name' => 'Aaron', 'created_at' => Carbon::now()->subYear()]);
    User::factory()->count(10)->create(['name' => 'Zeta']);

    Livewire::test(LatestUsersTable::class)
        ->sortTable('full_name', 'asc')
        ->assertCanNotSeeTableRecords([$oldest]);
});

test('searching finds users outside the 10 most recent ones', function () {
    $old = User::factory()->create([
        'name' => 'Marisol',
        'last' => 'Quintero',
        'created_at' => Carbon::now()->subYear(),
    ]);
    User::factory()->count(12)->create();

    Livewire::test(LatestUsersTable::class)
        ->assertCanNotSeeTableRecords([$old])
        ->searchTable('Marisol')
        ->assertCanSeeTableRecords([$old]);
});
