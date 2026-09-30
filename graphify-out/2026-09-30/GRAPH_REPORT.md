# Graph Report - filament5-starter-kit  (2026-08-14)

## Corpus Check
- 144 files · ~42,096 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 1178 nodes · 1517 edges · 134 communities (105 shown, 29 thin omitted)
- Extraction: 96% EXTRACTED · 4% INFERRED · 0% AMBIGUOUS · INFERRED: 67 edges (avg confidence: 0.83)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `7928dead`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Blade and Views Best Practices
- Illuminate\Database\Migrations\Migration
- Agenda.php
- CreateTask
- EditAgenda
- Spatie Activity Log
- Agenda
- Users Resource (CRUD)
- Laravel 13 + Filament 5 — Starter Kit
- Validation & Forms Best Practices
- TaskBoard
- UserResource.php
- Queue and Job Best Practices
- Guía de Personalización
- Quick Reference
- Pest Testing 4
- EditTask
- EditUser
- Illuminate\Auth\Access\HandlesAuthorization
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
- ListUsers.php
- composer.json
- Changelog
- Filament 5 Starter Kit
- Advanced Query Patterns
- Filament Admin Panel
- Blade & Views Best Practices
- Task Scheduling Best Practices
- Database Performance Best Practices
- Task
- Quick Start
- Flowforge Development
- Events & Notifications Best Practices
- Integration Patterns
- Common Patterns
- require-dev
- Caching Best Practices
- Eloquent Best Practices
- User.php
- psr-4
- Error Handling Best Practices
- Claude Project Settings (hooks)
- Artisan Commands
- Position Management
- Testing Best Practices
- Collection Best Practices
- Filament Breezy (Auth/2FA/Passkeys)
- HTTP Client Best Practices
- scripts
- config
- Mail Best Practices
- Conventions & Style
- AppConfig
- ActivityPolicy
- Configuration Best Practices
- AdminPanelProvider.php
- Illuminate\Foundation\Auth\User
- extra
- keywords
- Controller.php
- Agenda Full Calendar Widget
- Agenda Timeline Views
- super_admin Role
- Task Board Kanban
- routes/web.php
- Illuminate\Database\Eloquent\Factories\Factory
- CreateUsersTable Migration
- Task.php
- UserGrowthChart.php
- TaskResource
- Filament\Tables\Table
- TaskResource.php
- CreateCacheTable Migration
- CreateJobsTable Migration
- Application Bootstrap
- ExampleTest (Unit)
- Admin Panel (/admin)
- PHP Code Rules
- Laravel Conventions
- search-docs Before Code Changes Rule
- Laravel Boost Guidelines
- TaskFactory
- AddEventColumnToActivityLogTable
- CustomPersonalInfo
- Contribuir a este starter kit
- package.json
- Filament Breezy (Auth)
- Filament\Resources\Pages\ListRecords
- Openpay SDK

## God Nodes (most connected - your core abstractions)
1. `User` - 28 edges
2. `Agenda` - 26 edges
3. `Quick Reference` - 20 edges
4. `Task` - 18 edges
5. `Filament 5 Starter Kit` - 18 edges
6. `Queue and Job Best Practices` - 17 edges
7. `Changelog` - 16 edges
8. `Laravel Boost Guidelines` - 16 edges
9. `Laravel 13 + Filament 5 — Starter Kit` - 16 edges
10. `UserResource` - 14 edges

## Surprising Connections (you probably didn't know these)
- `ActivityPolicy` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `RolePolicy` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `UserResourceTest` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `UserStatsOverviewTest` --implements--> `TestCase`  [INFERRED]
  README.md → tests/TestCase.php
- `Providers Bootstrap` --references--> `AdminPanelProvider`  [EXTRACTED]
  bootstrap/providers.php → README.md

## Import Cycles
- None detected.

## Communities (134 total, 29 thin omitted)

### Community 0 - "Blade and Views Best Practices"
Cohesion: 0.29
Nodes (7): Blade and Views Best Practices, $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data

