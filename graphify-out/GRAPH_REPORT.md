# Graph Report - .  (2026-05-05)

## Corpus Check
- Large corpus: 17448 files · ~6,798,910 words. Semantic extraction will be expensive (many Claude tokens). Consider running on a subfolder, or use --no-semantic to run AST-only.

## Summary
- 331 nodes · 295 edges · 91 communities (58 shown, 33 thin omitted)
- Extraction: 82% EXTRACTED · 18% INFERRED · 0% AMBIGUOUS · INFERRED: 52 edges (avg confidence: 0.86)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Project Docs & Plugin Concepts|Project Docs & Plugin Concepts]]
- [[_COMMUNITY_User CRUD Pages|User CRUD Pages]]
- [[_COMMUNITY_App Bootstrap & Providers|App Bootstrap & Providers]]
- [[_COMMUNITY_User Resource Configuration|User Resource Configuration]]
- [[_COMMUNITY_Role Authorization Policy|Role Authorization Policy]]
- [[_COMMUNITY_Activity Authorization Policy|Activity Authorization Policy]]
- [[_COMMUNITY_Breezy Profile Security UI|Breezy Profile Security UI]]
- [[_COMMUNITY_Task Schema & Migrations|Task Schema & Migrations]]
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
- [[_COMMUNITY_Community 31|Community 31]]
- [[_COMMUNITY_Community 32|Community 32]]
- [[_COMMUNITY_Community 33|Community 33]]
- [[_COMMUNITY_Community 34|Community 34]]
- [[_COMMUNITY_Community 35|Community 35]]
- [[_COMMUNITY_Community 36|Community 36]]
- [[_COMMUNITY_Community 37|Community 37]]
- [[_COMMUNITY_Community 38|Community 38]]
- [[_COMMUNITY_Community 39|Community 39]]
- [[_COMMUNITY_Community 40|Community 40]]
- [[_COMMUNITY_Community 41|Community 41]]
- [[_COMMUNITY_Community 42|Community 42]]
- [[_COMMUNITY_Community 44|Community 44]]
- [[_COMMUNITY_Community 45|Community 45]]
- [[_COMMUNITY_Community 46|Community 46]]
- [[_COMMUNITY_Community 47|Community 47]]
- [[_COMMUNITY_Community 82|Community 82]]
- [[_COMMUNITY_Community 83|Community 83]]
- [[_COMMUNITY_Community 84|Community 84]]
- [[_COMMUNITY_Community 85|Community 85]]
- [[_COMMUNITY_Community 86|Community 86]]
- [[_COMMUNITY_Community 87|Community 87]]
- [[_COMMUNITY_Community 88|Community 88]]
- [[_COMMUNITY_Community 89|Community 89]]
- [[_COMMUNITY_Community 90|Community 90]]

## God Nodes (most connected - your core abstractions)
1. `Bootstrap Packages Cache` - 17 edges
2. `Bootstrap Services Cache` - 16 edges
3. `Project README` - 14 edges
4. `RolePolicy` - 13 edges
5. `ActivityPolicy` - 13 edges
6. `User Model` - 13 edges
7. `UserResource` - 12 edges
8. `UserResource` - 8 edges
9. `ShieldSeeder` - 7 edges
10. `CustomPersonalInfo` - 7 edges

## Surprising Connections (you probably didn't know these)
- `Project README` --references--> `pestphp/pest v4`  [EXTRACTED]
  README.md → bootstrap/cache/packages.php
- `Project README` --references--> `diogogpinto/filament-auth-ui-enhancer`  [EXTRACTED]
  README.md → bootstrap/cache/packages.php
- `CLAUDE.md Project Instructions` --references--> `pestphp/pest v4`  [EXTRACTED]
  CLAUDE.md → bootstrap/cache/packages.php
- `UserStatsOverview Widget` --shares_data_with--> `Spatie Permission Config`  [INFERRED]
  app/Filament/Resources/Users/Widgets/UserStatsOverview.php → config/permission.php
- `Project README` --references--> `filament/filament v5`  [EXTRACTED]
  README.md → bootstrap/cache/packages.php

