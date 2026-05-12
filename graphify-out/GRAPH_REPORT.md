# Graph Report - .  (2026-05-12)

## Corpus Check
- Large corpus: 17577 files · ~6,872,846 words. Semantic extraction will be expensive (many Claude tokens). Consider running on a subfolder, or use --no-semantic to run AST-only.

## Summary
- 307 nodes · 350 edges · 67 communities (47 shown, 20 thin omitted)
- Extraction: 85% EXTRACTED · 15% INFERRED · 0% AMBIGUOUS · INFERRED: 52 edges (avg confidence: 0.87)
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
- [[_COMMUNITY_User Growth Chart|User Growth Chart]]
- [[_COMMUNITY_Agenda Factory|Agenda Factory]]
- [[_COMMUNITY_Activity Log Batch UUID Migration|Activity Log Batch UUID Migration]]
- [[_COMMUNITY_Activity Log Event Migration|Activity Log Event Migration]]
- [[_COMMUNITY_Activity Log Migration|Activity Log Migration]]
- [[_COMMUNITY_User Factory|User Factory]]
- [[_COMMUNITY_Breezy Sessions Migration|Breezy Sessions Migration]]
- [[_COMMUNITY_Users Table Migration|Users Table Migration]]
- [[_COMMUNITY_Cache Table Migration|Cache Table Migration]]
- [[_COMMUNITY_Jobs Table Migration|Jobs Table Migration]]
- [[_COMMUNITY_App Bootstrap Entry|App Bootstrap Entry]]
- [[_COMMUNITY_Providers Bootstrap|Providers Bootstrap]]
- [[_COMMUNITY_Services Cache|Services Cache]]
- [[_COMMUNITY_Packages Cache|Packages Cache]]
- [[_COMMUNITY_Shield Config|Shield Config]]
- [[_COMMUNITY_Auth Config File|Auth Config File]]
- [[_COMMUNITY_App Config File|App Config File]]
- [[_COMMUNITY_Logger Config File|Logger Config File]]
- [[_COMMUNITY_Cache Config File|Cache Config File]]

## God Nodes (most connected - your core abstractions)
1. `OpenpayService` - 19 edges
2. `Laravel 13 + Filament 5 Starter Kit` - 19 edges
3. `User` - 17 edges
4. `UserResource` - 17 edges
5. `RolePolicy` - 17 edges
6. `ActivityPolicy` - 17 edges
7. `up()` - 13 edges
8. `down()` - 13 edges
9. `Filament PHP Admin Panel` - 12 edges
10. `CreateUser` - 10 edges

## Surprising Connections (you probably didn't know these)
- `Laravel 13 + Filament 5 Starter Kit` --conceptually_related_to--> `Monterrey Nuevo Leon Mexico Night Cityscape`  [AMBIGUOUS]
  README.md → public/img/image_nl_mty.jpg
- `Plan de Mejoras Mayo 2026` --documents_improvement_for--> `EditUser Page`  [EXTRACTED]
  MEJORAS_MAYO.md → app/Filament/Resources/Users/Pages/EditUser.php
- `README — Filament 5 Starter Kit` --documents--> `Relaticle Flowforge (BoardPage)`  [EXTRACTED]
  README.md → vendor/relaticle/flowforge/src/BoardPage.php
- `TaskBoard Page` --documents_improvement_for--> `Plan de Mejoras Mayo 2026`  [EXTRACTED]
  app/Filament/Pages/TaskBoard.php → MEJORAS_MAYO.md
- `UserModelTest` --created_as_result_of--> `Plan de Mejoras Mayo 2026`  [EXTRACTED]
  tests/Feature/UserModelTest.php → MEJORAS_MAYO.md

## Communities (67 total, 20 thin omitted)

### Community 0 - "Project Config & Concepts"
Cohesion: 0.06
Nodes (8): Auth Config, User, CreateUser, EditUser, ListUsers, UserResource, UserForm, UsersTable

### Community 1 - "User Resource Pages"
Cohesion: 0.11
Nodes (15): ActivityPolicy, EditUser Page, LatestUsersTable Widget, ListUsers Page, Plan de Mejoras Mayo 2026, Relaticle Flowforge (BoardPage), RolePolicy, Spatie Activity Model (+7 more)

### Community 2 - "User Resource Schema & Table"
Cohesion: 0.11
Nodes (12): Agenda Model, AgendaCalendarWidget, AgendaDoubleSidedTimelineWidget, AgendaTimelineWidget, Devletes FilamentTimelineView TimelineEntry, AgendaFactory, CreateAgendasTable Migration, Agenda (+4 more)

