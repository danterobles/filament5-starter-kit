# Graph Report - .  (2026-05-25)

## Corpus Check
- 19 files · ~40,675 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1168 nodes · 1272 edges · 113 communities (92 shown, 21 thin omitted)
- Extraction: 91% EXTRACTED · 9% INFERRED · 0% AMBIGUOUS · INFERRED: 118 edges (avg confidence: 0.84)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Laravel Best Practices (Blade)|Laravel Best Practices (Blade)]]
- [[_COMMUNITY_Events, Notifications & Mail|Events, Notifications & Mail]]
- [[_COMMUNITY_Plan Junio 2026|Plan Junio 2026]]
- [[_COMMUNITY_Project Docs (Mejoras Mayo)|Project Docs (Mejoras Mayo)]]
- [[_COMMUNITY_Policies & Auth Tests|Policies & Auth Tests]]
- [[_COMMUNITY_Activity Log & Migrations|Activity Log & Migrations]]
- [[_COMMUNITY_Architecture Rules|Architecture Rules]]
- [[_COMMUNITY_Shield & RBAC|Shield & RBAC]]
- [[_COMMUNITY_README & Docs|README & Docs]]
- [[_COMMUNITY_Routing & Validation|Routing & Validation]]
- [[_COMMUNITY_Livewire & Filament Config|Livewire & Filament Config]]
- [[_COMMUNITY_Eloquent Best Practices|Eloquent Best Practices]]
- [[_COMMUNITY_Queue & Jobs|Queue & Jobs]]
- [[_COMMUNITY_Starter Kit Setup Guide|Starter Kit Setup Guide]]
- [[_COMMUNITY_Laravel Best Practices Index|Laravel Best Practices Index]]
- [[_COMMUNITY_Pest Testing Skill|Pest Testing Skill]]
- [[_COMMUNITY_Task Resource (CRUD)|Task Resource (CRUD)]]
- [[_COMMUNITY_Agenda Resource (CRUD)|Agenda Resource (CRUD)]]
- [[_COMMUNITY_CLAUDE.md Conventions|CLAUDE.md Conventions]]
- [[_COMMUNITY_Task Model & Kanban|Task Model & Kanban]]
- [[_COMMUNITY_Caching Rules|Caching Rules]]
- [[_COMMUNITY_HTTP Client Rules|HTTP Client Rules]]
- [[_COMMUNITY_Openpay Payments|Openpay Payments]]
- [[_COMMUNITY_Advanced Queries|Advanced Queries]]
- [[_COMMUNITY_Tailwind CSS Skill|Tailwind CSS Skill]]
- [[_COMMUNITY_Migrations Rules|Migrations Rules]]
- [[_COMMUNITY_Agenda Widgets & Model|Agenda Widgets & Model]]
- [[_COMMUNITY_DB Performance|DB Performance]]
- [[_COMMUNITY_Code Style Rules|Code Style Rules]]
- [[_COMMUNITY_Composer Packages|Composer Packages]]
- [[_COMMUNITY_Collections|Collections]]
- [[_COMMUNITY_Frontend & Vite|Frontend & Vite]]
- [[_COMMUNITY_FlowForge Actions|FlowForge Actions]]
- [[_COMMUNITY_Error Handling|Error Handling]]
- [[_COMMUNITY_Project Dependencies|Project Dependencies]]
- [[_COMMUNITY_UserResource Schema|UserResource Schema]]
- [[_COMMUNITY_App Providers|App Providers]]
- [[_COMMUNITY_README Features|README Features]]
- [[_COMMUNITY_Agendas & Admin Panel|Agendas & Admin Panel]]
- [[_COMMUNITY_Blade Views Rules|Blade Views Rules]]
- [[_COMMUNITY_Task Scheduling|Task Scheduling]]
- [[_COMMUNITY_Composer Scripts|Composer Scripts]]
- [[_COMMUNITY_Laravel Boost MCP|Laravel Boost MCP]]
- [[_COMMUNITY_FlowForge Setup|FlowForge Setup]]
- [[_COMMUNITY_FlowForge Skill Index|FlowForge Skill Index]]
- [[_COMMUNITY_DB Eager Loading|DB Eager Loading]]
- [[_COMMUNITY_FlowForge Codeblocks|FlowForge Codeblocks]]
- [[_COMMUNITY_FlowForge Custom Cards|FlowForge Custom Cards]]
- [[_COMMUNITY_User Model|User Model]]
- [[_COMMUNITY_CreateUser Page|CreateUser Page]]
- [[_COMMUNITY_EditUser Page|EditUser Page]]
- [[_COMMUNITY_ListUsers Page|ListUsers Page]]
- [[_COMMUNITY_User Widgets|User Widgets]]
- [[_COMMUNITY_Task Migrations|Task Migrations]]
- [[_COMMUNITY_Claude Settings|Claude Settings]]
- [[_COMMUNITY_FlowForge Repair|FlowForge Repair]]
- [[_COMMUNITY_FlowForge Card Movement|FlowForge Card Movement]]
- [[_COMMUNITY_UserGrowthChart|UserGrowthChart]]
- [[_COMMUNITY_Filament Breezy Auth|Filament Breezy Auth]]
- [[_COMMUNITY_DB Chunking|DB Chunking]]
- [[_COMMUNITY_UsersTable|UsersTable]]
- [[_COMMUNITY_Users Cluster|Users Cluster]]
- [[_COMMUNITY_Breezy Profile Features|Breezy Profile Features]]
- [[_COMMUNITY_Claude Hooks Config|Claude Hooks Config]]
- [[_COMMUNITY_App Config Files|App Config Files]]
- [[_COMMUNITY_Advanced Subqueries|Advanced Subqueries]]
- [[_COMMUNITY_Base Controller|Base Controller]]
- [[_COMMUNITY_DB Index Rules|DB Index Rules]]
- [[_COMMUNITY_Web Routes & Example Test|Web Routes & Example Test]]
- [[_COMMUNITY_Cache Migration File|Cache Migration File]]
- [[_COMMUNITY_Jobs Migration File|Jobs Migration File]]
- [[_COMMUNITY_Bootstrap Application|Bootstrap Application]]
- [[_COMMUNITY_Unit Test Example|Unit Test Example]]
- [[_COMMUNITY_Console Routes File|Console Routes File]]
- [[_COMMUNITY_Admin Panel README|Admin Panel README]]
- [[_COMMUNITY_PHP Rules|PHP Rules]]
- [[_COMMUNITY_Laravel Conventions|Laravel Conventions]]
- [[_COMMUNITY_Search Docs Rule|Search Docs Rule]]

