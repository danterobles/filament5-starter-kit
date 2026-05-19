# Graph Report - .  (2026-05-19)

## Corpus Check
- 11 files · ~34,056 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1074 nodes · 1154 edges · 106 communities (84 shown, 22 thin omitted)
- Extraction: 91% EXTRACTED · 9% INFERRED · 0% AMBIGUOUS · INFERRED: 102 edges (avg confidence: 0.83)
- Token cost: 0 input · 0 output

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
- [[_COMMUNITY_Module Cluster 70|Module Cluster 70]]
- [[_COMMUNITY_Module Cluster 71|Module Cluster 71]]
- [[_COMMUNITY_Module Cluster 73|Module Cluster 73]]
- [[_COMMUNITY_Module Cluster 74|Module Cluster 74]]
- [[_COMMUNITY_Module Cluster 97|Module Cluster 97]]
- [[_COMMUNITY_Module Cluster 98|Module Cluster 98]]
- [[_COMMUNITY_Module Cluster 99|Module Cluster 99]]
- [[_COMMUNITY_Module Cluster 100|Module Cluster 100]]
- [[_COMMUNITY_Module Cluster 101|Module Cluster 101]]
- [[_COMMUNITY_Module Cluster 102|Module Cluster 102]]
- [[_COMMUNITY_Module Cluster 103|Module Cluster 103]]
- [[_COMMUNITY_Module Cluster 104|Module Cluster 104]]
- [[_COMMUNITY_Module Cluster 105|Module Cluster 105]]

## God Nodes (most connected - your core abstractions)
1. `OpenpayService` - 22 edges
2. `User` - 20 edges
3. `Quick Reference` - 20 edges
4. `Queue and Job Best Practices` - 20 edges
5. `UserResource` - 19 edges
6. `RolePolicy` - 19 edges
7. `ActivityPolicy` - 19 edges
8. `Filament 5 Starter Kit` - 18 edges
9. `Architecture Best Practices` - 16 edges
10. `Advanced Query Patterns` - 16 edges

## Surprising Connections (you probably didn't know these)
- `AdminPanelProvider` --references--> `User`  [INFERRED]
  README.md → app/Models/User.php
- `UserGrowthChart` --conceptually_related_to--> `UserStatsOverviewTest`  [INFERRED]
  app/Filament/Resources/Users/Widgets/UserGrowthChart.php → README.md
- `LatestUsersTable` --conceptually_related_to--> `UserStatsOverviewTest`  [INFERRED]
  app/Filament/Resources/Users/Widgets/LatestUsersTable.php → README.md
- `Providers Bootstrap` --references--> `AdminPanelProvider`  [EXTRACTED]
  bootstrap/providers.php → README.md
- `RolePolicy` --references--> `User`  [EXTRACTED]
  README.md → app/Models/User.php

## Hyperedges (group relationships)
- **Authentication Feature Set (2FA, Passkeys, Breezy)** — readme_2fa, readme_passkeys, readme_filament_breezy, readme_model_user [EXTRACTED 0.95]
- **RBAC Enforcement (Shield, Policies, Seeder)** — readme_filament_shield, readme_role_policy, readme_activity_policy, readme_shield_seeder, readme_rbac [EXTRACTED 0.95]
- **AdminPanelProvider Plugin Registration** — readme_admin_panel_provider, readme_filament_shield, readme_filament_breezy, readme_apex_charts, readme_fullcalendar, readme_filament_logger [EXTRACTED 0.95]

## Communities (106 total, 22 thin omitted)

### Community 0 - "Blade & Config Rules"
Cohesion: 0.04
Nodes (46): $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade and Views Best Practices, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data, App::environment() for Environment Checks (+38 more)