## Hyperedges (group relationships)
- **Breezy Authentication Schema (sessions, passkeys, alter)** — migration_breezy_sessions, migration_alter_breezy_sessions, migration_passkeys [EXTRACTED 1.00]
- **Tasks Table Schema Evolution (create, fix, add position)** — migration_create_tasks, migration_fix_tasks_schema, migration_add_position_tasks [EXTRACTED 1.00]
- **Activity Log Schema Evolution (create, event column, batch uuid)** — migration_activity_log, migration_activity_log_event, migration_activity_log_batch_uuid [EXTRACTED 1.00]
- **Admin Panel Plugin Registration Stack** — adminpanelprovider_adminpanelprovider, custompersonalinfo_custompersonalinfo, userresource_userresource [EXTRACTED 0.95]
- **UserResource CRUD Page Triad** — listusers_listusers, createuser_createuser, edituser_edituser [EXTRACTED 1.00]
- **UserResource Form and Table Configuration Pattern** — userresource_userresource, userform_userform, userstable_userstable [EXTRACTED 1.00]
- **Role-Permission Authorization Stack** — config_filament_shield, config_permission, model_user [INFERRED 0.95]
- **Filament Activity Logging Pipeline** — config_filament_logger, filament_logger_activity_resource, model_user [INFERRED 0.75]
- **Database-backed Infrastructure (cache, session, queue)** — config_cache, config_session, config_queue [INFERRED 0.90]
- **Profile Security Sections (2FA, Passkeys, Browser Sessions)** — two_factor_authentication_blade, passkeys_blade, browser_sessions_blade [INFERRED 0.90]
- **Pest Testing Infrastructure** — pest_bootstrap, tests_testcase, feature_example_test [EXTRACTED 1.00]
- **Filament Plugin Ecosystem** — pkg_filament, pkg_filament_shield, pkg_filament_logger, pkg_filament_breezy, pkg_auth_ui_enhancer, pkg_apex_charts, pkg_filacheck, pkg_flowforge, pkg_fullcalendar [EXTRACTED 0.95]
- **Laravel Core Service Providers** — services_cache, provider_app_service, provider_admin_panel [EXTRACTED 1.00]
- **Project Documentation and Guidelines** — readme_doc, claude_md, concept_starter_kit [INFERRED 0.85]

## Communities (91 total, 33 thin omitted)

### Community 0 - "Project Docs & Plugin Concepts"
Cohesion: 0.17
Nodes (26): CLAUDE.md Project Instructions, Filament Admin Panel, Development Guidelines and AI Conventions, Filament5 Laravel Starter Kit, Bootstrap Packages Cache, leandrocfe/filament-apex-charts, diogogpinto/filament-auth-ui-enhancer, blade-ui-kit/blade-heroicons (+18 more)

### Community 1 - "User CRUD Pages"
Cohesion: 0.1
Nodes (3): CreateUser, EditUser, ListUsers

### Community 2 - "App Bootstrap & Providers"
Cohesion: 0.16
Nodes (20): ActivityPolicy, AdminPanelProvider, AppServiceProvider, Application Bootstrap, Providers Bootstrap, CreateUser Page, CustomPersonalInfo Livewire Component, EditUser Page (+12 more)

### Community 3 - "User Resource Configuration"
Cohesion: 0.11
Nodes (3): UserForm, UsersTable, UserResource

### Community 6 - "Breezy Profile Security UI"
Cohesion: 0.17
Nodes (13): Browser Sessions Livewire View, My Profile Dynamic Component Registry, My Profile Page Blade, Passkey Action Livewire View, Passkey Authentication Script, Passkeys Livewire View, Passkey Registration Script, Personal Info Livewire View (+5 more)

### Community 7 - "Task Schema & Migrations"
Cohesion: 0.24
Nodes (11): Artisan CLI Entrypoint, TaskFactory - Task Model Factory, Add Position to Tasks Table Migration (Flowforge), Alter Breezy Sessions Table Migration, Create Breezy Sessions Table Migration, Create Tasks Table Migration, Fix Tasks Table Schema Migration, Create Passkeys Table Migration (+3 more)

### Community 8 - "Auth & Permission Config"
Cohesion: 0.25
Nodes (9): Auth Config, Filament Shield Config, Spatie Permission Config, FilamentShield RoleResource, User Model, Spatie Permission 24h Cache Strategy, Spatie Permission Model, Spatie Role Model (+1 more)

### Community 12 - "Infrastructure Config & Views"
Cohesion: 0.29
Nodes (7): Filament-Breezy Browser Sessions List Component, Filament-Breezy Clipboard Link Component, Cache Config, Database Config, Queue Config, Session Config, Database-backed Cache and Session

### Community 36 - "Community 36"
Cohesion: 0.67
Nodes (3): Create Activity Log Table Migration, Add Batch UUID Column to Activity Log Migration, Add Event Column to Activity Log Migration

### Community 37 - "Community 37"
Cohesion: 0.67
Nodes (3): Relaticle Flowforge BoardPage, Task Model, TaskBoard Page

### Community 38 - "Community 38"
Cohesion: 0.67
Nodes (3): App Config, Filesystems Config, Welcome Blade View

### Community 39 - "Community 39"
Cohesion: 0.67
Nodes (3): Logging Config, Mail Config, Services Config

### Community 40 - "Community 40"
Cohesion: 1.0
Nodes (3): Feature ExampleTest, Pest Bootstrap (Pest.php), Base TestCase

## Knowledge Gaps
- **54 isolated node(s):** `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script`, `authenticateWithPasskey`, `TestCase` (+49 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **33 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `UserResource` connect `User Resource Configuration` to `User CRUD Pages`?**
  _High betweenness centrality (0.009) - this node is a cross-community bridge._
- **What connects `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script` to the rest of the system?**
  _54 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `User CRUD Pages` be split into smaller, more focused modules?**
  _Cohesion score 0.1 - nodes in this community are weakly interconnected._
- **Should `User Resource Configuration` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._
- **Should `Role Authorization Policy` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._
- **Should `Activity Authorization Policy` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._