### Community 3 - "Access Control & Policies"
Cohesion: 0.16
Nodes (22): Graphify Knowledge Graph Tool, Laravel Boost MCP Server, CLAUDE.md Project Configuration, Monterrey Nuevo Leon Mexico Night Cityscape, Apex Charts Plugin, Auth UI Enhancer Plugin, FilaCheck Plugin, Filament PHP Admin Panel (+14 more)

### Community 4 - "Role Policy"
Cohesion: 0.16
Nodes (7): Create Activity Log Table Migration, Add Batch UUID Column to Activity Log Migration, Add Event Column to Activity Log Migration, down(), up(), AddEventColumnToActivityLogTable, AddBatchUuidColumnToActivityLogTable

### Community 6 - "Profile & Browser Sessions UI"
Cohesion: 0.21
Nodes (4): CustomPersonalInfo, CustomPersonalInfo, AdminPanelProvider, UserGrowthChart

### Community 7 - "Task & Session Migrations"
Cohesion: 0.17
Nodes (13): Browser Sessions Livewire View, My Profile Dynamic Component Registry, My Profile Page Blade, Passkey Action Livewire View, Passkey Authentication Script, Passkeys Livewire View, Passkey Registration Script, Personal Info Livewire View (+5 more)

### Community 9 - "Agenda Calendar Widget"
Cohesion: 0.27
Nodes (10): TaskFactory - Task Model Factory, Add Position to Tasks Table Migration (Flowforge), Alter Breezy Sessions Table Migration, Create Breezy Sessions Table Migration, Create Tasks Table Migration, Fix Tasks Table Schema Migration, Create Passkeys Table Migration, Create Users Table Migration (+2 more)

### Community 11 - "Custom Profile Livewire"
Cohesion: 0.25
Nodes (3): Expectation, OppositeExpectation, TestCase

### Community 12 - "Task Board"
Cohesion: 0.29
Nodes (7): Filament-Breezy Browser Sessions List Component, Filament-Breezy Clipboard Link Component, Cache Config, Database Config, Queue Config, Session Config, Database-backed Cache and Session

### Community 14 - "Task Factory"
Cohesion: 0.4
Nodes (5): Filament Shield Config, Spatie Permission Config, FilamentShield RoleResource, Spatie Permission 24h Cache Strategy, Spatie Permission Model

### Community 17 - "Agenda Factory"
Cohesion: 0.67
Nodes (3): App Config, Filesystems Config, Welcome Blade View

### Community 18 - "Activity Log Batch UUID Migration"
Cohesion: 0.67
Nodes (3): Logging Config, Mail Config, Services Config

### Community 19 - "Activity Log Event Migration"
Cohesion: 1.0
Nodes (3): Feature ExampleTest, Pest Bootstrap (Pest.php), Base TestCase

## Ambiguous Edges - Review These
- `Laravel 13 + Filament 5 Starter Kit` → `Monterrey Nuevo Leon Mexico Night Cityscape`  [AMBIGUOUS]
  public/img/image_nl_mty.jpg · relation: conceptually_related_to

## Knowledge Gaps
- **52 isolated node(s):** `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script`, `authenticateWithPasskey`, `TestCase` (+47 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **20 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **What is the exact relationship between `Laravel 13 + Filament 5 Starter Kit` and `Monterrey Nuevo Leon Mexico Night Cityscape`?**
  _Edge tagged AMBIGUOUS (relation: conceptually_related_to) - confidence is low._
- **Why does `User` connect `Project Config & Concepts` to `User Resource Schema & Table`, `Profile & Browser Sessions UI`, `Shield Permission Seeder`, `Session & Cache Config`, `Task Factory`?**
  _High betweenness centrality (0.093) - this node is a cross-community bridge._
- **Why does `CreateUser` connect `Project Config & Concepts` to `User Resource Pages`?**
  _High betweenness centrality (0.083) - this node is a cross-community bridge._
- **Why does `UserResourceTest` connect `User Resource Pages` to `Project Config & Concepts`, `Auth Config & Shield`?**
  _High betweenness centrality (0.077) - this node is a cross-community bridge._
- **What connects `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script` to the rest of the system?**
  _52 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Project Config & Concepts` be split into smaller, more focused modules?**
  _Cohesion score 0.06 - nodes in this community are weakly interconnected._
- **Should `User Resource Pages` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._