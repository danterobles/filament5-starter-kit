# Graph Report - .  (2026-05-06)

## Corpus Check
- 326 files · ~0 words
- Verdict: corpus is large enough that graph structure adds value.

## Summary
- 326 nodes · 261 edges · 91 communities (60 shown, 31 thin omitted)
- Extraction: 80% EXTRACTED · 20% INFERRED · 0% AMBIGUOUS · INFERRED: 52 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_User Resource & Policies|User Resource & Policies]]
- [[_COMMUNITY_Filament Panel Setup|Filament Panel Setup]]
- [[_COMMUNITY_Task Board & Kanban|Task Board & Kanban]]
- [[_COMMUNITY_Authentication & Sessions|Authentication & Sessions]]
- [[_COMMUNITY_Role & Permission Config|Role & Permission Config]]
- [[_COMMUNITY_Activity Logging|Activity Logging]]
- [[_COMMUNITY_Livewire Components|Livewire Components]]
- [[_COMMUNITY_User Widgets|User Widgets]]
- [[_COMMUNITY_Agenda Calendar Widget|Agenda Calendar Widget]]
- [[_COMMUNITY_Community 9|Community 9]]
- [[_COMMUNITY_Community 10|Community 10]]
- [[_COMMUNITY_Community 11|Community 11]]
- [[_COMMUNITY_Community 12|Community 12]]
- [[_COMMUNITY_Community 13|Community 13]]
- [[_COMMUNITY_Community 14|Community 14]]
- [[_COMMUNITY_Community 15|Community 15]]
- [[_COMMUNITY_Agenda Factory|Agenda Factory]]
- [[_COMMUNITY_Community 17|Community 17]]
- [[_COMMUNITY_Community 18|Community 18]]
- [[_COMMUNITY_Community 19|Community 19]]
- [[_COMMUNITY_Community 20|Community 20]]
- [[_COMMUNITY_Community 21|Community 21]]
- [[_COMMUNITY_Community 22|Community 22]]
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
- [[_COMMUNITY_Community 43|Community 43]]
- [[_COMMUNITY_Community 45|Community 45]]
- [[_COMMUNITY_Community 46|Community 46]]
- [[_COMMUNITY_Community 48|Community 48]]
- [[_COMMUNITY_Community 49|Community 49]]
- [[_COMMUNITY_Community 50|Community 50]]
- [[_COMMUNITY_Community 85|Community 85]]
- [[_COMMUNITY_Community 86|Community 86]]
- [[_COMMUNITY_Community 87|Community 87]]
- [[_COMMUNITY_Community 88|Community 88]]
- [[_COMMUNITY_Community 89|Community 89]]
- [[_COMMUNITY_Community 90|Community 90]]

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

## Communities (91 total, 31 thin omitted)

### Community 0 - "User Resource & Policies"
Cohesion: 0.1
Nodes (3): CreateUser, EditUser, ListUsers

### Community 1 - "Filament Panel Setup"
Cohesion: 0.16
Nodes (20): ActivityPolicy, AdminPanelProvider, AppServiceProvider, Application Bootstrap, Providers Bootstrap, CreateUser Page, CustomPersonalInfo Livewire Component, EditUser Page (+12 more)

### Community 2 - "Task Board & Kanban"
Cohesion: 0.11
Nodes (3): UserForm, UsersTable, UserResource

### Community 5 - "Activity Logging"
Cohesion: 0.21
Nodes (13): Artisan CLI Entrypoint, TaskFactory - Task Model Factory, Add Position to Tasks Table Migration (Flowforge), Alter Breezy Sessions Table Migration, Create Breezy Sessions Table Migration, Create Tasks Table Migration, Fix Tasks Table Schema Migration, Create Passkeys Table Migration (+5 more)

### Community 6 - "Livewire Components"
Cohesion: 0.17
Nodes (13): Browser Sessions Livewire View, My Profile Dynamic Component Registry, My Profile Page Blade, Passkey Action Livewire View, Passkey Authentication Script, Passkeys Livewire View, Passkey Registration Script, Personal Info Livewire View (+5 more)

### Community 7 - "User Widgets"
Cohesion: 0.25
Nodes (9): Auth Config, Filament Shield Config, Spatie Permission Config, FilamentShield RoleResource, User Model, Spatie Permission 24h Cache Strategy, Spatie Permission Model, Spatie Role Model (+1 more)

### Community 12 - "Community 12"
Cohesion: 0.29
Nodes (7): Filament-Breezy Browser Sessions List Component, Filament-Breezy Clipboard Link Component, Cache Config, Database Config, Queue Config, Session Config, Database-backed Cache and Session

### Community 22 - "Community 22"
Cohesion: 0.5
Nodes (4): Create Activity Log Table Migration, Add Batch UUID Column to Activity Log Migration, Add Event Column to Activity Log Migration, Filament Logger Plugin (Activity Log)

### Community 38 - "Community 38"
Cohesion: 0.67
Nodes (3): Project CLAUDE.md Guidelines, Laravel 13 + Filament 5 Starter Kit README, Vite Configuration

### Community 39 - "Community 39"
Cohesion: 1.0
Nodes (3): Create Permission Tables Migration (Spatie), Filament Shield Plugin (RBAC), ShieldSeeder - Filament Shield Roles/Permissions Seeder

### Community 40 - "Community 40"
Cohesion: 0.67
Nodes (3): Logging Config, Mail Config, Services Config

### Community 41 - "Community 41"
Cohesion: 0.67
Nodes (3): App Config, Filesystems Config, Welcome Blade View

### Community 42 - "Community 42"
Cohesion: 0.67
Nodes (3): Relaticle Flowforge BoardPage, Task Model, TaskBoard Page

### Community 43 - "Community 43"
Cohesion: 1.0
Nodes (3): Feature ExampleTest, Pest Bootstrap (Pest.php), Base TestCase

## Knowledge Gaps
- **49 isolated node(s):** `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script`, `authenticateWithPasskey`, `TestCase` (+44 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **31 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `UserResource` connect `Task Board & Kanban` to `User Resource & Policies`?**
  _High betweenness centrality (0.009) - this node is a cross-community bridge._
- **Are the 2 inferred relationships involving `User Model` (e.g. with `CustomPersonalInfo Livewire Component` and `UsersTable`) actually correct?**
  _`User Model` has 2 INFERRED edges - model-reasoned connections that need verification._
- **What connects `Controller`, `filament-breezy::livewire.passkeys.create-script`, `filament-breezy::livewire.passkeys.authenticate-script` to the rest of the system?**
  _49 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `User Resource & Policies` be split into smaller, more focused modules?**
  _Cohesion score 0.1 - nodes in this community are weakly interconnected._
- **Should `Task Board & Kanban` be split into smaller, more focused modules?**
  _Cohesion score 0.11 - nodes in this community are weakly interconnected._
- **Should `Authentication & Sessions` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._
- **Should `Role & Permission Config` be split into smaller, more focused modules?**
  _Cohesion score 0.14 - nodes in this community are weakly interconnected._