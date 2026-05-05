# Graph Report - .  (2026-05-04)

## Corpus Check
- Large corpus: 17428 files · ~6,580,371 words. Semantic extraction will be expensive (many Claude tokens). Consider running on a subfolder, or use --no-semantic to run AST-only.

## Summary
- 309 nodes · 247 edges · 88 communities (59 shown, 29 thin omitted)
- Extraction: 79% EXTRACTED · 21% INFERRED · 0% AMBIGUOUS · INFERRED: 51 edges (avg confidence: 0.85)
- Token cost: 16,000 input · 3,050 output

## Community Hubs (Navigation)
- [[_COMMUNITY_User CRUD Pages|User CRUD Pages]]
- [[_COMMUNITY_App Bootstrap & Providers|App Bootstrap & Providers]]
- [[_COMMUNITY_User Resource Configuration|User Resource Configuration]]
- [[_COMMUNITY_Role Authorization Policy|Role Authorization Policy]]
- [[_COMMUNITY_Activity Authorization Policy|Activity Authorization Policy]]
- [[_COMMUNITY_Task Schema & Migrations|Task Schema & Migrations]]
- [[_COMMUNITY_Breezy Profile Security UI|Breezy Profile Security UI]]
- [[_COMMUNITY_Auth & Permission Config|Auth & Permission Config]]
- [[_COMMUNITY_Shield Permission Seeder|Shield Permission Seeder]]
- [[_COMMUNITY_Custom Personal Info|Custom Personal Info]]
- [[_COMMUNITY_Task Board & Model|Task Board & Model]]
- [[_COMMUNITY_Infrastructure Config & Views|Infrastructure Config & Views]]
- [[_COMMUNITY_Task Factory|Task Factory]]
- [[_COMMUNITY_User Model|User Model]]
- [[_COMMUNITY_User Growth Chart Widget|User Growth Chart Widget]]
- [[_COMMUNITY_Activity Log Batch UUID Migration|Activity Log Batch UUID Migration]]
- [[_COMMUNITY_Activity Log Event Migration|Activity Log Event Migration]]
- [[_COMMUNITY_Activity Log Base Migration|Activity Log Base Migration]]
- [[_COMMUNITY_User Factory|User Factory]]
- [[_COMMUNITY_App Service Provider|App Service Provider]]
- [[_COMMUNITY_Activity Log Schema Evolution|Activity Log Schema Evolution]]
- [[_COMMUNITY_Database Seeder|Database Seeder]]
- [[_COMMUNITY_Admin Panel Provider|Admin Panel Provider]]
- [[_COMMUNITY_Latest Users Table Widget|Latest Users Table Widget]]
- [[_COMMUNITY_User Stats Overview Widget|User Stats Overview Widget]]
- [[_COMMUNITY_Passkey Authentication UI|Passkey Authentication UI]]
- [[_COMMUNITY_Project Docs & Build Config|Project Docs & Build Config]]
- [[_COMMUNITY_Shield Permissions Setup|Shield Permissions Setup]]
- [[_COMMUNITY_Flowforge Task Board|Flowforge Task Board]]
- [[_COMMUNITY_App Config & Welcome View|App Config & Welcome View]]
- [[_COMMUNITY_Mail & Logging Config|Mail & Logging Config]]
- [[_COMMUNITY_Pest Test Infrastructure|Pest Test Infrastructure]]
- [[_COMMUNITY_Base HTTP Controller|Base HTTP Controller]]
- [[_COMMUNITY_Passkey Registration Scripts|Passkey Registration Scripts]]
- [[_COMMUNITY_Test Case Base|Test Case Base]]
- [[_COMMUNITY_Filament Logger Config|Filament Logger Config]]
- [[_COMMUNITY_Routes|Routes]]
- [[_COMMUNITY_Cache Table Migration Node|Cache Table Migration Node]]
- [[_COMMUNITY_Jobs Table Migration Node|Jobs Table Migration Node]]
- [[_COMMUNITY_Base Controller|Base Controller]]
- [[_COMMUNITY_SQLite DB Driver|SQLite DB Driver]]
- [[_COMMUNITY_Filament Forms Action Blade Node|Filament Forms Action Blade Node]]
- [[_COMMUNITY_Unit Example Test Node|Unit Example Test Node]]

