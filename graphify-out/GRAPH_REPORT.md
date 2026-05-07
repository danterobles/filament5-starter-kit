# Graph Report - .  (2026-05-07)

## Corpus Check
- 353 files · ~0 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 353 nodes · 310 edges · 97 communities (60 shown, 37 thin omitted)
- Extraction: 83% EXTRACTED · 17% INFERRED · 0% AMBIGUOUS · INFERRED: 52 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Project Config & Concepts|Project Config & Concepts]]
- [[_COMMUNITY_User Resource Pages|User Resource Pages]]
- [[_COMMUNITY_User Resource Schema & Table|User Resource Schema & Table]]
- [[_COMMUNITY_Access Control & Policies|Access Control & Policies]]
- [[_COMMUNITY_Role Policy|Role Policy]]
- [[_COMMUNITY_Activity Policy|Activity Policy]]
- [[_COMMUNITY_Profile & Browser Sessions UI|Profile & Browser Sessions UI]]
- [[_COMMUNITY_Task & Session Migrations|Task & Session Migrations]]
- [[_COMMUNITY_Auth Config & Shield|Auth Config & Shield]]
- [[_COMMUNITY_Agenda Calendar Widget|Agenda Calendar Widget]]
- [[_COMMUNITY_Shield Permission Seeder|Shield Permission Seeder]]
- [[_COMMUNITY_Custom Profile Livewire|Custom Profile Livewire]]
- [[_COMMUNITY_Task Board|Task Board]]
- [[_COMMUNITY_Session & Cache Config|Session & Cache Config]]
- [[_COMMUNITY_Task Factory|Task Factory]]
- [[_COMMUNITY_User Model|User Model]]
- [[_COMMUNITY_User Growth Chart|User Growth Chart]]
- [[_COMMUNITY_Agenda Factory|Agenda Factory]]
- [[_COMMUNITY_Activity Log Batch UUID Migration|Activity Log Batch UUID Migration]]
- [[_COMMUNITY_Activity Log Event Migration|Activity Log Event Migration]]
- [[_COMMUNITY_Activity Log Migration|Activity Log Migration]]
- [[_COMMUNITY_User Factory|User Factory]]
- [[_COMMUNITY_App Service Provider|App Service Provider]]
- [[_COMMUNITY_Database Seeder|Database Seeder]]
- [[_COMMUNITY_Latest Users Widget|Latest Users Widget]]
- [[_COMMUNITY_User Stats Overview|User Stats Overview]]
- [[_COMMUNITY_Passkey Authentication|Passkey Authentication]]
- [[_COMMUNITY_Activity Log Migrations|Activity Log Migrations]]
- [[_COMMUNITY_App Bootstrap|App Bootstrap]]
- [[_COMMUNITY_Task Board Page|Task Board Page]]
- [[_COMMUNITY_App Config & Welcome|App Config & Welcome]]
- [[_COMMUNITY_Mail & Logging Config|Mail & Logging Config]]
- [[_COMMUNITY_Test Bootstrap|Test Bootstrap]]
- [[_COMMUNITY_Admin Panel Provider|Admin Panel Provider]]
- [[_COMMUNITY_Agenda Timeline Widget|Agenda Timeline Widget]]
- [[_COMMUNITY_Agenda Double-Sided Timeline Widget|Agenda Double-Sided Timeline Widget]]
- [[_COMMUNITY_Base Controller|Base Controller]]
- [[_COMMUNITY_Passkeys Create UI|Passkeys Create UI]]
- [[_COMMUNITY_Test Case Base|Test Case Base]]
- [[_COMMUNITY_Shield & Permissions|Shield & Permissions]]
- [[_COMMUNITY_Filament Logger|Filament Logger]]
- [[_COMMUNITY_Routes|Routes]]
- [[_COMMUNITY_Vite Config Node|Vite Config Node]]
- [[_COMMUNITY_Cache Migration|Cache Migration]]
- [[_COMMUNITY_Jobs Migration|Jobs Migration]]
- [[_COMMUNITY_Base Controller Node|Base Controller Node]]
- [[_COMMUNITY_SQLite DB Driver|SQLite DB Driver]]
- [[_COMMUNITY_Filament Forms Action|Filament Forms Action]]
- [[_COMMUNITY_Unit Example Test|Unit Example Test]]
- [[_COMMUNITY_App JS Node|App JS Node]]
- [[_COMMUNITY_Laravel Pail Package|Laravel Pail Package]]

