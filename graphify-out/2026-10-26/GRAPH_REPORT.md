# Graph Report - filament5-starter-kit  (2026-10-26)

## Corpus Check
- 157 files · ~51,063 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1357 nodes · 1843 edges · 134 communities (107 shown, 27 thin omitted)
- Extraction: 98% EXTRACTED · 2% INFERRED · 0% AMBIGUOUS · INFERRED: 37 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `c1a46659`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Blade and Views Best Practices
- Illuminate\Database\Migrations\Migration
- Illuminate\Database\Eloquent\Casts\Attribute
- Laravel Boost Guidelines
- Patterns
- Spatie Activity Log
- Agenda
- DatabaseConfig
- Laravel 13 + Filament 5 — Starter Kit
- Validation & Forms Best Practices
- ShieldSeeder
- UserResource.php
- Queue and Job Best Practices
- Guía de Personalización
- Quick Reference
- Illuminate\Database\Eloquent\Model
- TestCase
- EditUser
- Spatie\Permission\Models\Permission
- CreateUser
- Filament\Notifications\Notification
- RolePolicy
- ServicesConfig
- Detection Checklist
- Tailwind CSS Development
- Migration Best Practices
- CLAUDE.md
- Process
- Architecture Best Practices
- require
- Security Best Practices
- devDependencies
- Board Configuration
- AgendaResource
- composer.json
- Changelog
- AdminPanelProvider
- Advanced Query Best Practices
- Filament Admin Panel
- Blade & Views Best Practices
- Task Scheduling Best Practices
- Database Performance Best Practices
- Task
- Quick Start
- Flowforge Development
- Events and Notifications Best Practices
- Integration Patterns
- Common Patterns
- require-dev
- Caching Best Practices
- Eloquent Best Practices
- User
- psr-4
- Error Handling Best Practices
- Claude Project Settings (hooks)
- Artisan Commands
- Position Management
- Features
- Collection Best Practices
- Filament Breezy (Auth/2FA/Passkeys)
- HTTP Client Best Practices
- scripts
- config
- Mail Best Practices
- Convention and Style Best Practices
- AppConfig
- ActivityPolicy
- Configuration Best Practices
- AdminPanelProvider.php
- Illuminate\Foundation\Auth\User
- extra
- TaskBoard
- Controller.php
- Agenda Full Calendar Widget
- Agenda Timeline Views
- super_admin Role
- Task Board Kanban
- bootstrap/app.php
- routes/web.php
- AgendaFactory
- CreateUsersTable Migration
- UserStatsOverview
- Skill: laravel-best-practices
- EditTask
- Endpoint Tests
- logging.php
- UserGrowthChart
- Assertions
- testing-best-practices/SKILL.md
- TaskResource
- Filament\Tables\Table
- Fakes, Mocks, and Determinism
- CreateCacheTable Migration
- CreateJobsTable Migration
- Application Bootstrap
- ExampleTest (Unit)
- Admin Panel (/admin)
- PHP Code Rules
- Laravel Conventions
- search-docs Before Code Changes Rule
- Illuminate\Support\Facades\Route
- Filament 5 Starter Kit
- TaskFactory
- Test Suite Performance
- AgendaCalendarWidget.php
- Contribuir a este starter kit
- Reviewing Tests
- Naming and Structure
- DatabaseSeeder.php
- Users Resource (CRUD)
- Factories and Test Data
- Testing Best Practices
- TaskBoard Page (Kanban)
- 6. Agregar un Resource
- 7. Agregar un Cluster
- Modelos
- Despliegue
- 1. Nombre y branding
- console.php
- package.json
- Filament Breezy (Auth)
- autoload-dev
- Openpay SDK

## God Nodes (most connected - your core abstractions)
1. `User` - 61 edges
2. `Task` - 29 edges
3. `Agenda` - 26 edges
4. `Quick Reference` - 20 edges
5. `Filament 5 Starter Kit` - 18 edges
6. `UserResource` - 17 edges
7. `Queue and Job Best Practices` - 17 edges
8. `ShieldSeeder` - 16 edges
9. `Changelog` - 16 edges
10. `Laravel Boost Guidelines` - 16 edges

