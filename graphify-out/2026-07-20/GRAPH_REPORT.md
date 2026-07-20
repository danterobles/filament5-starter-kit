# Graph Report - filament5-starter-kit  (2026-07-20)

## Corpus Check
- 122 files · ~36,074 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1273 nodes · 1641 edges · 114 communities (95 shown, 19 thin omitted)
- Extraction: 93% EXTRACTED · 7% INFERRED · 0% AMBIGUOUS · INFERRED: 107 edges (avg confidence: 0.84)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `ebad3fa4`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- [[_COMMUNITY_Blade & Config Rules|Blade & Config Rules]]
- [[_COMMUNITY_Events, Mail & Testing Rules|Events, Mail & Testing Rules]]
- [[_COMMUNITY_Authorization Policies & Testing|Authorization Policies & Testing]]
- [[_COMMUNITY_Project Guidelines & Improvement Notes|Project Guidelines & Improvement Notes]]
- [[_COMMUNITY_Activity Log & RBAC Migrations|Activity Log & RBAC Migrations]]
- [[_COMMUNITY_Architecture Best Practices|Architecture Best Practices]]
- [[_COMMUNITY_RBAC & Shield Permissions|RBAC & Shield Permissions]]
- [[_COMMUNITY_Routing & Validation Rules|Routing & Validation Rules]]
- [[_COMMUNITY_README Documentation|README Documentation]]
- [[_COMMUNITY_Profile & Dev Guidelines|Profile & Dev Guidelines]]
- [[_COMMUNITY_Eloquent ORM Patterns|Eloquent ORM Patterns]]
- [[_COMMUNITY_Queue & Job Patterns|Queue & Job Patterns]]
- [[_COMMUNITY_Starter Kit Customization Guide|Starter Kit Customization Guide]]
- [[_COMMUNITY_Laravel Best Practices Skill|Laravel Best Practices Skill]]
- [[_COMMUNITY_Pest Testing Skill|Pest Testing Skill]]
- [[_COMMUNITY_Task Management & Kanban Board|Task Management & Kanban Board]]
- [[_COMMUNITY_Caching Strategies|Caching Strategies]]
- [[_COMMUNITY_HTTP Client Patterns|HTTP Client Patterns]]
- [[_COMMUNITY_Payment Gateway (Openpay)|Payment Gateway (Openpay)]]
- [[_COMMUNITY_Advanced Query Patterns|Advanced Query Patterns]]
- [[_COMMUNITY_Module Cluster 20|Module Cluster 20]]
- [[_COMMUNITY_Module Cluster 21|Module Cluster 21]]
- [[_COMMUNITY_Module Cluster 22|Module Cluster 22]]
- [[_COMMUNITY_Module Cluster 23|Module Cluster 23]]
- [[_COMMUNITY_Module Cluster 24|Module Cluster 24]]
- [[_COMMUNITY_Module Cluster 25|Module Cluster 25]]
- [[_COMMUNITY_Module Cluster 26|Module Cluster 26]]
- [[_COMMUNITY_Module Cluster 27|Module Cluster 27]]
- [[_COMMUNITY_Module Cluster 28|Module Cluster 28]]
- [[_COMMUNITY_Module Cluster 29|Module Cluster 29]]
- [[_COMMUNITY_Module Cluster 30|Module Cluster 30]]
- [[_COMMUNITY_Module Cluster 31|Module Cluster 31]]
- [[_COMMUNITY_Module Cluster 32|Module Cluster 32]]
- [[_COMMUNITY_Module Cluster 33|Module Cluster 33]]
- [[_COMMUNITY_Module Cluster 34|Module Cluster 34]]
- [[_COMMUNITY_Module Cluster 35|Module Cluster 35]]
- [[_COMMUNITY_Module Cluster 36|Module Cluster 36]]
- [[_COMMUNITY_Module Cluster 37|Module Cluster 37]]
- [[_COMMUNITY_Module Cluster 38|Module Cluster 38]]
- [[_COMMUNITY_Module Cluster 39|Module Cluster 39]]
- [[_COMMUNITY_Module Cluster 40|Module Cluster 40]]
- [[_COMMUNITY_Module Cluster 41|Module Cluster 41]]
- [[_COMMUNITY_Module Cluster 42|Module Cluster 42]]
- [[_COMMUNITY_Module Cluster 43|Module Cluster 43]]
- [[_COMMUNITY_Module Cluster 44|Module Cluster 44]]
- [[_COMMUNITY_Module Cluster 45|Module Cluster 45]]
- [[_COMMUNITY_Module Cluster 46|Module Cluster 46]]
- [[_COMMUNITY_Module Cluster 47|Module Cluster 47]]
- [[_COMMUNITY_Module Cluster 48|Module Cluster 48]]
- [[_COMMUNITY_Module Cluster 49|Module Cluster 49]]
- [[_COMMUNITY_Module Cluster 50|Module Cluster 50]]
- [[_COMMUNITY_Module Cluster 51|Module Cluster 51]]
- [[_COMMUNITY_Module Cluster 52|Module Cluster 52]]
- [[_COMMUNITY_Module Cluster 53|Module Cluster 53]]
- [[_COMMUNITY_Module Cluster 54|Module Cluster 54]]
- [[_COMMUNITY_Module Cluster 55|Module Cluster 55]]
- [[_COMMUNITY_Module Cluster 56|Module Cluster 56]]
- [[_COMMUNITY_Module Cluster 57|Module Cluster 57]]
- [[_COMMUNITY_Module Cluster 58|Module Cluster 58]]
- [[_COMMUNITY_Module Cluster 59|Module Cluster 59]]
- [[_COMMUNITY_Module Cluster 60|Module Cluster 60]]
- [[_COMMUNITY_Module Cluster 61|Module Cluster 61]]
- [[_COMMUNITY_Module Cluster 62|Module Cluster 62]]
- [[_COMMUNITY_Module Cluster 63|Module Cluster 63]]
- [[_COMMUNITY_Module Cluster 64|Module Cluster 64]]
- [[_COMMUNITY_Module Cluster 65|Module Cluster 65]]
- [[_COMMUNITY_Module Cluster 70|Module Cluster 70]]
- [[_COMMUNITY_Module Cluster 71|Module Cluster 71]]
- [[_COMMUNITY_Module Cluster 74|Module Cluster 74]]
- [[_COMMUNITY_Module Cluster 75|Module Cluster 75]]
- [[_COMMUNITY_Module Cluster 78|Module Cluster 78]]
- [[_COMMUNITY_Module Cluster 102|Module Cluster 102]]
- [[_COMMUNITY_Module Cluster 103|Module Cluster 103]]
- [[_COMMUNITY_Module Cluster 104|Module Cluster 104]]
- [[_COMMUNITY_Module Cluster 105|Module Cluster 105]]
- [[_COMMUNITY_Community 106|Community 106]]
- [[_COMMUNITY_Community 107|Community 107]]
- [[_COMMUNITY_Community 108|Community 108]]
- [[_COMMUNITY_Community 109|Community 109]]
- [[_COMMUNITY_Community 110|Community 110]]