## God Nodes (most connected - your core abstractions)
1. `RolePolicy` - 13 edges
2. `ActivityPolicy` - 13 edges
3. `User Model` - 13 edges
4. `UserResource` - 12 edges
5. `UserResource` - 8 edges
6. `ShieldSeeder` - 7 edges
7. `CustomPersonalInfo` - 7 edges
8. `EditUser` - 7 edges
9. `CreateUser` - 7 edges
10. `ListUsers` - 6 edges

## Surprising Connections (you probably didn't know these)
- `Vite Configuration` --references--> `Laravel 13 + Filament 5 Starter Kit README`  [INFERRED]
  vite.config.js → README.md
- `Create Activity Log Table Migration` --references--> `Filament Logger Plugin (Activity Log)`  [INFERRED]
  database/migrations/2026_04_20_191120_create_activity_log_table.php → README.md
- `Create Passkeys Table Migration` --references--> `Filament Breezy Plugin (2FA, Sessions, Passkeys)`  [INFERRED]
  database/migrations/2026_04_20_194026_create_passkeys_table.php → README.md
- `Create Permission Tables Migration (Spatie)` --references--> `Filament Shield Plugin (RBAC)`  [INFERRED]
  database/migrations/2026_04_25_220238_create_permission_tables.php → README.md
- `Create Breezy Sessions Table Migration` --references--> `Filament Breezy Plugin (2FA, Sessions, Passkeys)`  [EXTRACTED]
  database/migrations/2026_04_20_194024_create_breezy_sessions_table.php → README.md

## Hyperedges (group relationships)
- **Tasks Table Schema Evolution (create, fix, add position)** — migration_create_tasks, migration_fix_tasks_schema, migration_add_position_tasks [EXTRACTED 1.00]
- **Activity Log Schema Evolution (create, event column, batch uuid)** — migration_activity_log, migration_activity_log_event, migration_activity_log_batch_uuid [EXTRACTED 1.00]
- **Breezy Authentication Schema (sessions, passkeys, alter)** — migration_breezy_sessions, migration_alter_breezy_sessions, migration_passkeys [EXTRACTED 1.00]
- **UserResource CRUD Page Triad** — listusers_listusers, createuser_createuser, edituser_edituser [EXTRACTED 1.00]
- **UserResource Form and Table Configuration Pattern** — userresource_userresource, userform_userform, userstable_userstable [EXTRACTED 1.00]
- **Admin Panel Plugin Registration Stack** — adminpanelprovider_adminpanelprovider, custompersonalinfo_custompersonalinfo, userresource_userresource [EXTRACTED 0.95]
- **Role-Permission Authorization Stack** — config_filament_shield, config_permission, model_user [INFERRED 0.95]
- **Database-backed Infrastructure (cache, session, queue)** — config_cache, config_session, config_queue [INFERRED 0.90]
- **Filament Activity Logging Pipeline** — config_filament_logger, filament_logger_activity_resource, model_user [INFERRED 0.75]
- **Profile Security Sections (2FA, Passkeys, Browser Sessions)** — two_factor_authentication_blade, passkeys_blade, browser_sessions_blade [INFERRED 0.90]
- **Passkey WebAuthn Registration and Authentication Flow** — passkeys_create_script, passkeys_authenticate_script, passkey_action_blade [INFERRED 0.90]
- **Pest Testing Infrastructure** — pest_bootstrap, tests_testcase, feature_example_test [EXTRACTED 1.00]

## Communities (88 total, 29 thin omitted)

### Community 0 - "User CRUD Pages"
Cohesion: 0.1
Nodes (3): CreateUser, EditUser, ListUsers