## God Nodes (most connected - your core abstractions)
1. `OpenpayService` - 22 edges
2. `User` - 20 edges
3. `Quick Reference` - 20 edges
4. `Queue and Job Best Practices` - 20 edges
5. `UserResource` - 19 edges
6. `RolePolicy` - 19 edges
7. `Filament 5 Starter Kit` - 18 edges
8. `ActivityPolicy` - 18 edges
9. `Architecture Best Practices` - 16 edges
10. `Advanced Query Patterns` - 16 edges

## Surprising Connections (you probably didn't know these)
- `AdminPanelProvider` --references--> `User`  [INFERRED]
  README.md → app/Models/User.php
- `UserGrowthChart` --conceptually_related_to--> `UserStatsOverviewTest`  [INFERRED]
  app/Filament/Resources/Users/Widgets/UserGrowthChart.php → README.md
- `UserStatsOverviewTest` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `RolePolicy` --references--> `User`  [EXTRACTED]
  README.md → app/Models/User.php
- `ActivityPolicy` --references--> `User`  [EXTRACTED]
  README.md → app/Models/User.php

## Communities (113 total, 21 thin omitted)

### Community 0 - "Laravel Best Practices (Blade)"
Cohesion: 0.04
Nodes (46): $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade and Views Best Practices, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data, App::environment() for Environment Checks (+38 more)