## God Nodes (most connected - your core abstractions)
1. `User` - 27 edges
2. `UserResource` - 22 edges
3. `OpenpayService` - 22 edges
4. `Quick Reference` - 20 edges
5. `Queue and Job Best Practices` - 20 edges
6. `OpenpayService` - 19 edges
7. `RolePolicy` - 19 edges
8. `Filament 5 Starter Kit` - 18 edges
9. `ActivityPolicy` - 18 edges
10. `Advanced Query Patterns` - 16 edges

## Surprising Connections (you probably didn't know these)
- `LatestUsersTable` --conceptually_related_to--> `UserStatsOverviewTest`  [INFERRED]
  app/Filament/Resources/Users/Widgets/LatestUsersTable.php → README.md
- `UserGrowthChart` --conceptually_related_to--> `UserStatsOverviewTest`  [INFERRED]
  app/Filament/Resources/Users/Widgets/UserGrowthChart.php → README.md
- `AdminPanelProvider` --references--> `User`  [INFERRED]
  README.md → app/Models/User.php
- `ListUsers` --references--> `UserStatsOverviewTest`  [EXTRACTED]
  app/Filament/Resources/Users/Pages/ListUsers.php → README.md
- `UserResource` --references--> `UserStatsOverviewTest`  [EXTRACTED]
  app/Filament/Resources/Users/UserResource.php → README.md