## Surprising Connections (you probably didn't know these)
- `UserResourceTest` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `UserStatsOverviewTest` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `ActivityPolicy` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `RolePolicy` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `Providers Bootstrap` --references--> `AdminPanelProvider`  [EXTRACTED]
  bootstrap/providers.php → README.md

## Import Cycles
- None detected.

## Communities (134 total, 27 thin omitted)

### Community 0 - "Blade and Views Best Practices"
Cohesion: 0.29
Nodes (7): Blade and Views Best Practices, $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data

### Community 1 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.06
Nodes (6): CreateActivityLogTable, AddEventColumnToActivityLogTable, AddBatchUuidColumnToActivityLogTable, Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 2 - "Illuminate\Database\Eloquent\Casts\Attribute"
Cohesion: 0.40
Nodes (3): Attribute, Attribute, Illuminate\Database\Eloquent\Casts\Attribute

### Community 3 - "Laravel Boost Guidelines"
Cohesion: 0.07
Nodes (29): APIs & Eloquent Resources, Application Structure & Architecture, Artisan, Conventions, Deployment, Do Things the Laravel Way, Documentation Files, Foundational Context (+21 more)

### Community 4 - "Patterns"
Cohesion: 0.11
Nodes (18): Action with modal form, Artisan, Calling actions, Common mistakes, Computed table column value, Conditional form field visibility, Correct namespaces, Create resource test (+10 more)

### Community 5 - "Spatie Activity Log"
Cohesion: 0.83
Nodes (4): Spatie Activity Log, AddBatchUuidColumnToActivityLogTable Migration, AddEventColumnToActivityLogTable Migration, CreateActivityLogTable Migration

### Community 7 - "DatabaseConfig"
Cohesion: 0.15
Nodes (13): Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig, FilamentShieldConfig (+5 more)