### Community 1 - "Events, Notifications & Mail"
Cohesion: 0.05
Nodes (42): afterCommit() on Notifications in Transactions, code:php (class OrderShipped implements ShouldDispatchAfterCommit {}), code:php (class InvoicePaid extends Notification implements ShouldQueu), code:php ($user->notify((new InvoicePaid($invoice))->afterCommit());), code:php (Notification::route('mail', 'admin@example.com')->notify(new), event:cache in Production Deploy, Event Discovery, Events & Notifications Best Practices (+34 more)

### Community 2 - "Plan Junio 2026"
Cohesion: 0.06
Nodes (44): AgendaResource CRUD Completo, API REST Versionada, Throttle en Rutas de Autenticación, CI/CD con GitHub Actions, Limpiar código comentado residual, Notificaciones de Base de Datos, Deuda Técnica Pendiente de Mayo, Cifrado de Campos Sensibles (+36 more)

### Community 3 - "Project Docs (Mejoras Mayo)"
Cohesion: 0.05
Nodes (43): CLAUDE.md (project instructions), SoftDeletes Bug (etapa 1), 2.1 — Tests de UserResource (CRUD), 2.2 — Tests de Políticas, 2.3 — Tests del Modelo User, 2.4 — Tests de Widgets, 3.1 — Reducir polling o agregar caché, 3.2 — Cachear navigation badge (+35 more)

### Community 4 - "Policies & Auth Tests"
Cohesion: 0.09
Nodes (9): Test Coverage Plan (etapa 2), RolePolicy, ActivityPolicy, RBAC (Roles and Permissions), RolePolicy, ShieldSeeder, UserResourceTest, Skill: pest-testing (+1 more)

### Community 5 - "Activity Log & Migrations"
Cohesion: 0.07
Nodes (23): Spatie Activity Log, pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages (+15 more)

### Community 6 - "Architecture Rules"
Cohesion: 0.06
Nodes (32): 3.3 — Compatibilidad SQLite en UserGrowthChart, code:php (->selectRaw("strftime('%Y-%m', created_at) as month_key, COU), Architecture Best Practices, Atomic Locks for Race Conditions, Code to Interfaces, code:php (class CreateOrderAction), code:php (strlen('José');          // 5 (bytes, not characters)), code:php (mb_strlen('José');             // 4 (characters)) (+24 more)

### Community 7 - "Shield & RBAC"
Cohesion: 0.06
Nodes (22): Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, super_admin Role, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig (+14 more)

### Community 8 - "README & Docs"
Cohesion: 0.07
Nodes (30): `Agenda`, Agenda / Calendario, Arquitectura, Autenticación, code:block1 (app/), code:bash (# Desarrollo (servidor + queue + vite en paralelo)), code:bash (# 1. Clonar), code:bash (# Suite completa) (+22 more)

### Community 9 - "Routing & Validation"
Cohesion: 0.07
Nodes (29): code:php (public function show(int $id)), code:php (public function show(Post $post)), code:php (Route::get('/users/{user}/posts/{post}', function (User $use), code:php (Route::resource('posts', PostController::class);), code:php (public function store(Request $request)), Keep Controllers Thin, Routing & Controllers Best Practices, Type-Hint Form Requests (+21 more)

### Community 10 - "Livewire & Filament Config"
Cohesion: 0.08
Nodes (22): APIs & Eloquent Resources, Artisan, Common Mistakes, Correct Namespaces, Deployment, Do Things the Laravel Way, Filament, graphify (+14 more)

### Community 11 - "Eloquent Best Practices"
Cohesion: 0.08
Nodes (26): Apply Global Scopes Sparingly, Attribute Casts Definition, Avoid Hardcoded Table Names in Queries, Cast Date Columns Properly, code:php (public function comments(): HasMany), code:php (Post::where('user_id', $user->id)->get();), code:php (Post::whereBelongsTo($user)->get();), code:php (DB::table('users')->where('active', true)->get();) (+18 more)

### Community 12 - "Queue & Jobs"
Cohesion: 0.08
Nodes (26): Batch Related Jobs, Bus::batch() for Related Jobs, code:php (class ProcessReport implements ShouldQueue), code:php (class UpdateSearchIndex implements ShouldQueue, ShouldBeUniq), code:php (// config/horizon.php), code:php (class SyncWithStripe implements ShouldQueue), code:php (class GenerateInvoice implements ShouldQueue, ShouldBeUnique), code:php (public function failed(?Throwable $exception): void) (+18 more)

### Community 13 - "Starter Kit Setup Guide"
Cohesion: 0.08
Nodes (25): 1. Nombre y branding, 2. Strings de navegación, 3. Color primario, 4. RBAC — Roles y permisos, 5. Activar / desactivar features, 6. Agregar un Resource, 7. Agregar un Cluster, 8. Openpay — pagos (+17 more)

### Community 14 - "Laravel Best Practices Index"
Cohesion: 0.08
Nodes (23): 10. Routing & Controllers → `rules/routing.md`, 11. HTTP Client → `rules/http-client.md`, 12. Events, Notifications & Mail → `rules/events-notifications.md`, `rules/mail.md`, 13. Error Handling → `rules/error-handling.md`, 14. Task Scheduling → `rules/scheduling.md`, 15. Architecture → `rules/architecture.md`, 16. Migrations → `rules/migrations.md`, 17. Collections → `rules/collections.md` (+15 more)

### Community 15 - "Pest Testing Skill"
Cohesion: 0.08
Nodes (23): Architecture Testing, Assertions, Basic Test Structure, Basic Usage, Browser Test Example, code:php (it('is true', function () {), code:php (it('returns all', function () {), code:php (it('has emails', function (string $email) {) (+15 more)

### Community 16 - "Task Resource (CRUD)"
Cohesion: 0.08
Nodes (6): CreateTask, EditTask, ListTasks, TaskForm, TasksTable, TaskResource

### Community 17 - "Agenda Resource (CRUD)"
Cohesion: 0.09
Nodes (6): AgendaResource, CreateAgenda, EditAgenda, ListAgendas, AgendaForm, AgendasTable

### Community 18 - "CLAUDE.md Conventions"
Cohesion: 0.11
Nodes (22): FilaCheck Post-Edit Rule, Filament Development Guidelines, Laravel Boost Guidelines, Pint Formatter Rule, Test Enforcement Rules, Application Structure & Architecture, Conventions, Documentation Files (+14 more)

### Community 19 - "Task Model & Kanban"
Cohesion: 0.10
Nodes (5): Task Board Kanban, TaskFactory, UserFactory, Task, TaskBoard

### Community 20 - "Caching Rules"
Cohesion: 0.10
Nodes (20): Cache::add() for Atomic Conditional Writes, Cache::flexible() Stale-While-Revalidate, Cache::memo() Per-Request Deduplication, Cache::remember() Pattern, Cache Tags for Group Invalidation, Caching Best Practices, code:php ($val = Cache::get('stats');), code:php ($val = Cache::remember('stats', 60, fn () => $this->computeS) (+12 more)

### Community 21 - "HTTP Client Rules"
Cohesion: 0.10
Nodes (20): Always Set Explicit Timeouts, code:php ($response = Http::get('https://api.example.com/users');), code:php ($users = Http::get('https://api.example.com/users')->json();), code:php (use Illuminate\Http\Client\Pool;), code:php (it('syncs user from API', function () {), code:php (Http::fake([), code:php ($response = Http::timeout(5)), code:php (Http::macro('github', function () {) (+12 more)

### Community 22 - "Openpay Payments"
Cohesion: 0.15
Nodes (4): Openpay Payment Gateway Integration, ServicesConfig, Openpay Payments Feature, OpenpayService

### Community 23 - "Advanced Queries"
Cohesion: 0.11
Nodes (19): addSelect() Subqueries for Has-Many Values, Advanced Query Patterns, code:php (public function scopeWithLastLoginAt($query): void), code:php (public function lastLogin(): BelongsTo), code:php ($statuses = Feature::toBase()), code:php ($feature->load('comments.user');), code:php (// Migration), code:php (public function scopeOrderByLastLogin($query): void) (+11 more)

### Community 24 - "Tailwind CSS Skill"
Cohesion: 0.10
Nodes (19): Basic Usage, code:css (@theme {), code:diff (- @tailwind base;), code:html (<div class="flex gap-8">), code:html (<div class="bg-white dark:bg-gray-900 text-gray-900 dark:tex), code:html (<div class="flex items-center justify-between gap-4">), code:html (<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 g), Common Patterns (+11 more)

### Community 25 - "Migrations Rules"
Cohesion: 0.11
Nodes (18): Add Indexes in the Migration, code:php (// database/migrations/posts_migration.php  ← wrong naming, ), code:php (public function up(): void), code:php (// Migration 1: create_settings_table), code:bash (php artisan make:migration create_posts_table), code:php ($table->foreignId('user_id')->constrained()->cascadeOnDelete), code:php (// 2024_01_01_create_posts_table.php — already in production), code:php (// 2024_03_15_add_slug_to_posts_table.php) (+10 more)

### Community 26 - "Agenda Widgets & Model"
Cohesion: 0.12
Nodes (4): Agenda Full Calendar Widget, Agenda Timeline Views, AgendaFactory, Agenda

### Community 27 - "DB Performance"
Cohesion: 0.14
Nodes (15): setRelation() to Prevent Circular N+1, Add Database Indexes, code:php (Schema::create('orders', function (Blueprint $table) {), code:php ($users = User::where('active', true)->get();), code:php (foreach (User::where('active', true)->cursor() as $user) {), code:blade (@foreach (User::all() as $user)), code:php (// Controller), code:php (public function boot(): void) (+7 more)

### Community 28 - "Code Style Rules"
Cohesion: 0.12
Nodes (15): code:php (// Incorrect), code:php (Number::format(1000000);          // "1,000,000"), code:php ($uri = Uri::of('https://example.com/search')), code:blade (let article = `{{ json_encode($article) }}`;), code:blade (<button class="js-fav-article" data-article='@json($article)), code:php (// Check if there are any joins), code:php (if ($this->hasJoins())), Conventions & Style (+7 more)

### Community 29 - "Composer Packages"
Cohesion: 0.13
Nodes (15): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+7 more)

### Community 30 - "Collections"
Cohesion: 0.13
Nodes (14): Choose `cursor()` vs. `lazy()` Correctly, code:php ($users->each(function (User $user) {), code:php (#[CollectedBy(UserCollection::class)]), #[CollectedBy] for Custom Collection Classes, Collection Best Practices, cursor() vs lazy() Choice, Higher-Order Messages for Collections, lazyById() for Safe Mutation During Iteration (+6 more)

### Community 31 - "Frontend & Vite"
Cohesion: 0.15
Nodes (13): Vite Build Pipeline, devDependencies, concurrently, laravel-vite-plugin, @tailwindcss/vite, vite, private, $schema (+5 more)

### Community 32 - "FlowForge Actions"
Cohesion: 0.14
Nodes (14): Actions, Board Configuration, Card Schema, code:php (use Filament\Infolists\Components\TextEntry;), code:php (->cardsPerColumn(20)           // Cards loaded initially), code:php (->searchable(['title', 'description'])), code:php (use Filament\Tables\Filters\SelectFilter;), code:php (use Filament\Actions\Action;) (+6 more)

### Community 33 - "Error Handling"
Cohesion: 0.15
Nodes (13): code:php (class InvalidOrderException extends Exception), code:php (->withExceptions(function (Exceptions $exceptions) {), code:php (class PodcastProcessingException extends Exception implement), code:php ($exceptions->shouldRenderJsonWhen(function (Request $request), Add Context to Exception Classes, dontReportDuplicates() for Duplicate Exception Prevention, Enable `dontReportDuplicates()`, Error Handling Best Practices (+5 more)

### Community 34 - "Project Dependencies"
Cohesion: 0.15
Nodes (12): Openpay Payment SDK, description, extra, laravel, keywords, dont-discover, license, minimum-stability (+4 more)

### Community 36 - "App Providers"
Cohesion: 0.17
Nodes (9): Providers Bootstrap, AdminPanelProvider, Agenda Widgets (Calendar, Timeline), Apex Charts Plugin, Auth UI Enhancer Plugin, Filament Logger Plugin, FullCalendar Plugin, Agenda Model (+1 more)

### Community 37 - "README Features"
Cohesion: 0.22
Nodes (11): Filament Shield (RBAC), FlowForge Kanban Plugin, Task Model, User Model, Navigation Strings (lang/es/navigation.php), TaskBoard Page (Kanban), UserForm Schema, Users Resource (CRUD) (+3 more)

### Community 38 - "Agendas & Admin Panel"
Cohesion: 0.20
Nodes (8): Agendas / Calendar Feature, Filament Admin Panel, Laravel Boost MCP Server, args, command, mcpServers, laravel-boost, CreateAgendasTable Migration

### Community 39 - "Blade Views Rules"
Cohesion: 0.20
Nodes (9): Blade & Views Best Practices, code:blade (<div {{ $attributes->merge(['class' => 'alert alert-'.$type]), code:php (return view('dashboard', compact('users'))), Prefer Blade Components Over `@include`, Use `$attributes->merge()` in Component Templates, Use `@aware` for Deeply Nested Component Props, Use Blade Fragments for Partial Re-Renders (htmx/Turbo), Use `@pushOnce` for Per-Component Scripts (+1 more)

### Community 40 - "Task Scheduling"
Cohesion: 0.20
Nodes (9): code:php (Schedule::command('billing:charge')->monthly()->environments), code:php (Schedule::daily()), Task Scheduling Best Practices, Use `environments()` to Restrict Tasks, Use `onOneServer()` on Multi-Server Deployments, Use `runInBackground()` for Concurrent Long Tasks, Use Schedule Groups for Shared Configuration, Use `takeUntilTimeout()` for Time-Bounded Processing (+1 more)

### Community 41 - "Composer Scripts"
Cohesion: 0.22
Nodes (9): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+1 more)

### Community 42 - "Laravel Boost MCP"
Cohesion: 0.22
Nodes (8): Laravel Boost (Dev Tooling), agents, guidelines, mcp, nightwatch_mcp, packages, sail, skills

### Community 43 - "FlowForge Setup"
Cohesion: 0.22
Nodes (9): 1. Add Position Column to Model, 2. Create Board Page, 3. Configure the Board, code:php (use Illuminate\Database\Schema\Blueprint;), code:bash (php artisan flowforge:make-board TaskBoard), code:php (use Relaticle\Flowforge\BoardPage;), Filament Standard Page, Generate Board (+1 more)

### Community 44 - "FlowForge Skill Index"
Cohesion: 0.22
Nodes (8): code:bash (php artisan vendor:publish --tag=flowforge-config), code:php (return [), code:php (use Illuminate\Database\Migrations\Migration;), Configuration, Flowforge Development, Migration Pattern, Requirements, When to Use This Skill

### Community 45 - "DB Eager Loading"
Cohesion: 0.22
Nodes (9): Always Eager Load Relationships, code:php ($posts = Post::all();), code:php ($posts = Post::withCount('comments')->get();), code:php ($posts = Post::withCount([), code:php ($posts = Post::with('author')->get();), code:php ($users = User::with(['posts' => function ($query) {), code:php ($posts = Post::select('id', 'title', 'user_id', 'created_at'), Select Only Needed Columns (+1 more)

### Community 46 - "FlowForge Codeblocks"
Cohesion: 0.29
Nodes (7): code:php (use Relaticle\Flowforge\BoardResourcePage;), code:php (public static function getPages(): array), code:php (use Livewire\Component;), code:blade (<div>), Filament Resource Page, Integration Patterns, Standalone Livewire Component

### Community 47 - "FlowForge Custom Cards"
Cohesion: 0.38
Nodes (7): code:php (public function board(Board $board): Board), code:php (->recordActions([), Common Patterns, Custom Card Click Behavior, Dynamic Columns from Database, Eager Loading for Cards, Scoped Boards (Multi-tenancy)

### Community 52 - "User Widgets"
Cohesion: 0.33
Nodes (3): Widget Performance (polling/cache), UserStatsOverviewTest, LatestUsersTable

### Community 53 - "Task Migrations"
Cohesion: 0.60
Nodes (5): FlowForge Kanban (relaticle/flowforge), Tasks Kanban Board Feature, AddPositionToTasksTable Migration, CreateTasksTable Migration, FixTasksTableSchema Migration

### Community 54 - "Claude Settings"
Cohesion: 0.40
Nodes (4): permissions, allow, Claude Project Settings (hooks), Graphify PreToolUse Hook

### Community 55 - "FlowForge Repair"
Cohesion: 0.60
Nodes (5): Artisan Commands, code:bash (php artisan flowforge:diagnose-positions "App\Models\Task" s), Diagnose Position Issues, Interactive Repair, Rebalance Positions

### Community 56 - "FlowForge Card Movement"
Cohesion: 0.40
Nodes (5): code:php (use Relaticle\Flowforge\Services\DecimalPosition;), code:php (// In your Livewire component), DecimalPosition Service, Manual Card Movement, Position Management

### Community 59 - "Filament Breezy Auth"
Cohesion: 0.67
Nodes (4): Filament Breezy (Auth/2FA/Passkeys), AlterBreezySessions Migration, CreateBreezySessions Migration, CreatePasskeysTable Migration

### Community 60 - "DB Chunking"
Cohesion: 0.50
Nodes (4): Chunk Large Datasets, code:php ($users = User::all();), code:php (User::where('subscribed', true)->chunk(200, function ($users), code:php (User::where('active', false)->chunkById(200, function ($user)

### Community 63 - "Breezy Profile Features"
Cohesion: 0.67
Nodes (4): Two-Factor Authentication (2FA TOTP), CustomPersonalInfo Livewire Component, Filament Breezy (Auth), Passkeys (WebAuthn)

### Community 65 - "App Config Files"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

### Community 74 - "Advanced Subqueries"
Cohesion: 0.67
Nodes (3): code:php ($query->whereHas('company', fn ($q) => $q->where('name', 'li), code:php ($query->whereIn('company_id', Company::where('name', 'like',), Prefer `whereIn` + Subquery Over `whereHas`

## Knowledge Gaps
- **456 isolated node(s):** `command`, `args`, `agents`, `guidelines`, `mcp` (+451 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **21 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Plan de Mejoras Mayo 2026` connect `Project Docs (Mejoras Mayo)` to `Policies & Auth Tests`, `User Widgets`?**
  _High betweenness centrality (0.238) - this node is a cross-community bridge._
- **Why does `Etapa 3 — Rendimiento de Widgets` connect `Project Docs (Mejoras Mayo)` to `Architecture Rules`?**
  _High betweenness centrality (0.221) - this node is a cross-community bridge._
- **Are the 5 inferred relationships involving `User` (e.g. with `AdminPanelProvider` and `CustomPersonalInfo.php`) actually correct?**
  _`User` has 5 INFERRED edges - model-reasoned connections that need verification._
- **Are the 3 inferred relationships involving `Queue and Job Best Practices` (e.g. with `defer() for Post-Response Work` and `ShouldQueue on Mailable Class`) actually correct?**
  _`Queue and Job Best Practices` has 3 INFERRED edges - model-reasoned connections that need verification._
- **What connects `command`, `args`, `agents` to the rest of the system?**
  _467 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Laravel Best Practices (Blade)` be split into smaller, more focused modules?**
  _Cohesion score 0.044326241134751775 - nodes in this community are weakly interconnected._
- **Should `Events, Notifications & Mail` be split into smaller, more focused modules?**
  _Cohesion score 0.047474747474747475 - nodes in this community are weakly interconnected._