## God Nodes (most connected - your core abstractions)
1. `Bootstrap Packages Cache` - 17 edges
2. `Bootstrap Services Cache` - 16 edges
3. `Project README` - 14 edges
4. `RolePolicy` - 13 edges
5. `ActivityPolicy` - 13 edges
6. `User Model` - 13 edges
7. `UserResource` - 12 edges
8. `ShieldSeeder` - 7 edges
9. `CustomPersonalInfo` - 7 edges
10. `EditUser` - 7 edges

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

## Communities (97 total, 37 thin omitted)

### Community 0 - "Project Config & Concepts"
Cohesion: 0.17
Nodes (26): CLAUDE.md Project Instructions, Filament Admin Panel, Development Guidelines and AI Conventions, Filament5 Laravel Starter Kit, Bootstrap Packages Cache, leandrocfe/filament-apex-charts, diogogpinto/filament-auth-ui-enhancer, blade-ui-kit/blade-heroicons (+18 more)

### Community 1 - "User Resource Pages"
Cohesion: 0.1
Nodes (3): CreateUser, EditUser, ListUsers

### Community 2 - "User Resource Schema & Table"
Cohesion: 0.11
Nodes (3): UserForm, UsersTable, UserResource

### Community 3 - "Access Control & Policies"
Cohesion: 0.21
Nodes (16): ActivityPolicy, CreateUser Page, CustomPersonalInfo Livewire Component, EditUser Page, Filament Panel Access Control via active flag, LatestUsersTable Widget, ListUsers Page, Role Sync on User Create/Edit Pattern (+8 more)

### Community 6 - "Profile & Browser Sessions UI"
Cohesion: 0.17
Nodes (13): Browser Sessions Livewire View, My Profile Dynamic Component Registry, My Profile Page Blade, Passkey Action Livewire View, Passkey Authentication Script, Passkeys Livewire View, Passkey Registration Script, Personal Info Livewire View (+5 more)

### Community 7 - "Task & Session Migrations"
Cohesion: 0.24
Nodes (11): Artisan CLI Entrypoint, TaskFactory - Task Model Factory, Add Position to Tasks Table Migration (Flowforge), Alter Breezy Sessions Table Migration, Create Breezy Sessions Table Migration, Create Tasks Table Migration, Fix Tasks Table Schema Migration, Create Passkeys Table Migration (+3 more)

### Community 8 - "Auth Config & Shield"
Cohesion: 0.25
Nodes (9): Auth Config, Filament Shield Config, Spatie Permission Config, FilamentShield RoleResource, User Model, Spatie Permission 24h Cache Strategy, Spatie Permission Model, Spatie Role Model (+1 more)

### Community 13 - "Session & Cache Config"
Cohesion: 0.29
Nodes (7): Filament-Breezy Browser Sessions List Component, Filament-Breezy Clipboard Link Component, Cache Config, Database Config, Queue Config, Session Config, Database-backed Cache and Session

### Community 37 - "Activity Log Migrations"
Cohesion: 0.67
Nodes (3): Create Activity Log Table Migration, Add Batch UUID Column to Activity Log Migration, Add Event Column to Activity Log Migration

### Community 38 - "App Bootstrap"
Cohesion: 0.67
Nodes (3): AppServiceProvider, Application Bootstrap, Providers Bootstrap

### Community 39 - "Task Board Page"
Cohesion: 0.67
Nodes (3): Relaticle Flowforge BoardPage, Task Model, TaskBoard Page

### Community 40 - "App Config & Welcome"
Cohesion: 0.67
Nodes (3): Logging Config, Mail Config, Services Config

### Community 41 - "Mail & Logging Config"
Cohesion: 0.67
Nodes (3): App Config, Filesystems Config, Welcome Blade View

### Community 42 - "Test Bootstrap"
Cohesion: 1.0
Nodes (3): Feature ExampleTest, Pest Bootstrap (Pest.php), Base TestCase

## Knowledge Gaps
- **55 isolated node(s):** `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script`, `authenticateWithPasskey`, `TestCase` (+50 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **37 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `UserResource` connect `User Resource Schema & Table` to `User Resource Pages`?**
  _High betweenness centrality (0.008) - this node is a cross-community bridge._
- **What connects `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script` to the rest of the system?**
  _55 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `User Resource Pages` be split into smaller, more focused modules?**
  _Cohesion score 0.1 - nodes in this community are weakly interconnected._
- **Should `User Resource Schema & Table` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._
- **Should `Role Policy` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._
- **Should `Activity Policy` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._