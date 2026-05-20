# Graph Report - filament5-starter-kit  (2026-05-19)

## Corpus Check
- 107 files · ~34,056 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1175 nodes · 1371 edges · 111 communities (90 shown, 21 thin omitted)
- Extraction: 93% EXTRACTED · 7% INFERRED · 0% AMBIGUOUS · INFERRED: 102 edges (avg confidence: 0.83)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `88d9e7e8`
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
- [[_COMMUNITY_Community 106|Community 106]]

## God Nodes (most connected - your core abstractions)
1. `OpenpayService` - 22 edges
2. `User` - 20 edges
3. `UserResource` - 20 edges
4. `Quick Reference` - 20 edges
5. `Queue and Job Best Practices` - 20 edges
6. `OpenpayService` - 19 edges
7. `RolePolicy` - 19 edges
8. `ActivityPolicy` - 19 edges
9. `Filament 5 Starter Kit` - 18 edges
10. `Laravel 13 + Filament 5 — Starter Kit` - 16 edges

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

## Hyperedges (group relationships)
- **Authentication Feature Set (2FA, Passkeys, Breezy)** — readme_2fa, readme_passkeys, readme_filament_breezy, readme_model_user [EXTRACTED 0.95]
- **RBAC Enforcement (Shield, Policies, Seeder)** — readme_filament_shield, readme_role_policy, readme_activity_policy, readme_shield_seeder, readme_rbac [EXTRACTED 0.95]
- **AdminPanelProvider Plugin Registration** — readme_admin_panel_provider, readme_filament_shield, readme_filament_breezy, readme_apex_charts, readme_fullcalendar, readme_filament_logger [EXTRACTED 0.95]

## Communities (111 total, 21 thin omitted)