### Community 8 - "Laravel 13 + Filament 5 — Starter Kit"
Cohesion: 0.12
Nodes (16): code:block1 (app/), code:bash (# Desarrollo (servidor + queue + vite en paralelo)), code:bash (# 1. Clonar), code:bash (# Suite completa), Arquitectura, Autenticación, Comandos frecuentes, Instalación (+8 more)

### Community 9 - "Validation & Forms Best Practices"
Cohesion: 0.07
Nodes (28): Validation and Forms Best Practices, code:php (public function show(int $id)), code:php (public function show(Post $post)), code:php (Route::get('/users/{user}/posts/{post}', function (User $use), code:php (Route::resource('posts', PostController::class);), code:php (public function store(Request $request)), Keep Controllers Thin, Routing & Controllers Best Practices (+20 more)

### Community 10 - "ShieldSeeder"
Cohesion: 0.11
Nodes (10): LatestUsersTable, BezhanSalleh\FilamentShield\Support\Utils, ShieldSeeder, Filament\Actions\Testing\TestAction, Illuminate\Database\Eloquent\ModelNotFoundException, Illuminate\Notifications\DatabaseNotification, Illuminate\Support\Carbon, Illuminate\Support\Facades\DB (+2 more)

### Community 11 - "UserResource.php"
Cohesion: 0.12
Nodes (10): UsersCluster, AgendaForm, TaskForm, UserForm, UserResource, BackedEnum, Filament\Clusters\Cluster, Filament\Resources\Resource (+2 more)

### Community 12 - "Queue and Job Best Practices"
Cohesion: 0.09
Nodes (28): Queue and Job Best Practices, Always Implement `failed()`, Batch Related Jobs, Bus::batch() for Related Jobs, code:php (class ProcessReport implements ShouldQueue), code:php (class UpdateSearchIndex implements ShouldQueue, ShouldBeUniq), code:php (// config/horizon.php), code:php (class SyncWithStripe implements ShouldQueue) (+20 more)

### Community 13 - "Guía de Personalización"
Cohesion: 0.14
Nodes (14): code:php (// app/Filament/Pages/MiPagina.php), code:php (->plugins([), code:php (use App\Services\OpenpayService;), code:block5 (lang/es/navigation.php), code:php (return [), code:php (// ✗  No funciona en tiempo de definición de clase), code:php (use Filament\Support\Colors\Color;), code:bash (php artisan shield:generate --all) (+6 more)

### Community 14 - "Quick Reference"
Cohesion: 0.08
Nodes (23): 10. Routing & Controllers → `rules/routing.md`, 11. HTTP Client → `rules/http-client.md`, 12. Events, Notifications & Mail → `rules/events-notifications.md`, `rules/mail.md`, 13. Error Handling → `rules/error-handling.md`, 14. Task Scheduling → `rules/scheduling.md`, 15. Architecture → `rules/architecture.md`, 16. Migrations → `rules/migrations.md`, 17. Collections → `rules/collections.md` (+15 more)

### Community 15 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.29
Nodes (5): OwnedByUserScope, Illuminate\Database\Eloquent\Attributes\Fillable, Illuminate\Database\Eloquent\Model, Illuminate\Database\Eloquent\Relations\BelongsTo, Illuminate\Database\Eloquent\Scope

### Community 16 - "TestCase"
Cohesion: 0.24
Nodes (7): Illuminate\Foundation\Testing\LazilyRefreshDatabase, Illuminate\Foundation\Testing\TestCase, ActivityPolicy, RBAC (Roles and Permissions), RolePolicy, ShieldSeeder, TestCase

### Community 17 - "EditUser"
Cohesion: 0.14
Nodes (7): EditAgenda, Notification, EditUser, Notification, Filament\Actions\Action, Filament\Actions\DeleteAction, Filament\Resources\Pages\EditRecord

### Community 18 - "Spatie\Permission\Models\Permission"
Cohesion: 0.33
Nodes (3): Spatie\Permission\DefaultTeamResolver, Spatie\Permission\Models\Permission, Spatie\Permission\PermissionRegistrar

### Community 20 - "Filament\Notifications\Notification"
Cohesion: 0.15
Nodes (6): CreateAgenda, Notification, CreateTask, Notification, Filament\Notifications\Notification, Filament\Resources\Pages\CreateRecord

### Community 21 - "RolePolicy"
Cohesion: 0.15
Nodes (3): RolePolicy, Illuminate\Auth\Access\HandlesAuthorization, Spatie\Permission\Models\Role

### Community 23 - "Detection Checklist"
Cohesion: 0.17
Nodes (11): A. Validation & HTTP input, B. Controllers & routing, C. Authorization, D. Eloquent & models, Detection Checklist, E. Architecture & organization, F. Frontend & views, G. Database & migrations (+3 more)

### Community 24 - "Tailwind CSS Development"
Cohesion: 0.10
Nodes (19): Basic Usage, code:css (@theme {), code:diff (- @tailwind base;), code:html (<div class="flex gap-8">), code:html (<div class="bg-white dark:bg-gray-900 text-gray-900 dark:tex), code:html (<div class="flex items-center justify-between gap-4">), code:html (<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 g), Common Patterns (+11 more)

### Community 25 - "Migration Best Practices"
Cohesion: 0.11
Nodes (18): Add Indexes in the Migration, code:php (// database/migrations/posts_migration.php  ← wrong naming, ), code:php (public function up(): void), code:php (// Migration 1: create_settings_table), code:bash (php artisan make:migration create_posts_table), code:php ($table->foreignId('user_id')->constrained()->cascadeOnDelete), code:php (// 2024_01_01_create_posts_table.php — already in production), code:php (// 2024_03_15_add_slug_to_posts_table.php) (+10 more)

### Community 26 - "CLAUDE.md"
Cohesion: 0.08
Nodes (27): APIs & Eloquent Resources, Artisan, Artisan, Common Mistakes, Correct Namespaces, Deployment, Do Things the Laravel Way, Filament (+19 more)

### Community 27 - "Process"
Cohesion: 0.17
Nodes (11): Edge cases, Glob mapping, Ground Rules (read before you start), Infer Conventions, Process, Step 0: Orient, Step 1: Predefined sweep, Step 2: Open-ended pass (+3 more)

### Community 28 - "Architecture Best Practices"
Cohesion: 0.17
Nodes (11): Architecture Best Practices, Depend on Contracts at Boundaries, Extract Focused Business Operations, Follow Framework Conventions, Inject Required Dependencies, Specify a Deterministic Sort Order, Use Atomic Locks for Race Conditions, Use `Concurrency::run()` for Parallel Execution (+3 more)

### Community 29 - "require"
Cohesion: 0.14
Nodes (14): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+6 more)

### Community 30 - "Security Best Practices"
Cohesion: 0.17
Nodes (11): Apply Cross-Site Request Forgery Protection, Audit Dependencies, Authorize Protected Actions, Bind Query Parameters, Control Mass Assignment, Encrypt Sensitive Attributes When Appropriate, Escape Output in Its Context, Keep Secrets Out of Application Code (+3 more)

### Community 31 - "devDependencies"
Cohesion: 0.18
Nodes (11): concurrently, laravel-vite-plugin, devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite, vite (+3 more)

### Community 32 - "Board Configuration"
Cohesion: 0.14
Nodes (14): Actions, Board Configuration, Card Schema, code:php (use Filament\Infolists\Components\TextEntry;), code:php (->cardsPerColumn(20)           // Cards loaded initially), code:php (->searchable(['title', 'description'])), code:php (use Filament\Tables\Filters\SelectFilter;), code:php (use Filament\Actions\Action;) (+6 more)

### Community 33 - "AgendaResource"
Cohesion: 0.15
Nodes (7): AgendaResource, ListAgendas, ListTasks, ListUsers, Filament\Actions\CreateAction, Filament\Pages\Concerns\ExposesTableToWidgets, Filament\Resources\Pages\ListRecords

### Community 34 - "composer.json"
Cohesion: 0.15
Nodes (12): description, keywords, license, minimum-stability, name, prefer-stable, $schema, type (+4 more)

### Community 35 - "Changelog"
Cohesion: 0.05
Nodes (42): 2026-04-17, 2026-04-20, 2026-04-25, 2026-04-28, 2026-05-04, 2026-05-05, 2026-05-06, 2026-05-07 (+34 more)

### Community 36 - "AdminPanelProvider"
Cohesion: 0.25
Nodes (9): Providers Bootstrap, AdminPanelProvider, Agenda Widgets (Calendar, Timeline), Apex Charts Plugin, Auth UI Enhancer Plugin, Filament Logger Plugin, FullCalendar Plugin, Agenda Model (+1 more)

### Community 37 - "Advanced Query Best Practices"
Cohesion: 0.20
Nodes (9): Advanced Query Best Practices, Combine Related Counts with Conditional Aggregates, Compare `whereHas()` with an `IN` Subquery, Consider a Correlated Subquery for Has-Many Ordering, Create Dynamic Relationships with a Subquery Foreign Key, Design Composite Indexes for the Query, Measure Two Simple Queries Against One Complex Query, Reuse Loaded Parent Models with `setRelation()` (+1 more)

### Community 38 - "Filament Admin Panel"
Cohesion: 0.18
Nodes (9): Agendas / Calendar Feature, Filament Admin Panel, FlowForge Kanban (relaticle/flowforge), Laravel Boost MCP Server, Tasks Kanban Board Feature, php, laravel-boost, CreateAgendasTable Migration (+1 more)

### Community 39 - "Blade & Views Best Practices"
Cohesion: 0.20
Nodes (9): Blade & Views Best Practices, code:blade (<div {{ $attributes->merge(['class' => 'alert alert-'.$type]), code:php (return view('dashboard', compact('users'))), Prefer Blade Components Over `@include`, Use `$attributes->merge()` in Component Templates, Use `@aware` for Deeply Nested Component Props, Use Blade Fragments for Partial Re-Renders (htmx/Turbo), Use `@pushOnce` for Per-Component Scripts (+1 more)

### Community 40 - "Task Scheduling Best Practices"
Cohesion: 0.20
Nodes (9): code:php (Schedule::command('billing:charge')->monthly()->environments), code:php (Schedule::daily()), Task Scheduling Best Practices, Use `environments()` to Restrict Tasks, Use `onOneServer()` on Multi-Server Deployments, Use `runInBackground()` for Concurrent Long Tasks, Use Schedule Groups for Shared Configuration, Use `takeUntilTimeout()` for Time-Bounded Processing (+1 more)

### Community 41 - "Database Performance Best Practices"
Cohesion: 0.22
Nodes (8): Add Indexes for Measured Query Patterns, Count Relationships Without Loading Them, Database Performance Best Practices, Eager Load Relationships Before Iterating, Keep Queries Out of Blade Templates, Prevent Lazy Loading in Development, Process Large Data Sets Incrementally, Select Only Needed Columns

### Community 43 - "Quick Start"
Cohesion: 0.22
Nodes (9): 1. Add Position Column to Model, 2. Create Board Page, 3. Configure the Board, code:php (use Illuminate\Database\Schema\Blueprint;), code:bash (php artisan flowforge:make-board TaskBoard), code:php (use Relaticle\Flowforge\BoardPage;), Filament Standard Page, Generate Board (+1 more)

### Community 44 - "Flowforge Development"
Cohesion: 0.20
Nodes (8): code:bash (php artisan vendor:publish --tag=flowforge-config), code:php (return [), code:php (use Illuminate\Database\Migrations\Migration;), Configuration, Flowforge Development, Migration Pattern, Requirements, When to Use This Skill

### Community 45 - "Events and Notifications Best Practices"
Cohesion: 0.20
Nodes (9): Cache Event Discovery During Production Deployment, Dispatch Queued Notifications After Commit, Events and Notifications Best Practices, Implement `HasLocalePreference` on Notifiable Models, Queue Slow Notifications, Rely on Event Discovery, Route Notification Channels to Dedicated Queues, Use On-Demand Notifications for Non-User Recipients (+1 more)

### Community 46 - "Integration Patterns"
Cohesion: 0.29
Nodes (7): code:php (use Relaticle\Flowforge\BoardResourcePage;), code:php (public static function getPages(): array), code:php (use Livewire\Component;), code:blade (<div>), Filament Resource Page, Integration Patterns, Standalone Livewire Component

### Community 47 - "Common Patterns"
Cohesion: 0.38
Nodes (7): code:php (public function board(Board $board): Board), code:php (->recordActions([), Common Patterns, Custom Card Click Behavior, Dynamic Columns from Database, Eager Loading for Cards, Scoped Boards (Multi-tenancy)

### Community 48 - "require-dev"
Cohesion: 0.20
Nodes (10): require-dev, fakerphp/faker, laravel/boost, laravel/pail, laravel/pint, laraveldaily/filacheck, mockery/mockery, nunomaduro/collision (+2 more)

### Community 49 - "Caching Best Practices"
Cohesion: 0.22
Nodes (8): Caching Best Practices, Configure Failover Cache Stores in Production, Consider `Cache::flexible()` for Stale-While-Revalidate, Use `Cache::add()` for Atomic Conditional Writes, Use `Cache::memo()` to Avoid Redundant Hits Within an Execution, Use `Cache::remember()` for Cache-Aside Reads, Use Cache Tags to Invalidate Related Groups, Use `once()` for In-Process Memoization

### Community 50 - "Eloquent Best Practices"
Cohesion: 0.22
Nodes (8): Apply Global Scopes Sparingly, Cast Date and Time Attributes, Define Attribute Casts, Define Precise Relationship Types, Eloquent Best Practices, Keep Application Queries Model-Aware, Use Local Scopes for Reusable Queries, Use `whereBelongsTo()` for Relationship Queries

### Community 51 - "User"
Cohesion: 0.16
Nodes (11): User, Filament\Models\Contracts\FilamentUser, Filament\Models\Contracts\HasAvatar, Filament\Panel, Illuminate\Database\Eloquent\Attributes\Hidden, Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Relations\HasMany, Illuminate\Notifications\Notifiable (+3 more)

### Community 52 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 53 - "Error Handling Best Practices"
Cohesion: 0.25
Nodes (7): Add Context to Exception Classes, Choose Where to Report and Render Exceptions, Define JSON Rendering for API Routes, Error Handling Best Practices, Mark Exceptions the Handler Should Not Report, Prevent Duplicate Reports of One Exception Instance, Throttle High-Volume Exception Reports

### Community 55 - "Artisan Commands"
Cohesion: 0.60
Nodes (5): Artisan Commands, code:bash (php artisan flowforge:diagnose-positions "App\Models\Task" s), Diagnose Position Issues, Interactive Repair, Rebalance Positions

### Community 56 - "Position Management"
Cohesion: 0.40
Nodes (5): code:php (use Relaticle\Flowforge\Services\DecimalPosition;), code:php (// In your Livewire component), DecimalPosition Service, Manual Card Movement, Position Management

### Community 57 - "Features"
Cohesion: 0.22
Nodes (9): Autenticación, Agenda / Calendario, Autenticación, Features, Gestión de usuarios, Pagos (Openpay), Panel de administración (`/admin`), RBAC (Filament Shield) (+1 more)

### Community 58 - "Collection Best Practices"
Cohesion: 0.29
Nodes (6): Choose Between `cursor()` and `lazy()`, Collection Best Practices, Use `#[CollectedBy]` for Custom Collection Classes, Use Higher-Order Messages for Simple Operations, Use `lazyById()` When Updating Records While Iterating, Use `toQuery()` for Bulk Operations on Collections

### Community 59 - "Filament Breezy (Auth/2FA/Passkeys)"
Cohesion: 0.67
Nodes (4): Filament Breezy (Auth/2FA/Passkeys), AlterBreezySessions Migration, CreateBreezySessions Migration, CreatePasskeysTable Migration

### Community 60 - "HTTP Client Best Practices"
Cohesion: 0.29
Nodes (6): Fake HTTP Requests in Tests, Handle Errors Explicitly, HTTP Client Best Practices, Pool Independent Requests, Retry Only Safe Operations, Set Explicit Timeouts

### Community 61 - "scripts"
Cohesion: 0.07
Nodes (28): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+20 more)

### Community 62 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 63 - "Mail Best Practices"
Cohesion: 0.29
Nodes (6): Assert the Delivery Mode, Dispatch Queued Mail After Commit, Mail Best Practices, Queue Slow Mail Delivery, Separate Content and Delivery Tests, Use Markdown Mailables When They Fit

### Community 64 - "Convention and Style Best Practices"
Cohesion: 0.29
Nodes (6): Convention and Style Best Practices, Follow Project Naming Conventions, Keep Presentation Code Maintainable, Prefer Clear, Idiomatic Syntax, Use Utilities When They Clarify Intent, Write Comments That Explain Why

### Community 65 - "AppConfig"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

### Community 67 - "Configuration Best Practices"
Cohesion: 0.33
Nodes (5): Configuration Best Practices, Name Repeated Domain Values, Protect Production Secrets, Read Environment Variables in Configuration Files, Use `App::environment()` for Environment Checks

### Community 68 - "AdminPanelProvider.php"
Cohesion: 0.07
Nodes (25): AppServiceProvider, AdminPanelProvider, BezhanSalleh\FilamentShield\FilamentShieldPlugin, BezhanSalleh\FilamentShield\Resources\Roles\RoleResource, DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin, Filament\Http\Middleware\Authenticate, Filament\Http\Middleware\AuthenticateSession, Filament\Http\Middleware\DisableBladeIconComponents (+17 more)

### Community 70 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 71 - "TaskBoard"
Cohesion: 0.21
Nodes (5): BackedEnum, TaskBoard, Relaticle\Flowforge\Board, Relaticle\Flowforge\BoardPage, Relaticle\Flowforge\Column

### Community 77 - "bootstrap/app.php"
Cohesion: 0.50
Nodes (3): Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware

### Community 80 - "AgendaFactory"
Cohesion: 0.18
Nodes (6): AgendaFactory, static, static, UserFactory, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Support\Facades\Hash

### Community 84 - "UserStatsOverview"
Cohesion: 0.23
Nodes (6): UserStatsOverview, TasksOverdueWidget, Filament\Widgets\StatsOverviewWidget, Filament\Widgets\StatsOverviewWidget\Stat, Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\Cache

### Community 85 - "Skill: laravel-best-practices"
Cohesion: 0.25
Nodes (8): CLAUDE.md (project instructions), README — Starter Kit, Skill: flowforge-development, Rule: migrations, Rule: routing & controllers, Rule: task scheduling, Skill: laravel-best-practices, Skill: tailwindcss-development

### Community 87 - "Endpoint Tests"
Cohesion: 0.25
Nodes (7): Endpoint Coverage, Endpoint Tests, How to Write the Test, Tenant Isolation, Test Authorization at the Policy Level, Testing Validation, Which Layer Owns Which Case

### Community 89 - "logging.php"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 96 - "Assertions"
Cohesion: 0.29
Nodes (6): Arrange, Act, Assert, Assert a Known Value, Assert the Complete Result, Assertions, How to Find the Correct Assertion, Named Response Assertions

### Community 98 - "testing-best-practices/SKILL.md"
Cohesion: 0.29
Nodes (3): Built-in Laravel Assertion Methods, How to Find Test Framework Features, Security Tests

### Community 99 - "TaskResource"
Cohesion: 0.21
Nodes (7): TaskResource, TaskAssignedNotification, Illuminate\Bus\Queueable, Illuminate\Contracts\Queue\ShouldQueue, Illuminate\Notifications\Messages\MailMessage, Illuminate\Notifications\Notification, Illuminate\Support\Facades\Notification

### Community 100 - "Filament\Tables\Table"
Cohesion: 0.06
Nodes (35): ActivityLogResource, ActivityLogsTable, AgendasTable, TasksTable, UsersTable, AgendaDoubleSidedTimelineWidget, AgendaTimelineWidget, Devletes\FilamentTimelineView\Tables\Columns\TimelineEntry (+27 more)

### Community 101 - "Fakes, Mocks, and Determinism"
Cohesion: 0.29
Nodes (7): Database, Fakes, Mocks, and Determinism, Framework Fakes, How to Isolate a Dependency, Mocking, Outbound HTTP Testing, Time and Randomness

### Community 112 - "Filament 5 Starter Kit"
Cohesion: 0.12
Nodes (21): Application Structure & Architecture, Conventions, Documentation Files, Foundational Context, Frontend Bundling, Laravel Boost Guidelines, FilaCheck Post-Edit Rule, Filament Development Guidelines (+13 more)

### Community 114 - "Test Suite Performance"
Cohesion: 0.29
Nodes (6): Common Errors, Global Fakes, How to Find a Slow Test, How to Run the Suite in Parallel, Test Environment, Test Suite Performance

### Community 115 - "AgendaCalendarWidget.php"
Cohesion: 0.08
Nodes (22): AgendaCalendarWidget, CustomPersonalInfo, Filament\Forms, Filament\Forms\Components\ColorPicker, Filament\Forms\Components\DateTimePicker, Filament\Forms\Components\FileUpload, Filament\Forms\Components\Select, Filament\Forms\Components\Textarea (+14 more)

### Community 116 - "Contribuir a este starter kit"
Cohesion: 0.18
Nodes (10): Antes de abrir un PR, Commits, Contribuir a este starter kit, Convenciones del proyecto, Estilo y análisis estático, Flujo de trabajo, Puesta en marcha, Reportar un bug o proponer una mejora (+2 more)

### Community 117 - "Reviewing Tests"
Cohesion: 0.29
Nodes (6): Assertions, Coverage, Data and Determinism, Names and Structure, Reviewing Tests, Test Value

### Community 118 - "Naming and Structure"
Cohesion: 0.33
Nodes (5): File Layout, Grouping, Naming and Structure, Naming Tests, Test Function

### Community 119 - "DatabaseSeeder.php"
Cohesion: 0.47
Nodes (3): DatabaseSeeder, Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Seeder

### Community 120 - "Users Resource (CRUD)"
Cohesion: 0.40
Nodes (6): UserForm Schema, Users Resource (CRUD), UserResourceTest, UserStatsOverviewTest, User Widgets (Stats, Table, Chart), UsersTable Schema

### Community 121 - "Factories and Test Data"
Cohesion: 0.40
Nodes (4): Datasets, Each Test Makes Its Own Data, Factories and Test Data, Record Construction

### Community 122 - "Testing Best Practices"
Cohesion: 0.40
Nodes (5): Consistency First, How to Apply, Rule Index, Testing Best Practices, What to Test

### Community 123 - "TaskBoard Page (Kanban)"
Cohesion: 0.40
Nodes (5): FlowForge Kanban Plugin, Task Model, Navigation Strings (lang/es/navigation.php), TaskBoard Page (Kanban), UsersCluster

### Community 124 - "6. Agregar un Resource"
Cohesion: 0.50
Nodes (4): code:bash (# Crea el Resource con CRUD completo a partir del modelo), code:php (// En el Resource generado:), code:php (public static function getNavigationGroup(): ?string), 6. Agregar un Resource

### Community 125 - "7. Agregar un Cluster"
Cohesion: 0.50
Nodes (4): code:bash (php artisan make:filament-cluster NombreCluster --no-interac), code:php (class NombreCluster extends Cluster), code:php (protected static ?string $cluster = \App\Filament\Clusters\N), 7. Agregar un Cluster

### Community 126 - "Modelos"
Cohesion: 0.50
Nodes (4): `Agenda`, Modelos, `Task`, `User`

### Community 127 - "Despliegue"
Cohesion: 0.67
Nodes (3): code:bash (# Optimizar para producción), code:dotenv (APP_ENV=production), Despliegue

### Community 128 - "1. Nombre y branding"
Cohesion: 0.67
Nodes (3): code:dotenv (# .env), code:php (AuthUIEnhancerPlugin::make()), 1. Nombre y branding

### Community 130 - "package.json"
Cohesion: 0.22
Nodes (8): Vite Build Pipeline, private, $schema, scripts, build, dev, type, Tailwind CSS 4

### Community 131 - "Filament Breezy (Auth)"
Cohesion: 0.40
Nodes (6): Two-Factor Authentication (2FA TOTP), CustomPersonalInfo Livewire Component, Filament Breezy (Auth), Filament Shield (RBAC), User Model, Passkeys (WebAuthn)

### Community 132 - "autoload-dev"
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 133 - "Openpay SDK"
Cohesion: 0.67
Nodes (3): Openpay Payments Feature, Openpay SDK, OpenpayService

## Knowledge Gaps
- **501 isolated node(s):** `php`, `Controller`, `$schema`, `name`, `type` (+496 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **27 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `User` connect `User` to `Illuminate\Database\Eloquent\Casts\Attribute`, `TaskResource`, `Filament\Tables\Table`, `Illuminate\Foundation\Auth\User`, `ShieldSeeder`, `UserResource.php`, `AgendaFactory`, `EditUser`, `TaskFactory`, `AgendaCalendarWidget.php`, `UserStatsOverview`, `RolePolicy`, `Spatie\Permission\Models\Permission`, `DatabaseSeeder.php`, `UserGrowthChart`?**
  _High betweenness centrality (0.046) - this node is a cross-community bridge._
- **Why does `Filament Admin Panel` connect `Filament Admin Panel` to `composer.json`, `package.json`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **Why does `Tailwind CSS 4` connect `package.json` to `Filament 5 Starter Kit`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **What connects `php`, `Controller`, `$schema` to the rest of the system?**
  _501 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Illuminate\Database\Migrations\Migration` be split into smaller, more focused modules?**
  _Cohesion score 0.05701754385964912 - nodes in this community are weakly interconnected._
- **Should `Laravel Boost Guidelines` be split into smaller, more focused modules?**
  _Cohesion score 0.06666666666666667 - nodes in this community are weakly interconnected._
- **Should `Patterns` be split into smaller, more focused modules?**
  _Cohesion score 0.10526315789473684 - nodes in this community are weakly interconnected._