### Community 1 - "Illuminate\Database\Migrations\Migration"
Cohesion: 0.28
Nodes (3): CreateActivityLogTable, AddBatchUuidColumnToActivityLogTable, Illuminate\Database\Migrations\Migration

### Community 2 - "Agenda.php"
Cohesion: 0.18
Nodes (5): Attribute, Attribute, AgendaFactory, static, Illuminate\Database\Eloquent\Casts\Attribute

### Community 4 - "EditAgenda"
Cohesion: 0.33
Nodes (3): EditAgenda, Notification, Filament\Resources\Pages\EditRecord

### Community 5 - "Spatie Activity Log"
Cohesion: 0.83
Nodes (4): Spatie Activity Log, AddBatchUuidColumnToActivityLogTable Migration, AddEventColumnToActivityLogTable Migration, CreateActivityLogTable Migration

### Community 7 - "Users Resource (CRUD)"
Cohesion: 0.06
Nodes (36): CLAUDE.md (project instructions), Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig (+28 more)

### Community 8 - "Laravel 13 + Filament 5 — Starter Kit"
Cohesion: 0.06
Nodes (32): Autenticación, code:block1 (app/), code:bash (# Desarrollo (servidor + queue + vite en paralelo)), code:bash (# 1. Clonar), code:bash (# Suite completa), code:bash (# Optimizar para producción), code:dotenv (APP_ENV=production), `Agenda` (+24 more)

### Community 9 - "Validation & Forms Best Practices"
Cohesion: 0.07
Nodes (28): Validation and Forms Best Practices, code:php (public function show(int $id)), code:php (public function show(Post $post)), code:php (Route::get('/users/{user}/posts/{post}', function (User $use), code:php (Route::resource('posts', PostController::class);), code:php (public function store(Request $request)), Keep Controllers Thin, Routing & Controllers Best Practices (+20 more)

### Community 10 - "TaskBoard"
Cohesion: 0.07
Nodes (14): BackedEnum, TaskBoard, AgendaCalendarWidget, OwnedByUserScope, DatabaseSeeder, ShieldSeeder, Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Eloquent\Builder (+6 more)

### Community 11 - "UserResource.php"
Cohesion: 0.14
Nodes (6): UsersCluster, AgendaResource, UserResource, BackedEnum, Filament\Clusters\Cluster, Filament\Resources\Resource

### Community 12 - "Queue and Job Best Practices"
Cohesion: 0.09
Nodes (28): Queue and Job Best Practices, Always Implement `failed()`, Batch Related Jobs, Bus::batch() for Related Jobs, code:php (class ProcessReport implements ShouldQueue), code:php (class UpdateSearchIndex implements ShouldQueue, ShouldBeUniq), code:php (// config/horizon.php), code:php (class SyncWithStripe implements ShouldQueue) (+20 more)

### Community 13 - "Guía de Personalización"
Cohesion: 0.08
Nodes (25): code:php (// app/Filament/Pages/MiPagina.php), code:php (->plugins([), code:bash (# Crea el Resource con CRUD completo a partir del modelo), code:php (// En el Resource generado:), code:php (public static function getNavigationGroup(): ?string), code:bash (php artisan make:filament-cluster NombreCluster --no-interac), code:php (class NombreCluster extends Cluster), code:php (protected static ?string $cluster = \App\Filament\Clusters\N) (+17 more)

### Community 14 - "Quick Reference"
Cohesion: 0.08
Nodes (23): 10. Routing & Controllers → `rules/routing.md`, 11. HTTP Client → `rules/http-client.md`, 12. Events, Notifications & Mail → `rules/events-notifications.md`, `rules/mail.md`, 13. Error Handling → `rules/error-handling.md`, 14. Task Scheduling → `rules/scheduling.md`, 15. Architecture → `rules/architecture.md`, 16. Migrations → `rules/migrations.md`, 17. Collections → `rules/collections.md` (+15 more)

### Community 15 - "Pest Testing 4"
Cohesion: 0.08
Nodes (23): Architecture Testing, Assertions, Basic Test Structure, Basic Usage, Browser Test Example, code:php (it('is true', function () {), code:php (it('returns all', function () {), code:php (it('has emails', function (string $email) {) (+15 more)

### Community 16 - "EditTask"
Cohesion: 0.18
Nodes (3): EditTask, Notification, ListTasks

### Community 20 - "Filament\Notifications\Notification"
Cohesion: 0.25
Nodes (4): CreateAgenda, Notification, Filament\Notifications\Notification, Filament\Resources\Pages\CreateRecord

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
Nodes (11): Architecture Best Practices, Code to Interfaces, Convention Over Configuration, Default Sort by Descending, Single-Purpose Action Classes, Use Atomic Locks for Race Conditions, Use `Concurrency::run()` for Parallel Execution, Use `Context` for Request-Scoped Data (+3 more)

### Community 29 - "require"
Cohesion: 0.14
Nodes (14): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+6 more)

### Community 30 - "Security Best Practices"
Cohesion: 0.17
Nodes (11): Audit Dependencies, Authorize Every Action, CSRF Protection, Encrypt Sensitive Database Fields, Escape Output to Prevent XSS, Keep Secrets Out of Code, Mass Assignment Protection, Prevent SQL Injection (+3 more)

### Community 31 - "devDependencies"
Cohesion: 0.18
Nodes (11): concurrently, laravel-vite-plugin, devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite, vite (+3 more)

### Community 32 - "Board Configuration"
Cohesion: 0.14
Nodes (14): Actions, Board Configuration, Card Schema, code:php (use Filament\Infolists\Components\TextEntry;), code:php (->cardsPerColumn(20)           // Cards loaded initially), code:php (->searchable(['title', 'description'])), code:php (use Filament\Tables\Filters\SelectFilter;), code:php (use Filament\Actions\Action;) (+6 more)

### Community 33 - "ListUsers.php"
Cohesion: 0.20
Nodes (3): ListUsers, LatestUsersTable, Filament\Pages\Concerns\ExposesTableToWidgets

### Community 34 - "composer.json"
Cohesion: 0.15
Nodes (12): autoload-dev, psr-4, description, license, minimum-stability, name, prefer-stable, Tests\\ (+4 more)

### Community 35 - "Changelog"
Cohesion: 0.05
Nodes (42): 2026-04-17, 2026-04-20, 2026-04-25, 2026-04-28, 2026-05-04, 2026-05-05, 2026-05-06, 2026-05-07 (+34 more)

### Community 36 - "Filament 5 Starter Kit"
Cohesion: 0.18
Nodes (15): Providers Bootstrap, FilaCheck Post-Edit Rule, AdminPanelProvider, Agenda Widgets (Calendar, Timeline), Apex Charts Plugin, Auth UI Enhancer Plugin, FilaCheck Lint Plugin, Filament 5 Starter Kit (+7 more)

### Community 37 - "Advanced Query Patterns"
Cohesion: 0.20
Nodes (9): Advanced Query Patterns, Create Dynamic Relationships via Subquery FK, Prefer `whereIn` + Subquery Over `whereHas`, Sometimes Two Simple Queries Beat One Complex Query, Use `addSelect()` Subqueries for Single Values from Has-Many, Use Compound Indexes Matching `orderBy` Column Order, Use Conditional Aggregates Instead of Multiple Count Queries, Use Correlated Subqueries for Has-Many Ordering (+1 more)

### Community 38 - "Filament Admin Panel"
Cohesion: 0.17
Nodes (9): Agendas / Calendar Feature, Filament Admin Panel, FlowForge Kanban (relaticle/flowforge), Laravel Boost MCP Server, Tasks Kanban Board Feature, php, laravel-boost, CreateAgendasTable Migration (+1 more)

### Community 39 - "Blade & Views Best Practices"
Cohesion: 0.20
Nodes (9): Blade & Views Best Practices, code:blade (<div {{ $attributes->merge(['class' => 'alert alert-'.$type]), code:php (return view('dashboard', compact('users'))), Prefer Blade Components Over `@include`, Use `$attributes->merge()` in Component Templates, Use `@aware` for Deeply Nested Component Props, Use Blade Fragments for Partial Re-Renders (htmx/Turbo), Use `@pushOnce` for Per-Component Scripts (+1 more)

### Community 40 - "Task Scheduling Best Practices"
Cohesion: 0.20
Nodes (9): code:php (Schedule::command('billing:charge')->monthly()->environments), code:php (Schedule::daily()), Task Scheduling Best Practices, Use `environments()` to Restrict Tasks, Use `onOneServer()` on Multi-Server Deployments, Use `runInBackground()` for Concurrent Long Tasks, Use Schedule Groups for Shared Configuration, Use `takeUntilTimeout()` for Time-Bounded Processing (+1 more)

### Community 41 - "Database Performance Best Practices"
Cohesion: 0.20
Nodes (9): Add Database Indexes, Always Eager Load Relationships, Chunk Large Datasets, Database Performance Best Practices, No Queries in Blade Templates, Prevent Lazy Loading in Development, Select Only Needed Columns, Use `cursor()` for Memory-Efficient Iteration (+1 more)

### Community 42 - "Task"
Cohesion: 0.13
Nodes (3): Task, TaskPolicy, Illuminate\Database\Eloquent\Relations\BelongsTo

### Community 43 - "Quick Start"
Cohesion: 0.22
Nodes (9): 1. Add Position Column to Model, 2. Create Board Page, 3. Configure the Board, code:php (use Illuminate\Database\Schema\Blueprint;), code:bash (php artisan flowforge:make-board TaskBoard), code:php (use Relaticle\Flowforge\BoardPage;), Filament Standard Page, Generate Board (+1 more)

### Community 44 - "Flowforge Development"
Cohesion: 0.20
Nodes (8): code:bash (php artisan vendor:publish --tag=flowforge-config), code:php (return [), code:php (use Illuminate\Database\Migrations\Migration;), Configuration, Flowforge Development, Migration Pattern, Requirements, When to Use This Skill

### Community 45 - "Events & Notifications Best Practices"
Cohesion: 0.20
Nodes (9): Always Queue Notifications, Events & Notifications Best Practices, Implement `HasLocalePreference` on Notifiable Models, Rely on Event Discovery, Route Notification Channels to Dedicated Queues, Run `event:cache` in Production Deploy, Use `afterCommit()` on Notifications in Transactions, Use On-Demand Notifications for Non-User Recipients (+1 more)

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
Nodes (8): Caching Best Practices, Configure Failover Cache Stores in Production, Use `Cache::add()` for Atomic Conditional Writes, Use `Cache::flexible()` for Stale-While-Revalidate, Use `Cache::memo()` to Avoid Redundant Hits Within a Request, Use `Cache::remember()` Instead of Manual Get/Put, Use Cache Tags to Invalidate Related Groups, Use `once()` for Per-Request Memoization

### Community 50 - "Eloquent Best Practices"
Cohesion: 0.22
Nodes (8): Apply Global Scopes Sparingly, Avoid Hardcoded Table Names in Queries, Cast Date Columns Properly, Define Attribute Casts, Eloquent Best Practices, Use Correct Relationship Types, Use Local Scopes for Reusable Queries, Use `whereBelongsTo()` for Relationship Queries

### Community 51 - "User.php"
Cohesion: 0.22
Nodes (8): User, Filament\Models\Contracts\FilamentUser, Filament\Models\Contracts\HasAvatar, Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Eloquent\Relations\HasMany, Illuminate\Notifications\Notifiable, Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable, Spatie\Permission\Traits\HasRoles

### Community 52 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 53 - "Error Handling Best Practices"
Cohesion: 0.25
Nodes (7): Add Context to Exception Classes, Enable `dontReportDuplicates()`, Error Handling Best Practices, Exception Reporting and Rendering, Force JSON Error Rendering for API Routes, Throttle High-Volume Exceptions, Use `ShouldntReport` for Exceptions That Should Never Log

### Community 55 - "Artisan Commands"
Cohesion: 0.60
Nodes (5): Artisan Commands, code:bash (php artisan flowforge:diagnose-positions "App\Models\Task" s), Diagnose Position Issues, Interactive Repair, Rebalance Positions

### Community 56 - "Position Management"
Cohesion: 0.40
Nodes (5): code:php (use Relaticle\Flowforge\Services\DecimalPosition;), code:php (// In your Livewire component), DecimalPosition Service, Manual Card Movement, Position Management

### Community 57 - "Testing Best Practices"
Cohesion: 0.25
Nodes (7): Call `Event::fake()` After Factory Setup, Testing Best Practices, Use `Exceptions::fake()` to Assert Exception Reporting, Use Factory States and Sequences, Use `LazilyRefreshDatabase` Over `RefreshDatabase`, Use Model Assertions Over Raw Database Assertions, Use `recycle()` to Share Relationship Instances Across Factories

### Community 58 - "Collection Best Practices"
Cohesion: 0.29
Nodes (6): Choose `cursor()` vs. `lazy()` Correctly, Collection Best Practices, Use `#[CollectedBy]` for Custom Collection Classes, Use Higher-Order Messages for Simple Operations, Use `lazyById()` When Updating Records While Iterating, Use `toQuery()` for Bulk Operations on Collections

### Community 59 - "Filament Breezy (Auth/2FA/Passkeys)"
Cohesion: 0.67
Nodes (4): Filament Breezy (Auth/2FA/Passkeys), AlterBreezySessions Migration, CreateBreezySessions Migration, CreatePasskeysTable Migration

### Community 60 - "HTTP Client Best Practices"
Cohesion: 0.29
Nodes (6): Always Set Explicit Timeouts, Fake HTTP Calls in Tests, Handle Errors Explicitly, HTTP Client Best Practices, Use Request Pooling for Concurrent Requests, Use Retry with Backoff for External APIs

### Community 61 - "scripts"
Cohesion: 0.07
Nodes (28): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+20 more)

### Community 62 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 63 - "Mail Best Practices"
Cohesion: 0.29
Nodes (6): Implement `ShouldQueue` on the Mailable Class, Mail Best Practices, Separate Content Tests from Sending Tests, Use `afterCommit()` on Mailables Inside Transactions, Use `assertQueued()` Not `assertSent()` for Queued Mailables, Use Markdown Mailables for Transactional Emails

### Community 64 - "Conventions & Style"
Cohesion: 0.29
Nodes (6): Conventions & Style, Follow Laravel Naming Conventions, No Inline JS/CSS in Blade, No Unnecessary Comments, Prefer Shorter Readable Syntax, Use Laravel String & Array Helpers

### Community 65 - "AppConfig"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

### Community 67 - "Configuration Best Practices"
Cohesion: 0.33
Nodes (5): Configuration Best Practices, `env()` Only in Config Files, Use `App::environment()` for Environment Checks, Use Constants and Language Files, Use Encrypted Env or External Secrets

### Community 68 - "AdminPanelProvider.php"
Cohesion: 0.21
Nodes (5): AppServiceProvider, AdminPanelProvider, Filament\Panel, Filament\PanelProvider, Illuminate\Support\ServiceProvider

### Community 70 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 71 - "keywords"
Cohesion: 0.67
Nodes (3): keywords, framework, laravel

### Community 80 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.36
Nodes (3): static, UserFactory, Illuminate\Database\Eloquent\Factories\Factory

### Community 84 - "Task.php"
Cohesion: 0.18
Nodes (3): UserStatsOverview, TasksOverdueWidget, Filament\Widgets\StatsOverviewWidget

### Community 99 - "TaskResource"
Cohesion: 0.21
Nodes (7): TaskResource, TaskAssignedNotification, Illuminate\Bus\Queueable, Illuminate\Contracts\Queue\ShouldQueue, Illuminate\Notifications\Messages\MailMessage, Illuminate\Notifications\Notification, Illuminate\Support\Facades\Notification

### Community 100 - "Filament\Tables\Table"
Cohesion: 0.16
Nodes (7): AgendasTable, TasksTable, UsersTable, AgendaDoubleSidedTimelineWidget, AgendaTimelineWidget, Filament\Tables\Table, Filament\Widgets\TableWidget

### Community 101 - "TaskResource.php"
Cohesion: 0.22
Nodes (5): AgendaForm, TaskForm, UserForm, Filament\Forms\Components\TextInput, Filament\Schemas\Schema

### Community 112 - "Laravel Boost Guidelines"
Cohesion: 0.13
Nodes (15): Application Structure & Architecture, Conventions, Documentation Files, Foundational Context, Frontend Bundling, Laravel Boost Guidelines, Filament Development Guidelines, Pint Formatter Rule (+7 more)

### Community 115 - "CustomPersonalInfo"
Cohesion: 0.33
Nodes (3): CustomPersonalInfo, Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo, TextInput

### Community 116 - "Contribuir a este starter kit"
Cohesion: 0.18
Nodes (10): Antes de abrir un PR, Commits, Contribuir a este starter kit, Convenciones del proyecto, Estilo y análisis estático, Flujo de trabajo, Puesta en marcha, Reportar un bug o proponer una mejora (+2 more)

### Community 130 - "package.json"
Cohesion: 0.22
Nodes (8): Vite Build Pipeline, private, $schema, scripts, build, dev, type, Tailwind CSS 4

### Community 131 - "Filament Breezy (Auth)"
Cohesion: 0.25
Nodes (9): Two-Factor Authentication (2FA TOTP), CustomPersonalInfo Livewire Component, Filament Breezy (Auth), Filament Shield (RBAC), FlowForge Kanban Plugin, Task Model, User Model, Passkeys (WebAuthn) (+1 more)

### Community 133 - "Openpay SDK"
Cohesion: 0.67
Nodes (3): Openpay Payments Feature, Openpay SDK, OpenpayService

## Knowledge Gaps
- **444 isolated node(s):** `php`, `Controller`, `$schema`, `name`, `type` (+439 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **29 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `User` connect `User.php` to `ListUsers.php`, `Agenda.php`, `TaskResource`, `Filament\Tables\Table`, `TaskResource.php`, `AdminPanelProvider.php`, `Illuminate\Foundation\Auth\User`, `TaskBoard`, `EditUser`, `Illuminate\Auth\Access\HandlesAuthorization`, `TaskFactory`, `Task.php`, `UserGrowthChart.php`?**
  _High betweenness centrality (0.020) - this node is a cross-community bridge._
- **Why does `Tailwind CSS 4` connect `package.json` to `Laravel Boost Guidelines`, `Filament 5 Starter Kit`?**
  _High betweenness centrality (0.020) - this node is a cross-community bridge._
- **Why does `Filament Admin Panel` connect `Filament Admin Panel` to `composer.json`, `package.json`?**
  _High betweenness centrality (0.019) - this node is a cross-community bridge._
- **Are the 9 inferred relationships involving `User` (e.g. with `.configure()` and `.configure()`) actually correct?**
  _`User` has 9 INFERRED edges - model-reasoned connections that need verification._
- **What connects `php`, `Controller`, `$schema` to the rest of the system?**
  _444 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Agenda` be split into smaller, more focused modules?**
  _Cohesion score 0.14619883040935672 - nodes in this community are weakly interconnected._
- **Should `Users Resource (CRUD)` be split into smaller, more focused modules?**
  _Cohesion score 0.06072874493927125 - nodes in this community are weakly interconnected._