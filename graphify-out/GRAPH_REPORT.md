# Graph Report - filament5-starter-kit  (2026-05-07)

## Corpus Check
- Corpus is ~18,280 words - fits in a single context window. You may not need a graph.

## Summary
- 251 nodes · 268 edges · 61 communities (43 shown, 18 thin omitted)
- Extraction: 85% EXTRACTED · 15% INFERRED · 0% AMBIGUOUS · INFERRED: 41 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `ecbf046d`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- [[_COMMUNITY_ActivityPolicy|ActivityPolicy]]
- [[_COMMUNITY_AgendaCalendarWidget|AgendaCalendarWidget]]
- [[_COMMUNITY_User|User]]
- [[_COMMUNITY_down()|down()]]
- [[_COMMUNITY_CreateUser|CreateUser]]
- [[_COMMUNITY_CustomPersonalInfo|CustomPersonalInfo]]
- [[_COMMUNITY_My Profile Page Blade|My Profile Page Blade]]
- [[_COMMUNITY_ShieldSeeder|ShieldSeeder]]
- [[_COMMUNITY_Create Users Table Migration|Create Users Table Migration]]
- [[_COMMUNITY_UserFactory|UserFactory]]
- [[_COMMUNITY_Database Config|Database Config]]
- [[_COMMUNITY_Spatie Permission Config|Spatie Permission Config]]
- [[_COMMUNITY_Task|Task]]
- [[_COMMUNITY_passkey-action.blade.php|passkey-action.blade.php]]
- [[_COMMUNITY_App Config|App Config]]
- [[_COMMUNITY_Mail Config|Mail Config]]
- [[_COMMUNITY_Feature ExampleTest|Feature ExampleTest]]
- [[_COMMUNITY_Controller.php|Controller.php]]
- [[_COMMUNITY_filament-breezylivewire.passkeys.create-script|filament-breezy::livewire.passkeys.create-script]]
- [[_COMMUNITY_TestCase.php|TestCase.php]]
- [[_COMMUNITY_Create Permission Tables Migration (Spatie)|Create Permission Tables Migration (Spatie)]]
- [[_COMMUNITY_Filament Logger Config|Filament Logger Config]]
- [[_COMMUNITY_Console Routes (inspire command)|Console Routes (inspire command)]]
- [[_COMMUNITY_Vite Configuration|Vite Configuration]]
- [[_COMMUNITY_Create Cache Table Migration|Create Cache Table Migration]]
- [[_COMMUNITY_Create Jobs Table Migration|Create Jobs Table Migration]]
- [[_COMMUNITY_Base Controller|Base Controller]]
- [[_COMMUNITY_SQLite Database Driver (default)|SQLite Database Driver (default)]]
- [[_COMMUNITY_Frontend App Entry (app.js)|Frontend App Entry (app.js)]]
- [[_COMMUNITY_Filament Forms Action Blade (Sticky Actions)|Filament Forms Action Blade (Sticky Actions)]]
- [[_COMMUNITY_Unit ExampleTest|Unit ExampleTest]]

## God Nodes (most connected - your core abstractions)
1. `User` - 17 edges
2. `UserResource` - 17 edges
3. `RolePolicy` - 17 edges
4. `ActivityPolicy` - 17 edges
5. `up()` - 13 edges
6. `down()` - 13 edges
7. `CreateUser` - 10 edges
8. `ShieldSeeder` - 10 edges
9. `EditUser` - 9 edges
10. `AgendaCalendarWidget` - 9 edges

## Surprising Connections (you probably didn't know these)
- `Plan de Mejoras Mayo 2026` --documents_improvement_for--> `EditUser Page`  [EXTRACTED]
  MEJORAS_MAYO.md → app/Filament/Resources/Users/Pages/EditUser.php
- `README — Filament 5 Starter Kit` --documents--> `Relaticle Flowforge (BoardPage)`  [EXTRACTED]
  README.md → vendor/relaticle/flowforge/src/BoardPage.php
- `Plan de Mejoras Mayo 2026` --documents_improvement_for--> `TaskBoard Page`  [EXTRACTED]
  MEJORAS_MAYO.md → app/Filament/Pages/TaskBoard.php
- `UserModelTest` --created_as_result_of--> `Plan de Mejoras Mayo 2026`  [EXTRACTED]
  tests/Feature/UserModelTest.php → MEJORAS_MAYO.md
- `UserResourceTest` --created_as_result_of--> `Plan de Mejoras Mayo 2026`  [EXTRACTED]
  tests/Feature/UserResourceTest.php → MEJORAS_MAYO.md