## Import Cycles
- None detected.

## Communities (114 total, 19 thin omitted)

### Community 0 - "Blade & Config Rules"
Cohesion: 0.04
Nodes (47): $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade and Views Best Practices, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data, App::environment() for Environment Checks (+39 more)

### Community 1 - "Events, Mail & Testing Rules"
Cohesion: 0.05
Nodes (43): afterCommit() on Notifications in Transactions, Always Queue Notifications, code:php (class OrderShipped implements ShouldDispatchAfterCommit {}), code:php (class InvoicePaid extends Notification implements ShouldQueu), code:php ($user->notify((new InvoicePaid($invoice))->afterCommit());), code:php (Notification::route('mail', 'admin@example.com')->notify(new), event:cache in Production Deploy, Event Discovery (+35 more)

### Community 2 - "Authorization Policies & Testing"
Cohesion: 0.06
Nodes (44): AgendaResource CRUD Completo, API REST Versionada, Throttle en Rutas de Autenticación, CI/CD con GitHub Actions, Limpiar código comentado residual, Notificaciones de Base de Datos, Deuda Técnica Pendiente de Mayo, Cifrado de Campos Sensibles (+36 more)

### Community 3 - "Project Guidelines & Improvement Notes"
Cohesion: 0.05
Nodes (47): CLAUDE.md (project instructions), SoftDeletes Bug (etapa 1), code:php (// UserStatsOverview.php y UserGrowthChart.php), code:block10 (APP_NAME="Mi Aplicación"), code:block12 (Semana 1:), code:php (protected function getStats(): array), code:php (// UserResource.php), code:php (// app/Models/User.php) (+39 more)

### Community 4 - "Activity Log & RBAC Migrations"
Cohesion: 0.09
Nodes (19): Activity, AuthUser, BaseTestCase, Test Coverage Plan (etapa 2), Widget Performance (polling/cache), HandlesAuthorization, ActivityPolicy, RolePolicy (+11 more)

### Community 5 - "Architecture Best Practices"
Cohesion: 0.26
Nodes (6): Spatie Activity Log, CreateActivityLogTable, AddBatchUuidColumnToActivityLogTable, AddBatchUuidColumnToActivityLogTable Migration, AddEventColumnToActivityLogTable Migration, CreateActivityLogTable Migration

### Community 6 - "RBAC & Shield Permissions"
Cohesion: 0.06
Nodes (32): code:php (->selectRaw("strftime('%Y-%m', created_at) as month_key, COU), 3.3 — Compatibilidad SQLite en UserGrowthChart, Architecture Best Practices, Atomic Locks for Race Conditions, Code to Interfaces, code:php (class CreateOrderAction), code:php (strlen('José');          // 5 (bytes, not characters)), code:php (mb_strlen('José');             // 4 (characters)) (+24 more)

### Community 7 - "Routing & Validation Rules"
Cohesion: 0.08
Nodes (19): Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, super_admin Role, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig (+11 more)

### Community 8 - "README Documentation"
Cohesion: 0.06
Nodes (32): Autenticación, code:block1 (app/), code:bash (# Desarrollo (servidor + queue + vite en paralelo)), code:bash (# 1. Clonar), code:bash (# Suite completa), code:bash (# Optimizar para producción), code:dotenv (APP_ENV=production), `Agenda` (+24 more)

### Community 9 - "Profile & Dev Guidelines"
Cohesion: 0.07
Nodes (30): code:php (public function show(int $id)), code:php (public function show(Post $post)), code:php (Route::get('/users/{user}/posts/{post}', function (User $use), code:php (Route::resource('posts', PostController::class);), code:php (public function store(Request $request)), Keep Controllers Thin, Routing & Controllers Best Practices, Type-Hint Form Requests (+22 more)

### Community 10 - "Eloquent ORM Patterns"
Cohesion: 0.51
Nodes (3): CustomPersonalInfo, PersonalInfo, TextInput

### Community 11 - "Queue & Job Patterns"
Cohesion: 0.08
Nodes (26): Apply Global Scopes Sparingly, Attribute Casts Definition, Avoid Hardcoded Table Names in Queries, Cast Date Columns Properly, code:php (public function comments(): HasMany), code:php (Post::where('user_id', $user->id)->get();), code:php (Post::whereBelongsTo($user)->get();), code:php (DB::table('users')->where('active', true)->get();) (+18 more)

### Community 12 - "Starter Kit Customization Guide"
Cohesion: 0.09
Nodes (28): Always Implement `failed()`, Batch Related Jobs, Bus::batch() for Related Jobs, code:php (class ProcessReport implements ShouldQueue), code:php (class UpdateSearchIndex implements ShouldQueue, ShouldBeUniq), code:php (// config/horizon.php), code:php (class SyncWithStripe implements ShouldQueue), code:php (class GenerateInvoice implements ShouldQueue, ShouldBeUnique) (+20 more)

### Community 13 - "Laravel Best Practices Skill"
Cohesion: 0.08
Nodes (25): code:php (// app/Filament/Pages/MiPagina.php), code:php (->plugins([), code:bash (# Crea el Resource con CRUD completo a partir del modelo), code:php (// En el Resource generado:), code:php (public static function getNavigationGroup(): ?string), code:bash (php artisan make:filament-cluster NombreCluster --no-interac), code:php (class NombreCluster extends Cluster), code:php (protected static ?string $cluster = \App\Filament\Clusters\N) (+17 more)

### Community 14 - "Pest Testing Skill"
Cohesion: 0.08
Nodes (23): 10. Routing & Controllers → `rules/routing.md`, 11. HTTP Client → `rules/http-client.md`, 12. Events, Notifications & Mail → `rules/events-notifications.md`, `rules/mail.md`, 13. Error Handling → `rules/error-handling.md`, 14. Task Scheduling → `rules/scheduling.md`, 15. Architecture → `rules/architecture.md`, 16. Migrations → `rules/migrations.md`, 17. Collections → `rules/collections.md` (+15 more)

### Community 15 - "Task Management & Kanban Board"
Cohesion: 0.08
Nodes (23): Architecture Testing, Assertions, Basic Test Structure, Basic Usage, Browser Test Example, code:php (it('is true', function () {), code:php (it('returns all', function () {), code:php (it('has emails', function (string $email) {) (+15 more)

### Community 18 - "Payment Gateway (Openpay)"
Cohesion: 0.13
Nodes (15): Application Structure & Architecture, Conventions, Documentation Files, Foundational Context, Frontend Bundling, Laravel Boost Guidelines, Filament Development Guidelines, Pint Formatter Rule (+7 more)

### Community 19 - "Advanced Query Patterns"
Cohesion: 0.06
Nodes (25): Attribute, Authenticatable, BelongsTo, Agenda Full Calendar Widget, AgendaFactory, TaskFactory, UserFactory, Factory (+17 more)

### Community 20 - "Module Cluster 20"
Cohesion: 0.10
Nodes (20): Cache::add() for Atomic Conditional Writes, Cache::flexible() Stale-While-Revalidate, Cache::memo() Per-Request Deduplication, Cache::remember() Pattern, Cache Tags for Group Invalidation, Caching Best Practices, code:php ($val = Cache::get('stats');), code:php ($val = Cache::remember('stats', 60, fn () => $this->computeS) (+12 more)

### Community 21 - "Module Cluster 21"
Cohesion: 0.10
Nodes (20): Always Set Explicit Timeouts, code:php ($response = Http::get('https://api.example.com/users');), code:php ($users = Http::get('https://api.example.com/users')->json();), code:php (use Illuminate\Http\Client\Pool;), code:php (it('syncs user from API', function () {), code:php (Http::fake([), code:php ($response = Http::timeout(5)), code:php (Http::macro('github', function () {) (+12 more)

### Community 22 - "Module Cluster 22"
Cohesion: 0.18
Nodes (6): Openpay Payment Gateway Integration, ServicesConfig, Openpay Payments Feature, OpenpayService, OpenpayService, Throwable

### Community 23 - "Module Cluster 23"
Cohesion: 0.11
Nodes (19): addSelect() Subqueries for Has-Many Values, Advanced Query Patterns, code:php (public function scopeWithLastLoginAt($query): void), code:php (public function lastLogin(): BelongsTo), code:php ($statuses = Feature::toBase()), code:php ($feature->load('comments.user');), code:php (// Migration), code:php (public function scopeOrderByLastLogin($query): void) (+11 more)

### Community 24 - "Module Cluster 24"
Cohesion: 0.10
Nodes (19): Basic Usage, code:css (@theme {), code:diff (- @tailwind base;), code:html (<div class="flex gap-8">), code:html (<div class="bg-white dark:bg-gray-900 text-gray-900 dark:tex), code:html (<div class="flex items-center justify-between gap-4">), code:html (<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 g), Common Patterns (+11 more)

### Community 25 - "Module Cluster 25"
Cohesion: 0.11
Nodes (18): Add Indexes in the Migration, code:php (// database/migrations/posts_migration.php  ← wrong naming, ), code:php (public function up(): void), code:php (// Migration 1: create_settings_table), code:bash (php artisan make:migration create_posts_table), code:php ($table->foreignId('user_id')->constrained()->cascadeOnDelete), code:php (// 2024_01_01_create_posts_table.php — already in production), code:php (// 2024_03_15_add_slug_to_posts_table.php) (+10 more)

### Community 26 - "Module Cluster 26"
Cohesion: 0.08
Nodes (27): APIs & Eloquent Resources, Artisan, Artisan, Common Mistakes, Correct Namespaces, Deployment, Do Things the Laravel Way, Filament (+19 more)

### Community 27 - "Module Cluster 27"
Cohesion: 0.12
Nodes (17): Compound Indexes Matching orderBy Column Order, setRelation() to Prevent Circular N+1, Add Database Indexes, code:php (Schema::create('orders', function (Blueprint $table) {), code:php ($users = User::where('active', true)->get();), code:php (foreach (User::where('active', true)->cursor() as $user) {), code:blade (@foreach (User::all() as $user)), code:php (// Controller) (+9 more)

### Community 28 - "Module Cluster 28"
Cohesion: 0.12
Nodes (15): code:php (// Incorrect), code:php (Number::format(1000000);          // "1,000,000"), code:php ($uri = Uri::of('https://example.com/search')), code:blade (let article = `{{ json_encode($article) }}`;), code:blade (<button class="js-fav-article" data-article='@json($article)), code:php (// Check if there are any joins), code:php (if ($this->hasJoins())), Conventions & Style (+7 more)

### Community 29 - "Module Cluster 29"
Cohesion: 0.13
Nodes (15): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+7 more)

### Community 30 - "Module Cluster 30"
Cohesion: 0.13
Nodes (14): Choose `cursor()` vs. `lazy()` Correctly, code:php ($users->each(function (User $user) {), code:php (#[CollectedBy(UserCollection::class)]), #[CollectedBy] for Custom Collection Classes, Collection Best Practices, cursor() vs lazy() Choice, Higher-Order Messages for Collections, lazyById() for Safe Mutation During Iteration (+6 more)

### Community 31 - "Module Cluster 31"
Cohesion: 0.14
Nodes (14): Vite Build Pipeline, devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite, vite, private (+6 more)

### Community 32 - "Module Cluster 32"
Cohesion: 0.14
Nodes (14): Actions, Board Configuration, Card Schema, code:php (use Filament\Infolists\Components\TextEntry;), code:php (->cardsPerColumn(20)           // Cards loaded initially), code:php (->searchable(['title', 'description'])), code:php (use Filament\Tables\Filters\SelectFilter;), code:php (use Filament\Actions\Action;) (+6 more)

### Community 33 - "Module Cluster 33"
Cohesion: 0.15
Nodes (13): Add Context to Exception Classes, code:php (class InvalidOrderException extends Exception), code:php (->withExceptions(function (Exceptions $exceptions) {), code:php (class PodcastProcessingException extends Exception implement), code:php ($exceptions->shouldRenderJsonWhen(function (Request $request), dontReportDuplicates() for Duplicate Exception Prevention, Enable `dontReportDuplicates()`, Error Handling Best Practices (+5 more)

### Community 34 - "Module Cluster 34"
Cohesion: 0.15
Nodes (12): description, extra, laravel, keywords, dont-discover, license, minimum-stability, name (+4 more)

### Community 35 - "Module Cluster 35"
Cohesion: 0.06
Nodes (21): AgendaResource, BackedEnum, Board, BoardPage, Builder, Cluster, Agenda Timeline Views, Task Board Kanban (+13 more)

### Community 36 - "Module Cluster 36"
Cohesion: 0.17
Nodes (16): Providers Bootstrap, FilaCheck Post-Edit Rule, AdminPanelProvider, Agenda Widgets (Calendar, Timeline), Apex Charts Plugin, Auth UI Enhancer Plugin, FilaCheck Lint Plugin, Filament 5 Starter Kit (+8 more)

### Community 37 - "Module Cluster 37"
Cohesion: 0.22
Nodes (11): Filament Shield (RBAC), FlowForge Kanban Plugin, Task Model, User Model, Navigation Strings (lang/es/navigation.php), TaskBoard Page (Kanban), UserForm Schema, Users Resource (CRUD) (+3 more)

### Community 38 - "Module Cluster 38"
Cohesion: 0.29
Nodes (6): Laravel Boost MCP Server, args, command, mcpServers, php, laravel-boost

### Community 39 - "Module Cluster 39"
Cohesion: 0.20
Nodes (9): Blade & Views Best Practices, code:blade (<div {{ $attributes->merge(['class' => 'alert alert-'.$type]), code:php (return view('dashboard', compact('users'))), Prefer Blade Components Over `@include`, Use `$attributes->merge()` in Component Templates, Use `@aware` for Deeply Nested Component Props, Use Blade Fragments for Partial Re-Renders (htmx/Turbo), Use `@pushOnce` for Per-Component Scripts (+1 more)

### Community 40 - "Module Cluster 40"
Cohesion: 0.20
Nodes (9): code:php (Schedule::command('billing:charge')->monthly()->environments), code:php (Schedule::daily()), Task Scheduling Best Practices, Use `environments()` to Restrict Tasks, Use `onOneServer()` on Multi-Server Deployments, Use `runInBackground()` for Concurrent Long Tasks, Use Schedule Groups for Shared Configuration, Use `takeUntilTimeout()` for Time-Bounded Processing (+1 more)

### Community 41 - "Module Cluster 41"
Cohesion: 0.23
Nodes (4): Schema, AgendaForm, TaskForm, UserForm

### Community 42 - "Module Cluster 42"
Cohesion: 0.22
Nodes (8): Laravel Boost (Dev Tooling), agents, guidelines, mcp, nightwatch_mcp, packages, sail, skills

### Community 43 - "Module Cluster 43"
Cohesion: 0.22
Nodes (9): 1. Add Position Column to Model, 2. Create Board Page, 3. Configure the Board, code:php (use Illuminate\Database\Schema\Blueprint;), code:bash (php artisan flowforge:make-board TaskBoard), code:php (use Relaticle\Flowforge\BoardPage;), Filament Standard Page, Generate Board (+1 more)

### Community 44 - "Module Cluster 44"
Cohesion: 0.20
Nodes (8): code:bash (php artisan vendor:publish --tag=flowforge-config), code:php (return [), code:php (use Illuminate\Database\Migrations\Migration;), Configuration, Flowforge Development, Migration Pattern, Requirements, When to Use This Skill

### Community 45 - "Module Cluster 45"
Cohesion: 0.22
Nodes (9): Always Eager Load Relationships, code:php ($posts = Post::all();), code:php ($posts = Post::withCount('comments')->get();), code:php ($posts = Post::withCount([), code:php ($posts = Post::with('author')->get();), code:php ($users = User::with(['posts' => function ($query) {), code:php ($posts = Post::select('id', 'title', 'user_id', 'created_at'), Select Only Needed Columns (+1 more)

### Community 46 - "Module Cluster 46"
Cohesion: 0.29
Nodes (7): code:php (use Relaticle\Flowforge\BoardResourcePage;), code:php (public static function getPages(): array), code:php (use Livewire\Component;), code:blade (<div>), Filament Resource Page, Integration Patterns, Standalone Livewire Component

### Community 47 - "Module Cluster 47"
Cohesion: 0.38
Nodes (7): code:php (public function board(Board $board): Board), code:php (->recordActions([), Common Patterns, Custom Card Click Behavior, Dynamic Columns from Database, Eager Loading for Cards, Scoped Boards (Multi-tenancy)

### Community 48 - "Module Cluster 48"
Cohesion: 0.20
Nodes (10): require-dev, fakerphp/faker, laravel/boost, laravel/pail, laravel/pint, laraveldaily/filacheck, mockery/mockery, nunomaduro/collision (+2 more)

### Community 50 - "Module Cluster 50"
Cohesion: 0.20
Nodes (4): EditRecord, Notification, EditAgenda, EditUser

### Community 51 - "Module Cluster 51"
Cohesion: 0.24
Nodes (4): ExposesTableToWidgets, ListRecords, ListTasks, ListUsers

### Community 52 - "Module Cluster 52"
Cohesion: 0.28
Nodes (9): autoload, autoload-dev, psr-4, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\, Tests\\ (+1 more)

### Community 53 - "Module Cluster 53"
Cohesion: 0.32
Nodes (8): Agendas / Calendar Feature, Filament Admin Panel, FlowForge Kanban (relaticle/flowforge), Tasks Kanban Board Feature, AddPositionToTasksTable Migration, CreateAgendasTable Migration, CreateTasksTable Migration, FixTasksTableSchema Migration

### Community 54 - "Module Cluster 54"
Cohesion: 0.40
Nodes (4): permissions, allow, Claude Project Settings (hooks), Graphify PreToolUse Hook

### Community 55 - "Module Cluster 55"
Cohesion: 0.60
Nodes (5): Artisan Commands, code:bash (php artisan flowforge:diagnose-positions "App\Models\Task" s), Diagnose Position Issues, Interactive Repair, Rebalance Positions

### Community 56 - "Module Cluster 56"
Cohesion: 0.40
Nodes (5): code:php (use Relaticle\Flowforge\Services\DecimalPosition;), code:php (// In your Livewire component), DecimalPosition Service, Manual Card Movement, Position Management

### Community 59 - "Module Cluster 59"
Cohesion: 0.67
Nodes (4): Filament Breezy (Auth/2FA/Passkeys), AlterBreezySessions Migration, CreateBreezySessions Migration, CreatePasskeysTable Migration

### Community 60 - "Module Cluster 60"
Cohesion: 0.50
Nodes (4): Chunk Large Datasets, code:php ($users = User::all();), code:php (User::where('subscribed', true)->chunk(200, function ($users), code:php (User::where('active', false)->chunkById(200, function ($user)

### Community 61 - "Module Cluster 61"
Cohesion: 0.22
Nodes (9): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+1 more)

### Community 62 - "Module Cluster 62"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 63 - "Module Cluster 63"
Cohesion: 0.67
Nodes (4): Two-Factor Authentication (2FA TOTP), CustomPersonalInfo Livewire Component, Filament Breezy (Auth), Passkeys (WebAuthn)

### Community 65 - "Module Cluster 65"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

### Community 74 - "Module Cluster 74"
Cohesion: 0.67
Nodes (3): code:php ($query->whereHas('company', fn ($q) => $q->where('name', 'li), code:php ($query->whereIn('company_id', Company::where('name', 'like',), Prefer `whereIn` + Subquery Over `whereHas`

## Knowledge Gaps
- **469 isolated node(s):** `php`, `Controller`, `$schema`, `name`, `type` (+464 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **19 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Plan de Mejoras Mayo 2026` connect `Project Guidelines & Improvement Notes` to `Activity Log & RBAC Migrations`?**
  _High betweenness centrality (0.286) - this node is a cross-community bridge._
- **Why does `Etapa 3 — Rendimiento de Widgets` connect `Project Guidelines & Improvement Notes` to `RBAC & Shield Permissions`?**
  _High betweenness centrality (0.262) - this node is a cross-community bridge._
- **Are the 5 inferred relationships involving `User` (e.g. with `CustomPersonalInfo.php` and `CreateUser`) actually correct?**
  _`User` has 5 INFERRED edges - model-reasoned connections that need verification._
- **What connects `php`, `Controller`, `$schema` to the rest of the system?**
  _480 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Blade & Config Rules` be split into smaller, more focused modules?**
  _Cohesion score 0.04336734693877551 - nodes in this community are weakly interconnected._
- **Should `Events, Mail & Testing Rules` be split into smaller, more focused modules?**
  _Cohesion score 0.0463768115942029 - nodes in this community are weakly interconnected._
- **Should `Authorization Policies & Testing` be split into smaller, more focused modules?**
  _Cohesion score 0.06448202959830866 - nodes in this community are weakly interconnected._