### Community 1 - "App Bootstrap & Providers"
Cohesion: 0.16
Nodes (20): ActivityPolicy, AdminPanelProvider, AppServiceProvider, Application Bootstrap, Providers Bootstrap, CreateUser Page, CustomPersonalInfo Livewire Component, EditUser Page (+12 more)

### Community 2 - "User Resource Configuration"
Cohesion: 0.11
Nodes (3): UserForm, UsersTable, UserResource

### Community 5 - "Task Schema & Migrations"
Cohesion: 0.21
Nodes (13): Artisan CLI Entrypoint, TaskFactory - Task Model Factory, Add Position to Tasks Table Migration (Flowforge), Alter Breezy Sessions Table Migration, Create Breezy Sessions Table Migration, Create Tasks Table Migration, Fix Tasks Table Schema Migration, Create Passkeys Table Migration (+5 more)

### Community 6 - "Breezy Profile Security UI"
Cohesion: 0.17
Nodes (13): Browser Sessions Livewire View, My Profile Dynamic Component Registry, My Profile Page Blade, Passkey Action Livewire View, Passkey Authentication Script, Passkeys Livewire View, Passkey Registration Script, Personal Info Livewire View (+5 more)

### Community 7 - "Auth & Permission Config"
Cohesion: 0.25
Nodes (9): Auth Config, Filament Shield Config, Spatie Permission Config, FilamentShield RoleResource, User Model, Spatie Permission 24h Cache Strategy, Spatie Permission Model, Spatie Role Model (+1 more)

### Community 11 - "Infrastructure Config & Views"
Cohesion: 0.29
Nodes (7): Filament-Breezy Browser Sessions List Component, Filament-Breezy Clipboard Link Component, Cache Config, Database Config, Queue Config, Session Config, Database-backed Cache and Session

### Community 20 - "Activity Log Schema Evolution"
Cohesion: 0.5
Nodes (4): Create Activity Log Table Migration, Add Batch UUID Column to Activity Log Migration, Add Event Column to Activity Log Migration, Filament Logger Plugin (Activity Log)

### Community 36 - "Project Docs & Build Config"
Cohesion: 0.67
Nodes (3): Project CLAUDE.md Guidelines, Laravel 13 + Filament 5 Starter Kit README, Vite Configuration

### Community 37 - "Shield Permissions Setup"
Cohesion: 1.0
Nodes (3): Create Permission Tables Migration (Spatie), Filament Shield Plugin (RBAC), ShieldSeeder - Filament Shield Roles/Permissions Seeder

### Community 38 - "Flowforge Task Board"
Cohesion: 0.67
Nodes (3): Relaticle Flowforge BoardPage, Task Model, TaskBoard Page

### Community 39 - "App Config & Welcome View"
Cohesion: 0.67
Nodes (3): App Config, Filesystems Config, Welcome Blade View

### Community 40 - "Mail & Logging Config"
Cohesion: 0.67
Nodes (3): Logging Config, Mail Config, Services Config

### Community 41 - "Pest Test Infrastructure"
Cohesion: 1.0
Nodes (3): Feature ExampleTest, Pest Bootstrap (Pest.php), Base TestCase

## Knowledge Gaps
- **49 isolated node(s):** `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script`, `authenticateWithPasskey`, `TestCase` (+44 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **29 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `UserResource` connect `User Resource Configuration` to `User CRUD Pages`?**
  _High betweenness centrality (0.010) - this node is a cross-community bridge._
- **Are the 2 inferred relationships involving `User Model` (e.g. with `CustomPersonalInfo Livewire Component` and `UsersTable`) actually correct?**
  _`User Model` has 2 INFERRED edges - model-reasoned connections that need verification._
- **What connects `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script` to the rest of the system?**
  _49 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `User CRUD Pages` be split into smaller, more focused modules?**
  _Cohesion score 0.1 - nodes in this community are weakly interconnected._
- **Should `User Resource Configuration` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._
- **Should `Role Authorization Policy` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._
- **Should `Activity Authorization Policy` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._