## Hyperedges (group relationships)
- **Breezy Authentication Schema (sessions, passkeys, alter)** — migration_breezy_sessions, migration_alter_breezy_sessions, migration_passkeys [EXTRACTED 1.00]
- **Tasks Table Schema Evolution (create, fix, add position)** — migration_create_tasks, migration_fix_tasks_schema, migration_add_position_tasks [EXTRACTED 1.00]
- **Activity Log Schema Evolution (create, event column, batch uuid)** — migration_activity_log, migration_activity_log_event, migration_activity_log_batch_uuid [EXTRACTED 1.00]
- **Role-Permission Authorization Stack** — config_filament_shield, config_permission, model_user [INFERRED 0.95]
- **Filament Activity Logging Pipeline** — config_filament_logger, filament_logger_activity_resource, model_user [INFERRED 0.75]
- **Database-backed Infrastructure (cache, session, queue)** — config_cache, config_session, config_queue [INFERRED 0.90]
- **Profile Security Sections (2FA, Passkeys, Browser Sessions)** — two_factor_authentication_blade, passkeys_blade, browser_sessions_blade [INFERRED 0.90]
- **Pest Testing Infrastructure** — pest_bootstrap, tests_testcase, feature_example_test [EXTRACTED 1.00]

## Communities (61 total, 18 thin omitted)

### Community 0 - "ActivityPolicy"
Cohesion: 0.12
Nodes (14): ActivityPolicy, EditUser Page, LatestUsersTable Widget, ListUsers Page, Plan de Mejoras Mayo 2026, Relaticle Flowforge (BoardPage), RolePolicy, Spatie Activity Model (+6 more)

### Community 1 - "AgendaCalendarWidget"
Cohesion: 0.11
Nodes (12): Agenda Model, AgendaCalendarWidget, AgendaDoubleSidedTimelineWidget, AgendaTimelineWidget, Devletes FilamentTimelineView TimelineEntry, AgendaFactory, CreateAgendasTable Migration, Agenda (+4 more)

### Community 2 - "User"
Cohesion: 0.11
Nodes (5): Auth Config, User, UserResource, UserForm, UsersTable

### Community 3 - "down()"
Cohesion: 0.16
Nodes (7): Create Activity Log Table Migration, Add Batch UUID Column to Activity Log Migration, Add Event Column to Activity Log Migration, down(), up(), AddEventColumnToActivityLogTable, AddBatchUuidColumnToActivityLogTable

### Community 4 - "CreateUser"
Cohesion: 0.12
Nodes (3): CreateUser, EditUser, ListUsers

### Community 5 - "CustomPersonalInfo"
Cohesion: 0.2
Nodes (3): CustomPersonalInfo, AdminPanelProvider, UserGrowthChart

### Community 6 - "My Profile Page Blade"
Cohesion: 0.17
Nodes (13): Browser Sessions Livewire View, My Profile Dynamic Component Registry, My Profile Page Blade, Passkey Action Livewire View, Passkey Authentication Script, Passkeys Livewire View, Passkey Registration Script, Personal Info Livewire View (+5 more)

### Community 8 - "Create Users Table Migration"
Cohesion: 0.27
Nodes (10): TaskFactory - Task Model Factory, Add Position to Tasks Table Migration (Flowforge), Alter Breezy Sessions Table Migration, Create Breezy Sessions Table Migration, Create Tasks Table Migration, Fix Tasks Table Schema Migration, Create Passkeys Table Migration, Create Users Table Migration (+2 more)

### Community 10 - "Database Config"
Cohesion: 0.29
Nodes (7): Filament-Breezy Browser Sessions List Component, Filament-Breezy Clipboard Link Component, Cache Config, Database Config, Queue Config, Session Config, Database-backed Cache and Session

### Community 11 - "Spatie Permission Config"
Cohesion: 0.33
Nodes (6): Filament Shield Config, Spatie Permission Config, FilamentShield RoleResource, Spatie Permission 24h Cache Strategy, Spatie Permission Model, Spatie Role Model

### Community 15 - "App Config"
Cohesion: 0.67
Nodes (3): App Config, Filesystems Config, Welcome Blade View

### Community 16 - "Mail Config"
Cohesion: 0.67
Nodes (3): Logging Config, Mail Config, Services Config

### Community 17 - "Feature ExampleTest"
Cohesion: 1.0
Nodes (3): Feature ExampleTest, Pest Bootstrap (Pest.php), Base TestCase

## Knowledge Gaps
- **44 isolated node(s):** `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script`, `authenticateWithPasskey`, `TestCase` (+39 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **18 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `User` connect `User` to `AgendaCalendarWidget`, `CreateUser`, `CustomPersonalInfo`, `UserFactory`, `Spatie Permission Config`, `Task`?**
  _High betweenness centrality (0.132) - this node is a cross-community bridge._
- **Why does `CreateUser` connect `CreateUser` to `ActivityPolicy`, `User`?**
  _High betweenness centrality (0.122) - this node is a cross-community bridge._
- **Why does `UserResourceTest` connect `ActivityPolicy` to `Spatie Permission Config`, `CreateUser`, `ShieldSeeder`?**
  _High betweenness centrality (0.113) - this node is a cross-community bridge._
- **What connects `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script` to the rest of the system?**
  _44 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `ActivityPolicy` be split into smaller, more focused modules?**
  _Cohesion score 0.12 - nodes in this community are weakly interconnected._
- **Should `AgendaCalendarWidget` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._
- **Should `User` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._