### Community 0 - "Blade & Config Rules"
Cohesion: 0.16
Nodes (14): App::environment() for Environment Checks, code:bash, code:bash (php artisan env:encrypt --env=production --readable), code:php (if (env('APP_ENV') === 'production') {), code:php (if (app()->isProduction()) {), code:php (// Incorrect), code:php (// Only when lang files already exist in the project), Configuration Best Practices (+6 more)

### Community 1 - "Events, Mail & Testing Rules"
Cohesion: 0.05
Nodes (45): afterCommit() on Notifications in Transactions, Always Queue Notifications, code:php (class OrderShipped implements ShouldDispatchAfterCommit {}), code:php (class InvoicePaid extends Notification implements ShouldQueu), code:php ($user->notify((new InvoicePaid($invoice))->afterCommit());), code:php (Notification::route('mail', 'admin@example.com')->notify(new), event:cache in Production Deploy, Event Discovery (+37 more)

### Community 2 - "Authorization Policies & Testing"
Cohesion: 0.09
Nodes (11): Test Coverage Plan (etapa 2), ActivityPolicy, RolePolicy, ActivityPolicy, ActivityPolicyTest, RBAC (Roles and Permissions), RolePolicy, ShieldSeeder (+3 more)

### Community 3 - "Project Guidelines & Improvement Notes"
Cohesion: 0.05
Nodes (47): CLAUDE.md (project instructions), SoftDeletes Bug (etapa 1), 2.1 — Tests de UserResource (CRUD), 2.2 — Tests de Políticas, 2.3 — Tests del Modelo User, 2.4 — Tests de Widgets, 3.1 — Reducir polling o agregar caché, 3.2 — Cachear navigation badge (+39 more)

### Community 4 - "Activity Log & RBAC Migrations"
Cohesion: 0.08
Nodes (18): Openpay Payment Gateway Integration, Spatie Activity Log, ServicesConfig, config, optimize-autoloader, preferred-install, sort-packages, CreateActivityLogTable (+10 more)

### Community 5 - "Architecture Best Practices"
Cohesion: 0.05
Nodes (36): 3.3 — Compatibilidad SQLite en UserGrowthChart, code:php (use Illuminate\Support\Facades\DB;), code:php (->selectRaw("strftime('%Y-%m', created_at) as month_key, COU), Architecture Best Practices, Atomic Locks for Race Conditions, Code to Interfaces, code:php (class CreateOrderAction), code:php (strlen('José');          // 5 (bytes, not characters)) (+28 more)

### Community 6 - "RBAC & Shield Permissions"
Cohesion: 0.08
Nodes (19): Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, super_admin Role, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig (+11 more)

### Community 7 - "Routing & Validation Rules"
Cohesion: 0.06
Nodes (35): code:php (public function show(int $id)), code:php (public function show(Post $post)), code:php (Route::get('/users/{user}/posts/{post}', function (User $use), code:php (Route::resource('posts', PostController::class);), code:php (public function store(Request $request)), code:php (public function store(StorePostRequest $request, CreatePostA), code:php (public function store(Request $request): RedirectResponse), code:php (public function store(StorePostRequest $request): RedirectRe) (+27 more)

### Community 8 - "README Documentation"
Cohesion: 0.06
Nodes (31): `Agenda`, Agenda / Calendario, Arquitectura, Autenticación, Autenticación, code:block1 (app/), code:bash (# Desarrollo (servidor + queue + vite en paralelo)), code:bash (# 1. Clonar) (+23 more)

### Community 9 - "Profile & Dev Guidelines"
Cohesion: 0.09
Nodes (23): APIs & Eloquent Resources, Artisan, Artisan, Common Mistakes, Correct Namespaces, Do Things the Laravel Way, Filament, graphify (+15 more)

### Community 10 - "Eloquent ORM Patterns"
Cohesion: 0.08
Nodes (28): Apply Global Scopes Sparingly, Attribute Casts Definition, Avoid Hardcoded Table Names in Queries, Avoid Hardcoded Table Names in Queries, Cast Date Columns Properly, code:php (public function comments(): HasMany), code:php (Post::where('user_id', $user->id)->get();), code:php (Post::whereBelongsTo($user)->get();) (+20 more)

### Community 11 - "Queue & Job Patterns"
Cohesion: 0.08
Nodes (31): Always Implement `failed()`, Batch Related Jobs, Bus::batch() for Related Jobs, code:php (class ProcessReport implements ShouldQueue), code:php (class UpdateSearchIndex implements ShouldQueue, ShouldBeUniq), code:php (// config/horizon.php), code:php (class ProcessReport implements ShouldQueue), code:php (class SyncWithStripe implements ShouldQueue) (+23 more)

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
Cohesion: 0.09
Nodes (5): Task Board Kanban, TaskFactory, UserFactory, Task, TaskBoard

### Community 16 - "Caching Strategies"
Cohesion: 0.10
Nodes (20): Cache::add() for Atomic Conditional Writes, Cache::flexible() Stale-While-Revalidate, Cache::memo() Per-Request Deduplication, Cache::remember() Pattern, Cache Tags for Group Invalidation, Caching Best Practices, code:php ($val = Cache::get('stats');), code:php ($val = Cache::remember('stats', 60, fn () => $this->computeS) (+12 more)

### Community 17 - "HTTP Client Patterns"
Cohesion: 0.09
Nodes (24): Always Set Explicit Timeouts, code:php ($response = Http::get('https://api.example.com/users');), code:php ($users = Http::get('https://api.example.com/users')->json();), code:php (use Illuminate\Http\Client\Pool;), code:php (it('syncs user from API', function () {), code:php (it('syncs user from API', function () {), code:php (Http::fake([), code:php ($response = Http::timeout(5)) (+16 more)

### Community 18 - "Payment Gateway (Openpay)"
Cohesion: 0.16
Nodes (13): Audit Dependencies, code:php (RateLimiter::for('login', function (Request $request) {), code:bash (composer audit), code:php (class Integration extends Model), code:php (class Integration extends Model), code:php (DB::select("SELECT * FROM users WHERE name = '{$request->nam), code:php (User::where('name', $request->name)->get();), Encrypt Sensitive Database Fields (+5 more)

### Community 19 - "Advanced Query Patterns"
Cohesion: 0.08
Nodes (24): addSelect() Subqueries for Has-Many Values, Advanced Query Patterns, code:php (public function scopeWithLastLoginAt($query): void), code:php (public function lastLogin(): BelongsTo), code:php ($statuses = Feature::toBase()), code:php ($feature->load('comments.user');), code:php ($query->whereHas('company', fn ($q) => $q->where('name', 'li), code:php ($query->whereIn('company_id', Company::where('name', 'like',) (+16 more)

### Community 20 - "Module Cluster 20"
Cohesion: 0.10
Nodes (19): Basic Usage, code:css (@theme {), code:diff (- @tailwind base;), code:html (<div class="flex gap-8">), code:html (<div class="bg-white dark:bg-gray-900 text-gray-900 dark:tex), code:html (<div class="flex items-center justify-between gap-4">), code:html (<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 g), Common Patterns (+11 more)

### Community 21 - "Module Cluster 21"
Cohesion: 0.13
Nodes (7): Agenda Full Calendar Widget, Agenda Timeline Views, AgendaFactory, Agenda, AgendaCalendarWidget, AgendaDoubleSidedTimelineWidget, AgendaTimelineWidget

### Community 22 - "Module Cluster 22"
Cohesion: 0.10
Nodes (19): Add Indexes in the Migration, code:php (// database/migrations/posts_migration.php  ← wrong naming, ), code:php (public function up(): void), code:php (// Migration 1: create_settings_table), code:bash (php artisan make:migration create_posts_table), code:php ($table->foreignId('user_id')->constrained()->cascadeOnDelete), code:php (// 2024_01_01_create_posts_table.php — already in production), code:php (// 2024_03_15_add_slug_to_posts_table.php) (+11 more)

### Community 23 - "Module Cluster 23"
Cohesion: 0.05
Nodes (52): Providers Bootstrap, FilaCheck Post-Edit Rule, Filament Development Guidelines, Laravel Boost Guidelines, Pint Formatter Rule, Test Enforcement Rules, Application Structure & Architecture, Conventions (+44 more)

### Community 24 - "Module Cluster 24"
Cohesion: 0.22
Nodes (11): Add Database Indexes, code:php (Schema::create('orders', function (Blueprint $table) {), code:php (Schema::create('orders', function (Blueprint $table) {), code:php (public function boot(): void), Database Indexes, Database Performance Best Practices, Eager Loading Relationships, N+1 Query Problem (+3 more)

### Community 25 - "Module Cluster 25"
Cohesion: 0.11
Nodes (19): code:php (// Incorrect), code:php (// Incorrect), code:php (// Incorrect), code:php (Number::format(1000000);          // "1,000,000"), code:php ($uri = Uri::of('https://example.com/search')), code:blade (let article = `{{ json_encode($article) }}`;), code:blade (<button class="js-fav-article" data-article='@json($article)), code:php (// Check if there are any joins) (+11 more)

### Community 26 - "Module Cluster 26"
Cohesion: 0.13
Nodes (15): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+7 more)

### Community 27 - "Module Cluster 27"
Cohesion: 0.15
Nodes (13): pestphp/pest-plugin, php-http/discovery, allow-plugins, require-dev, fakerphp/faker, laravel/boost, laravel/pail, laravel/pint (+5 more)

### Community 28 - "Module Cluster 28"
Cohesion: 0.14
Nodes (14): Vite Build Pipeline, devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite, vite, private (+6 more)

### Community 29 - "Module Cluster 29"
Cohesion: 0.13
Nodes (14): Choose `cursor()` vs. `lazy()` Correctly, code:php ($users->each(function (User $user) {), code:php (#[CollectedBy(UserCollection::class)]), #[CollectedBy] for Custom Collection Classes, Collection Best Practices, cursor() vs lazy() Choice, Higher-Order Messages for Collections, lazyById() for Safe Mutation During Iteration (+6 more)

### Community 30 - "Module Cluster 30"
Cohesion: 0.14
Nodes (14): Actions, Board Configuration, Card Schema, code:php (use Filament\Infolists\Components\TextEntry;), code:php (->cardsPerColumn(20)           // Cards loaded initially), code:php (->searchable(['title', 'description'])), code:php (use Filament\Tables\Filters\SelectFilter;), code:php (use Filament\Actions\Action;) (+6 more)

### Community 31 - "Module Cluster 31"
Cohesion: 0.13
Nodes (18): Add Context to Exception Classes, code:php (class InvalidOrderException extends Exception), code:php (->withExceptions(function (Exceptions $exceptions) {), code:php (class PodcastProcessingException extends Exception implement), code:php ($exceptions->shouldRenderJsonWhen(function (Request $request), code:php (class InvalidOrderException extends Exception), Add Context to Exception Classes, dontReportDuplicates() for Duplicate Exception Prevention (+10 more)

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
Cohesion: 0.05
Nodes (47): 1. Add Position Column to Model, 2. Create Board Page, 3. Configure the Board, Artisan Commands, code:php (use Illuminate\Database\Schema\Blueprint;), code:php (use Relaticle\Flowforge\Services\DecimalPosition;), code:php (// In your Livewire component), code:bash (php artisan flowforge:make-board TaskBoard) (+39 more)

### Community 40 - "Module Cluster 40"
Cohesion: 0.20
Nodes (10): $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade and Views Best Practices, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data, code:blade (<form method="POST" action="/posts">) (+2 more)

### Community 41 - "Module Cluster 41"
Cohesion: 0.25
Nodes (4): Widget Performance (polling/cache), UserStatsOverviewTest, LatestUsersTable, UserStatsOverview

### Community 42 - "Module Cluster 42"
Cohesion: 0.25
Nodes (8): Always Eager Load Relationships, code:php ($posts = Post::all();), code:php ($posts = Post::all();), code:php ($posts = Post::withCount('comments')->get();), code:php ($posts = Post::withCount([), code:php ($users = User::with(['posts' => function ($query) {), Database Performance Best Practices, Use `withCount()` for Counting Relations

### Community 44 - "Module Cluster 44"
Cohesion: 0.25
Nodes (8): autoload, autoload-dev, psr-4, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\, Tests\\

### Community 45 - "Module Cluster 45"
Cohesion: 0.32
Nodes (8): code:php ($key = env('API_KEY');), code:php (// config/services.php), env() Only in Config Files, `env()` Only in Config Files, code:php ($key = env('API_KEY');), code:php (// config/services.php), Keep Secrets Out of Code, Keep Secrets Out of Code

### Community 49 - "Module Cluster 49"
Cohesion: 0.60
Nodes (5): FlowForge Kanban (relaticle/flowforge), Tasks Kanban Board Feature, AddPositionToTasksTable Migration, CreateTasksTable Migration, FixTasksTableSchema Migration

### Community 50 - "Module Cluster 50"
Cohesion: 0.40
Nodes (4): permissions, allow, Claude Project Settings (hooks), Graphify PreToolUse Hook

### Community 52 - "Module Cluster 52"
Cohesion: 0.50
Nodes (5): code:blade (@foreach (User::all() as $user)), code:php (// Controller), code:blade (@foreach ($users as $user)), No Queries in Blade Templates, No Queries in Blade Templates

### Community 53 - "Module Cluster 53"
Cohesion: 0.40
Nodes (5): code:php ($posts = Post::with('author')->get();), code:php ($posts = Post::with('author')->get();), code:php ($posts = Post::select('id', 'title', 'user_id', 'created_at'), Select Only Needed Columns, Select Only Needed Columns

### Community 56 - "Module Cluster 56"
Cohesion: 0.67
Nodes (4): Filament Breezy (Auth/2FA/Passkeys), AlterBreezySessions Migration, CreateBreezySessions Migration, CreatePasskeysTable Migration

### Community 58 - "Module Cluster 58"
Cohesion: 0.50
Nodes (4): Chunk Large Datasets, code:php ($users = User::all();), code:php (User::where('subscribed', true)->chunk(200, function ($users), code:php (User::where('active', false)->chunkById(200, function ($user)

### Community 59 - "Module Cluster 59"
Cohesion: 0.50
Nodes (4): Authorize Every Action, code:php (public function update(UpdatePostRequest $request, Post $pos), code:php (public function update(UpdatePostRequest $request, Post $pos), code:php (public function authorize(): bool)

### Community 61 - "Module Cluster 61"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

### Community 70 - "Module Cluster 70"
Cohesion: 0.50
Nodes (4): code:blade ({!! $user->bio !!}), code:blade ({{ $user->bio }}), Escape Output to Prevent XSS, Escape Output to Prevent XSS

### Community 74 - "Module Cluster 74"
Cohesion: 0.67
Nodes (3): code:php ($users = User::where('active', true)->get();), code:php (foreach (User::where('active', true)->cursor() as $user) {), Use `cursor()` for Memory-Efficient Iteration

### Community 106 - "Community 106"
Cohesion: 0.67
Nodes (3): code:php (public function rules(): array), code:php ($path = $request->file('avatar')->store('avatars', 'public')), Validate File Uploads

## Knowledge Gaps
- **462 isolated node(s):** `command`, `args`, `agents`, `guidelines`, `mcp` (+457 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **21 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Plan de Mejoras Mayo 2026` connect `Project Guidelines & Improvement Notes` to `Module Cluster 41`, `Authorization Policies & Testing`?**
  _High betweenness centrality (0.256) - this node is a cross-community bridge._
- **Why does `Etapa 3 — Rendimiento de Widgets` connect `Project Guidelines & Improvement Notes` to `Architecture Best Practices`?**
  _High betweenness centrality (0.250) - this node is a cross-community bridge._
- **Are the 5 inferred relationships involving `User` (e.g. with `AdminPanelProvider` and `CustomPersonalInfo.php`) actually correct?**
  _`User` has 5 INFERRED edges - model-reasoned connections that need verification._
- **Are the 3 inferred relationships involving `Queue and Job Best Practices` (e.g. with `defer() for Post-Response Work` and `ShouldQueue on Mailable Class`) actually correct?**
  _`Queue and Job Best Practices` has 3 INFERRED edges - model-reasoned connections that need verification._
- **What connects `command`, `args`, `agents` to the rest of the system?**
  _470 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Events, Mail & Testing Rules` be split into smaller, more focused modules?**
  _Cohesion score 0.04521276595744681 - nodes in this community are weakly interconnected._
- **Should `Authorization Policies & Testing` be split into smaller, more focused modules?**
  _Cohesion score 0.09176788124156546 - nodes in this community are weakly interconnected._