### Community 1 - "Events, Mail & Testing Rules"
Cohesion: 0.05
Nodes (42): afterCommit() on Notifications in Transactions, code:php (class OrderShipped implements ShouldDispatchAfterCommit {}), code:php (class InvoicePaid extends Notification implements ShouldQueu), code:php ($user->notify((new InvoicePaid($invoice))->afterCommit());), code:php (Notification::route('mail', 'admin@example.com')->notify(new), event:cache in Production Deploy, Event Discovery, Events & Notifications Best Practices (+34 more)

### Community 2 - "Authorization Policies & Testing"
Cohesion: 0.06
Nodes (17): Test Coverage Plan (etapa 2), Widget Performance (polling/cache), ActivityPolicy, ActivityPolicyTest, Navigation Strings (lang/es/navigation.php), RBAC (Roles and Permissions), RolePolicy, ShieldSeeder (+9 more)

### Community 3 - "Project Guidelines & Improvement Notes"
Cohesion: 0.05
Nodes (43): CLAUDE.md (project instructions), SoftDeletes Bug (etapa 1), 2.1 — Tests de UserResource (CRUD), 2.2 — Tests de Políticas, 2.3 — Tests del Modelo User, 2.4 — Tests de Widgets, 3.1 — Reducir polling o agregar caché, 3.2 — Cachear navigation badge (+35 more)

### Community 4 - "Activity Log & RBAC Migrations"
Cohesion: 0.07
Nodes (23): Spatie Activity Log, pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages (+15 more)

### Community 5 - "Architecture Best Practices"
Cohesion: 0.06
Nodes (32): 3.3 — Compatibilidad SQLite en UserGrowthChart, code:php (->selectRaw("strftime('%Y-%m', created_at) as month_key, COU), Architecture Best Practices, Atomic Locks for Race Conditions, Code to Interfaces, code:php (class CreateOrderAction), code:php (strlen('José');          // 5 (bytes, not characters)), code:php (mb_strlen('José');             // 4 (characters)) (+24 more)

### Community 6 - "RBAC & Shield Permissions"
Cohesion: 0.06
Nodes (22): Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, super_admin Role, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig (+14 more)

### Community 7 - "Routing & Validation Rules"
Cohesion: 0.07
Nodes (29): code:php (public function show(int $id)), code:php (public function show(Post $post)), code:php (Route::get('/users/{user}/posts/{post}', function (User $use), code:php (Route::resource('posts', PostController::class);), code:php (public function store(Request $request)), Keep Controllers Thin, Routing & Controllers Best Practices, Type-Hint Form Requests (+21 more)

### Community 8 - "README Documentation"
Cohesion: 0.07
Nodes (30): `Agenda`, Agenda / Calendario, Arquitectura, Autenticación, code:block1 (app/), code:bash (# Desarrollo (servidor + queue + vite en paralelo)), code:bash (# 1. Clonar), code:bash (# Suite completa) (+22 more)

### Community 9 - "Profile & Dev Guidelines"
Cohesion: 0.08
Nodes (22): APIs & Eloquent Resources, Artisan, Common Mistakes, Correct Namespaces, Deployment, Do Things the Laravel Way, Filament, graphify (+14 more)

### Community 10 - "Eloquent ORM Patterns"
Cohesion: 0.08
Nodes (26): Apply Global Scopes Sparingly, Attribute Casts Definition, Avoid Hardcoded Table Names in Queries, Cast Date Columns Properly, code:php (public function comments(): HasMany), code:php (Post::where('user_id', $user->id)->get();), code:php (Post::whereBelongsTo($user)->get();), code:php (DB::table('users')->where('active', true)->get();) (+18 more)

### Community 11 - "Queue & Job Patterns"
Cohesion: 0.08
Nodes (26): Batch Related Jobs, Bus::batch() for Related Jobs, code:php (class ProcessReport implements ShouldQueue), code:php (class UpdateSearchIndex implements ShouldQueue, ShouldBeUniq), code:php (// config/horizon.php), code:php (class SyncWithStripe implements ShouldQueue), code:php (class GenerateInvoice implements ShouldQueue, ShouldBeUnique), code:php (public function failed(?Throwable $exception): void) (+18 more)

### Community 12 - "Starter Kit Customization Guide"
Cohesion: 0.08
Nodes (25): 1. Nombre y branding, 2. Strings de navegación, 3. Color primario, 4. RBAC — Roles y permisos, 5. Activar / desactivar features, 6. Agregar un Resource, 7. Agregar un Cluster, 8. Openpay — pagos (+17 more)

### Community 13 - "Laravel Best Practices Skill"
Cohesion: 0.08
Nodes (23): 10. Routing & Controllers → `rules/routing.md`, 11. HTTP Client → `rules/http-client.md`, 12. Events, Notifications & Mail → `rules/events-notifications.md`, `rules/mail.md`, 13. Error Handling → `rules/error-handling.md`, 14. Task Scheduling → `rules/scheduling.md`, 15. Architecture → `rules/architecture.md`, 16. Migrations → `rules/migrations.md`, 17. Collections → `rules/collections.md` (+15 more)

### Community 14 - "Pest Testing Skill"
Cohesion: 0.08
Nodes (23): Architecture Testing, Assertions, Basic Test Structure, Basic Usage, Browser Test Example, code:php (it('is true', function () {), code:php (it('returns all', function () {), code:php (it('has emails', function (string $email) {) (+15 more)

### Community 15 - "Task Management & Kanban Board"
Cohesion: 0.10
Nodes (5): Task Board Kanban, TaskFactory, UserFactory, Task, TaskBoard

### Community 16 - "Caching Strategies"
Cohesion: 0.10
Nodes (20): Cache::add() for Atomic Conditional Writes, Cache::flexible() Stale-While-Revalidate, Cache::memo() Per-Request Deduplication, Cache::remember() Pattern, Cache Tags for Group Invalidation, Caching Best Practices, code:php ($val = Cache::get('stats');), code:php ($val = Cache::remember('stats', 60, fn () => $this->computeS) (+12 more)

### Community 17 - "HTTP Client Patterns"
Cohesion: 0.10
Nodes (20): Always Set Explicit Timeouts, code:php ($response = Http::get('https://api.example.com/users');), code:php ($users = Http::get('https://api.example.com/users')->json();), code:php (use Illuminate\Http\Client\Pool;), code:php (it('syncs user from API', function () {), code:php (Http::fake([), code:php ($response = Http::timeout(5)), code:php (Http::macro('github', function () {) (+12 more)

### Community 18 - "Payment Gateway (Openpay)"
Cohesion: 0.15
Nodes (4): Openpay Payment Gateway Integration, ServicesConfig, Openpay Payments Feature, OpenpayService

### Community 19 - "Advanced Query Patterns"
Cohesion: 0.11
Nodes (19): addSelect() Subqueries for Has-Many Values, Advanced Query Patterns, code:php (public function scopeWithLastLoginAt($query): void), code:php (public function lastLogin(): BelongsTo), code:php ($statuses = Feature::toBase()), code:php ($feature->load('comments.user');), code:php (// Migration), code:php (public function scopeOrderByLastLogin($query): void) (+11 more)

### Community 20 - "Module Cluster 20"
Cohesion: 0.10
Nodes (19): Basic Usage, code:css (@theme {), code:diff (- @tailwind base;), code:html (<div class="flex gap-8">), code:html (<div class="bg-white dark:bg-gray-900 text-gray-900 dark:tex), code:html (<div class="flex items-center justify-between gap-4">), code:html (<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 g), Common Patterns (+11 more)

### Community 21 - "Module Cluster 21"
Cohesion: 0.12
Nodes (4): Agenda Full Calendar Widget, Agenda Timeline Views, AgendaFactory, Agenda

### Community 22 - "Module Cluster 22"
Cohesion: 0.11
Nodes (18): Add Indexes in the Migration, code:php (// database/migrations/posts_migration.php  ← wrong naming, ), code:php (public function up(): void), code:php (// Migration 1: create_settings_table), code:bash (php artisan make:migration create_posts_table), code:php ($table->foreignId('user_id')->constrained()->cascadeOnDelete), code:php (// 2024_01_01_create_posts_table.php — already in production), code:php (// 2024_03_15_add_slug_to_posts_table.php) (+10 more)

### Community 23 - "Module Cluster 23"
Cohesion: 0.17
Nodes (15): FilaCheck Post-Edit Rule, AdminPanelProvider, Agenda Widgets (Calendar, Timeline), Apex Charts Plugin, Auth UI Enhancer Plugin, FilaCheck Lint Plugin, Filament 5 Starter Kit, Filament Logger Plugin (+7 more)

### Community 24 - "Module Cluster 24"
Cohesion: 0.14
Nodes (15): setRelation() to Prevent Circular N+1, Add Database Indexes, code:php (Schema::create('orders', function (Blueprint $table) {), code:php ($users = User::where('active', true)->get();), code:php (foreach (User::where('active', true)->cursor() as $user) {), code:blade (@foreach (User::all() as $user)), code:php (// Controller), code:php (public function boot(): void) (+7 more)

### Community 25 - "Module Cluster 25"
Cohesion: 0.12
Nodes (15): code:php (// Incorrect), code:php (Number::format(1000000);          // "1,000,000"), code:php ($uri = Uri::of('https://example.com/search')), code:blade (let article = `{{ json_encode($article) }}`;), code:blade (<button class="js-fav-article" data-article='@json($article)), code:php (// Check if there are any joins), code:php (if ($this->hasJoins())), Conventions & Style (+7 more)

### Community 26 - "Module Cluster 26"
Cohesion: 0.13
Nodes (15): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+7 more)

### Community 27 - "Module Cluster 27"
Cohesion: 0.13
Nodes (15): Filament Development Guidelines, Laravel Boost Guidelines, Pint Formatter Rule, Test Enforcement Rules, Application Structure & Architecture, Conventions, Documentation Files, Foundational Context (+7 more)

### Community 28 - "Module Cluster 28"
Cohesion: 0.15
Nodes (13): Vite Build Pipeline, devDependencies, concurrently, laravel-vite-plugin, @tailwindcss/vite, vite, private, $schema (+5 more)

### Community 29 - "Module Cluster 29"
Cohesion: 0.13
Nodes (14): Choose `cursor()` vs. `lazy()` Correctly, code:php ($users->each(function (User $user) {), code:php (#[CollectedBy(UserCollection::class)]), #[CollectedBy] for Custom Collection Classes, Collection Best Practices, cursor() vs lazy() Choice, Higher-Order Messages for Collections, lazyById() for Safe Mutation During Iteration (+6 more)

### Community 30 - "Module Cluster 30"
Cohesion: 0.14
Nodes (14): Actions, Board Configuration, Card Schema, code:php (use Filament\Infolists\Components\TextEntry;), code:php (->cardsPerColumn(20)           // Cards loaded initially), code:php (->searchable(['title', 'description'])), code:php (use Filament\Tables\Filters\SelectFilter;), code:php (use Filament\Actions\Action;) (+6 more)

### Community 31 - "Module Cluster 31"
Cohesion: 0.15
Nodes (13): code:php (class InvalidOrderException extends Exception), code:php (->withExceptions(function (Exceptions $exceptions) {), code:php (class PodcastProcessingException extends Exception implement), code:php ($exceptions->shouldRenderJsonWhen(function (Request $request), Add Context to Exception Classes, dontReportDuplicates() for Duplicate Exception Prevention, Enable `dontReportDuplicates()`, Error Handling Best Practices (+5 more)

### Community 32 - "Module Cluster 32"
Cohesion: 0.15
Nodes (12): Openpay Payment SDK, description, extra, laravel, keywords, dont-discover, license, minimum-stability (+4 more)

### Community 34 - "Module Cluster 34"
Cohesion: 0.20
Nodes (8): Agendas / Calendar Feature, Filament Admin Panel, Laravel Boost MCP Server, args, command, mcpServers, laravel-boost, CreateAgendasTable Migration

### Community 35 - "Module Cluster 35"
Cohesion: 0.20
Nodes (9): Blade & Views Best Practices, code:blade (<div {{ $attributes->merge(['class' => 'alert alert-'.$type]), code:php (return view('dashboard', compact('users'))), Prefer Blade Components Over `@include`, Use `$attributes->merge()` in Component Templates, Use `@aware` for Deeply Nested Component Props, Use Blade Fragments for Partial Re-Renders (htmx/Turbo), Use `@pushOnce` for Per-Component Scripts (+1 more)

### Community 36 - "Module Cluster 36"
Cohesion: 0.20
Nodes (9): code:php (Schedule::command('billing:charge')->monthly()->environments), code:php (Schedule::daily()), Task Scheduling Best Practices, Use `environments()` to Restrict Tasks, Use `onOneServer()` on Multi-Server Deployments, Use `runInBackground()` for Concurrent Long Tasks, Use Schedule Groups for Shared Configuration, Use `takeUntilTimeout()` for Time-Bounded Processing (+1 more)

### Community 37 - "Module Cluster 37"
Cohesion: 0.22
Nodes (9): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+1 more)

### Community 38 - "Module Cluster 38"
Cohesion: 0.22
Nodes (8): Laravel Boost (Dev Tooling), agents, guidelines, mcp, nightwatch_mcp, packages, sail, skills

### Community 39 - "Module Cluster 39"
Cohesion: 0.22
Nodes (9): 1. Add Position Column to Model, 2. Create Board Page, 3. Configure the Board, code:php (use Illuminate\Database\Schema\Blueprint;), code:bash (php artisan flowforge:make-board TaskBoard), code:php (use Relaticle\Flowforge\BoardPage;), Filament Standard Page, Generate Board (+1 more)

### Community 40 - "Module Cluster 40"
Cohesion: 0.22
Nodes (8): code:bash (php artisan vendor:publish --tag=flowforge-config), code:php (return [), code:php (use Illuminate\Database\Migrations\Migration;), Configuration, Flowforge Development, Migration Pattern, Requirements, When to Use This Skill

### Community 41 - "Module Cluster 41"
Cohesion: 0.25
Nodes (9): Two-Factor Authentication (2FA TOTP), CustomPersonalInfo Livewire Component, Filament Breezy (Auth), Filament Shield (RBAC), FlowForge Kanban Plugin, Task Model, User Model, Passkeys (WebAuthn) (+1 more)

### Community 42 - "Module Cluster 42"
Cohesion: 0.22
Nodes (9): Always Eager Load Relationships, code:php ($posts = Post::all();), code:php ($posts = Post::withCount('comments')->get();), code:php ($posts = Post::withCount([), code:php ($posts = Post::with('author')->get();), code:php ($users = User::with(['posts' => function ($query) {), code:php ($posts = Post::select('id', 'title', 'user_id', 'created_at'), Select Only Needed Columns (+1 more)

### Community 44 - "Module Cluster 44"
Cohesion: 0.29
Nodes (7): code:php (use Relaticle\Flowforge\BoardResourcePage;), code:php (public static function getPages(): array), code:php (use Livewire\Component;), code:blade (<div>), Filament Resource Page, Integration Patterns, Standalone Livewire Component

### Community 45 - "Module Cluster 45"
Cohesion: 0.38
Nodes (7): code:php (public function board(Board $board): Board), code:php (->recordActions([), Common Patterns, Custom Card Click Behavior, Dynamic Columns from Database, Eager Loading for Cards, Scoped Boards (Multi-tenancy)

### Community 49 - "Module Cluster 49"
Cohesion: 0.60
Nodes (5): FlowForge Kanban (relaticle/flowforge), Tasks Kanban Board Feature, AddPositionToTasksTable Migration, CreateTasksTable Migration, FixTasksTableSchema Migration

### Community 50 - "Module Cluster 50"
Cohesion: 0.40
Nodes (4): permissions, allow, Claude Project Settings (hooks), Graphify PreToolUse Hook

### Community 52 - "Module Cluster 52"
Cohesion: 0.60
Nodes (5): Artisan Commands, code:bash (php artisan flowforge:diagnose-positions "App\Models\Task" s), Diagnose Position Issues, Interactive Repair, Rebalance Positions

### Community 53 - "Module Cluster 53"
Cohesion: 0.40
Nodes (5): code:php (use Relaticle\Flowforge\Services\DecimalPosition;), code:php (// In your Livewire component), DecimalPosition Service, Manual Card Movement, Position Management

### Community 56 - "Module Cluster 56"
Cohesion: 0.67
Nodes (4): Filament Breezy (Auth/2FA/Passkeys), AlterBreezySessions Migration, CreateBreezySessions Migration, CreatePasskeysTable Migration

### Community 58 - "Module Cluster 58"
Cohesion: 0.50
Nodes (4): Chunk Large Datasets, code:php ($users = User::all();), code:php (User::where('subscribed', true)->chunk(200, function ($users), code:php (User::where('active', false)->chunkById(200, function ($user)

### Community 61 - "Module Cluster 61"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

### Community 70 - "Module Cluster 70"
Cohesion: 0.67
Nodes (3): code:php ($query->whereHas('company', fn ($q) => $q->where('name', 'li), code:php ($query->whereIn('company_id', Company::where('name', 'like',), Prefer `whereIn` + Subquery Over `whereHas`

## Knowledge Gaps
- **447 isolated node(s):** `command`, `args`, `agents`, `guidelines`, `mcp` (+442 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **22 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Plan de Mejoras Mayo 2026` connect `Project Guidelines & Improvement Notes` to `Authorization Policies & Testing`?**
  _High betweenness centrality (0.278) - this node is a cross-community bridge._
- **Why does `Etapa 3 — Rendimiento de Widgets` connect `Project Guidelines & Improvement Notes` to `Architecture Best Practices`?**
  _High betweenness centrality (0.261) - this node is a cross-community bridge._
- **Are the 5 inferred relationships involving `User` (e.g. with `AdminPanelProvider` and `CustomPersonalInfo.php`) actually correct?**
  _`User` has 5 INFERRED edges - model-reasoned connections that need verification._
- **Are the 3 inferred relationships involving `Queue and Job Best Practices` (e.g. with `defer() for Post-Response Work` and `ShouldQueue on Mailable Class`) actually correct?**
  _`Queue and Job Best Practices` has 3 INFERRED edges - model-reasoned connections that need verification._
- **What connects `command`, `args`, `agents` to the rest of the system?**
  _455 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Blade & Config Rules` be split into smaller, more focused modules?**
  _Cohesion score 0.044326241134751775 - nodes in this community are weakly interconnected._
- **Should `Events, Mail & Testing Rules` be split into smaller, more focused modules?**
  _Cohesion score 0.047474747474747475 - nodes in this community are weakly interconnected._