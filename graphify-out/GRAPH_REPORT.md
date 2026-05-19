# Graph Report - .  (2026-05-19)

## Corpus Check
- Corpus is ~31,828 words - fits in a single context window. You may not need a graph.

## Summary
- 551 nodes · 578 edges · 78 communities (60 shown, 18 thin omitted)
- Extraction: 83% EXTRACTED · 17% INFERRED · 0% AMBIGUOUS · INFERRED: 97 edges (avg confidence: 0.84)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- [[_COMMUNITY_Blade Views Best Practices|Blade Views Best Practices]]
- [[_COMMUNITY_Composer Dependencies & Autoloading|Composer Dependencies & Autoloading]]
- [[_COMMUNITY_Architecture Best Practices|Architecture Best Practices]]
- [[_COMMUNITY_Error Handling Patterns|Error Handling Patterns]]
- [[_COMMUNITY_Advanced Query Patterns|Advanced Query Patterns]]
- [[_COMMUNITY_Database Migrations & Permissions|Database Migrations & Permissions]]
- [[_COMMUNITY_Filament Admin Panel & Plugins|Filament Admin Panel & Plugins]]
- [[_COMMUNITY_Agenda Calendar & Widgets|Agenda Calendar & Widgets]]
- [[_COMMUNITY_Openpay Payment Service|Openpay Payment Service]]
- [[_COMMUNITY_Claude AI & Project Docs|Claude AI & Project Docs]]
- [[_COMMUNITY_Task Board & Kanban|Task Board & Kanban]]
- [[_COMMUNITY_Filament Shield RBAC|Filament Shield RBAC]]
- [[_COMMUNITY_Service Providers & Livewire|Service Providers & Livewire]]
- [[_COMMUNITY_Composer Required Packages|Composer Required Packages]]
- [[_COMMUNITY_Role Authorization Policies|Role Authorization Policies]]
- [[_COMMUNITY_Activity Authorization Policies|Activity Authorization Policies]]
- [[_COMMUNITY_User Resource & Tables|User Resource & Tables]]
- [[_COMMUNITY_Frontend Build Tools|Frontend Build Tools]]
- [[_COMMUNITY_User Resource Pages & Widgets|User Resource Pages & Widgets]]
- [[_COMMUNITY_Laravel Boost MCP Config|Laravel Boost MCP Config]]
- [[_COMMUNITY_Shield Seeder & Permissions|Shield Seeder & Permissions]]
- [[_COMMUNITY_Edit User Page|Edit User Page]]
- [[_COMMUNITY_Create User Page|Create User Page]]
- [[_COMMUNITY_User Model|User Model]]
- [[_COMMUNITY_User Growth Chart Widget|User Growth Chart Widget]]
- [[_COMMUNITY_Claude Settings & Permissions|Claude Settings & Permissions]]
- [[_COMMUNITY_MCP Servers Config|MCP Servers Config]]
- [[_COMMUNITY_Activity Log Migrations|Activity Log Migrations]]
- [[_COMMUNITY_User Form Schema|User Form Schema]]
- [[_COMMUNITY_Claude Hooks Config|Claude Hooks Config]]
- [[_COMMUNITY_App Config Files|App Config Files]]
- [[_COMMUNITY_Database Seeder|Database Seeder]]
- [[_COMMUNITY_Base Controller|Base Controller]]
- [[_COMMUNITY_Web Routes & Feature Test|Web Routes & Feature Test]]
- [[_COMMUNITY_Cache Table Migration Concept|Cache Table Migration Concept]]
- [[_COMMUNITY_Jobs Table Migration Concept|Jobs Table Migration Concept]]
- [[_COMMUNITY_Bootstrap Application|Bootstrap Application]]
- [[_COMMUNITY_Unit Test Example|Unit Test Example]]
- [[_COMMUNITY_Console Routes Concept|Console Routes Concept]]

## God Nodes (most connected - your core abstractions)
1. `OpenpayService` - 23 edges
2. `User` - 20 edges
3. `UserResource` - 20 edges
4. `require` - 15 edges
5. `config` - 15 edges
6. `RolePolicy` - 14 edges
7. `ActivityPolicy` - 14 edges
8. `Queue and Job Best Practices` - 12 edges
9. `require-dev` - 10 edges
10. `ListUsers` - 10 edges

## Surprising Connections (you probably didn't know these)
- `UserResourceTest` --conceptually_related_to--> `Skill: pest-testing`  [INFERRED]
  tests/Feature/UserResourceTest.php → .claude/skills/pest-testing/SKILL.md
- `RolePolicyTest` --conceptually_related_to--> `Skill: pest-testing`  [INFERRED]
  tests/Feature/Policies/RolePolicyTest.php → .claude/skills/pest-testing/SKILL.md
- `ActivityPolicyTest` --conceptually_related_to--> `Skill: pest-testing`  [INFERRED]
  tests/Feature/Policies/ActivityPolicyTest.php → .claude/skills/pest-testing/SKILL.md
- `UserStatsOverviewTest` --conceptually_related_to--> `Skill: pest-testing`  [INFERRED]
  tests/Feature/Widgets/UserStatsOverviewTest.php → .claude/skills/pest-testing/SKILL.md
- `Widget Performance (polling/cache)` --conceptually_related_to--> `UserStatsOverviewTest`  [INFERRED]
  MEJORAS_MAYO.md → tests/Feature/Widgets/UserStatsOverviewTest.php

## Hyperedges (group relationships)
- **Tasks table migration chain** — migrations_create_tasks_table, migrations_fix_tasks_table_schema, migrations_add_position_to_tasks_table [EXTRACTED 1.00]
- **Activity log migration chain** — migrations_create_activity_log_table, migrations_add_event_column_to_activity_log_table, migrations_add_batch_uuid_column_to_activity_log_table [EXTRACTED 1.00]
- **Breezy sessions migration chain** — migrations_create_breezy_sessions_table, migrations_alter_breezy_sessions_table, migrations_create_passkeys_table [EXTRACTED 1.00]
- **RBAC Stack (Shield + Spatie Permission)** — concept_filament_shield, concept_spatie_permission, migrations_create_permission_tables, seeders_shield_seeder, concept_super_admin_role [INFERRED 0.95]
- **UserResource MVC Cluster** — users_userresource_userresource, schemas_userform_userform, tables_userstable_userstable, pages_listusers_listusers, pages_edituser_edituser, pages_createuser_createuser, widgets_usergrowthchart_usergrowthchart, widgets_latestuserstable_latestuserstable, widgets_userstatsoverview_userstatsoverview [EXTRACTED 1.00]
- **User Model Data Consumers** — widgets_usergrowthchart_usergrowthchart, widgets_latestuserstable_latestuserstable, widgets_userstatsoverview_userstatsoverview, tables_userstable_userstable, schemas_userform_userform [INFERRED 0.85]
- **Registered Service Providers** — bootstrap_providers_providers, providers_appserviceprovider_appserviceprovider, filament_adminpanelprovider_adminpanelprovider [EXTRACTED 1.00]
- **Agenda Widgets Group** — widgets_agendatimelinewidget_agendatimelinewidget, widgets_agendadoublesidedtimelinewidget_agendadoublesidedtimelinewidget, widgets_agendacalendarwidget_agendacalendarwidget [INFERRED 0.95]
- **Database-backed Services** — config_session_sessionconfig, config_queue_queueconfig, config_cache_cacheconfig, config_database_databaseconfig [INFERRED 0.85]
- **RBAC Permission System** — config_filament_shield_filamentshieldconfig, config_permission_permissionconfig, concept_filament_shield_rbac, concept_spatie_permission [EXTRACTED 1.00]
- **Full Pest Test Suite** — tests_testcase_testcase, tests_unit_exampletest_example_unit_test, tests_feature_exampletest_example_feature_test, tests_feature_usermodeltest_usermodeltest, tests_feature_userresourcetest_userresourcetest, tests_feature_policies_rolepolicytest_rolepolicytest, tests_feature_policies_activitypolicytest_activitypolicytest, tests_feature_widgets_userstatsoverviewtest_userstatsoverviewtest [INFERRED 0.95]
- **Claude Code Skills Bundle** — skills_tailwindcss_skill, skills_pest_testing_skill, skills_flowforge_skill, skills_laravel_best_practices_skill, skills_laravel_best_practices_routing, skills_laravel_best_practices_scheduling, skills_laravel_best_practices_migrations [EXTRACTED 1.00]
- **Policy Test Coverage** — tests_feature_policies_rolepolicytest_rolepolicytest, tests_feature_policies_activitypolicytest_activitypolicytest, concept_test_coverage_plan [EXTRACTED 1.00]
- **Laravel Best Practices Skill Rules** — rules_architecture_architecture_best_practices, rules_db_performance_db_performance_best_practices, rules_collections_collection_best_practices, rules_caching_caching_best_practices, rules_eloquent_eloquent_best_practices, rules_validation_validation_best_practices, rules_blade_views_blade_best_practices, rules_queue_jobs_queue_best_practices, rules_testing_testing_best_practices, rules_config_config_best_practices, rules_style_conventions_style, rules_mail_mail_best_practices, rules_http_client_http_client_best_practices, rules_error_handling_error_handling_best_practices, rules_events_notifications_events_notifications_best_practices, rules_advanced_queries_advanced_query_patterns, rules_security_security_best_practices [EXTRACTED 1.00]
- **Security Triad: Input Validation, Authorization, Output Escaping** — rules_security_mass_assignment_protection, rules_security_authorize_every_action, rules_security_prevent_sql_injection, rules_security_escape_output_xss, rules_security_csrf_protection, rules_validation_form_request_classes, rules_validation_validated_method [INFERRED 0.85]
- **N+1 Query Prevention Patterns** — rules_db_performance_eager_loading, rules_db_performance_prevent_lazy_loading, rules_db_performance_withcount, rules_advanced_queries_set_relation_circular, rules_advanced_queries_wherein_over_wherehas [INFERRED 0.85]
- **Queue and Transaction Safety Patterns** — rules_events_notifications_should_dispatch_after_commit, rules_events_notifications_after_commit_notifications, rules_mail_after_commit_mailable, rules_queue_jobs_should_be_unique, rules_queue_jobs_retry_after_timeout [INFERRED 0.85]
- **Caching Strategy Patterns** — rules_caching_cache_remember, rules_caching_cache_flexible, rules_caching_cache_memo, rules_caching_once_memoization, rules_caching_cache_add_atomic, rules_architecture_atomic_locks [INFERRED 0.85]

## Communities (78 total, 18 thin omitted)

### Community 0 - "Blade Views Best Practices"
Cohesion: 0.05
Nodes (42): $attributes->merge() in Components, @aware for Deeply Nested Component Props, Blade and Views Best Practices, Blade Components Over @include, Blade Fragments for Partial Re-Renders, @pushOnce for Per-Component Scripts, View Composers for Shared View Data, App::environment() for Environment Checks (+34 more)

### Community 1 - "Composer Dependencies & Autoloading"
Cohesion: 0.05
Nodes (38): autoload, autoload-dev, psr-4, psr-4, description, extra, laravel, keywords (+30 more)

### Community 2 - "Architecture Best Practices"
Cohesion: 0.07
Nodes (33): Architecture Best Practices, Atomic Locks for Race Conditions, Code to Interfaces, Concurrency::run() for Parallel Execution, Context Facade for Request-Scoped Data, Convention Over Configuration, defer() for Post-Response Work, Dependency Injection (+25 more)

### Community 3 - "Error Handling Patterns"
Cohesion: 0.08
Nodes (28): Add Context to Exception Classes, dontReportDuplicates() for Duplicate Exception Prevention, Error Handling Best Practices, Exception Reporting and Rendering, Force JSON Error Rendering for API Routes, ShouldntReport for Silent Exceptions, Throttle High-Volume Exceptions, afterCommit() on Notifications in Transactions (+20 more)

### Community 4 - "Advanced Query Patterns"
Cohesion: 0.11
Nodes (24): addSelect() Subqueries for Has-Many Values, Advanced Query Patterns, Compound Indexes Matching orderBy Column Order, Conditional Aggregates Instead of Multiple Count Queries, Correlated Subqueries for Has-Many Ordering, Dynamic Relationships via Subquery FK, setRelation() to Prevent Circular N+1, whereIn Subquery Over whereHas (+16 more)

### Community 5 - "Database Migrations & Permissions"
Cohesion: 0.10
Nodes (12): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages, CreateActivityLogTable (+4 more)

### Community 6 - "Filament Admin Panel & Plugins"
Cohesion: 0.11
Nodes (17): Agendas / Calendar Feature, Filament Admin Panel, Filament Breezy (Auth/2FA/Passkeys), FlowForge Kanban (relaticle/flowforge), Laravel Boost (Dev Tooling), Laravel Boost MCP Server, Openpay Payment SDK, TailwindCSS v4 (+9 more)

### Community 7 - "Agenda Calendar & Widgets"
Cohesion: 0.10
Nodes (7): Agenda Full Calendar Widget, Agenda Timeline Views, AgendaFactory, Agenda, AgendaCalendarWidget, AgendaDoubleSidedTimelineWidget, AgendaTimelineWidget

### Community 8 - "Openpay Payment Service"
Cohesion: 0.16
Nodes (3): Openpay Payment Gateway Integration, ServicesConfig, OpenpayService

### Community 9 - "Claude AI & Project Docs"
Cohesion: 0.16
Nodes (19): CLAUDE.md (project instructions), SoftDeletes Bug (etapa 1), Test Coverage Plan (etapa 2), Widget Performance (polling/cache), Plan de Mejoras Mayo 2026, README — Starter Kit, Skill: flowforge-development, Rule: migrations (+11 more)

### Community 10 - "Task Board & Kanban"
Cohesion: 0.11
Nodes (5): Task Board Kanban, TaskFactory, UserFactory, Task, TaskBoard

### Community 11 - "Filament Shield RBAC"
Cohesion: 0.12
Nodes (17): Filament Shield (RBAC), Filament Shield RBAC, Spatie Laravel Permission, super_admin Role, AuthConfig, CacheConfig, DatabaseConfig, FilamentLoggerConfig (+9 more)

### Community 12 - "Service Providers & Livewire"
Cohesion: 0.16
Nodes (4): Providers Bootstrap, AdminPanelProvider, CustomPersonalInfo, AppServiceProvider

### Community 13 - "Composer Required Packages"
Cohesion: 0.13
Nodes (15): require, bezhansalleh/filament-shield, devletes/filament-timeline-view, diogogpinto/filament-auth-ui-enhancer, filament/filament, guava/filament-icon-picker, jacobtims/filament-logger, jeffgreco13/filament-breezy (+7 more)

### Community 17 - "Frontend Build Tools"
Cohesion: 0.15
Nodes (12): devDependencies, concurrently, laravel-vite-plugin, tailwindcss, @tailwindcss/vite, vite, private, $schema (+4 more)

### Community 18 - "User Resource Pages & Widgets"
Cohesion: 0.18
Nodes (3): ListUsers, LatestUsersTable, UserStatsOverview

### Community 19 - "Laravel Boost MCP Config"
Cohesion: 0.25
Nodes (7): agents, guidelines, mcp, nightwatch_mcp, packages, sail, skills

### Community 25 - "Claude Settings & Permissions"
Cohesion: 0.40
Nodes (4): permissions, allow, Claude Project Settings (hooks), Graphify PreToolUse Hook

### Community 26 - "MCP Servers Config"
Cohesion: 0.40
Nodes (4): args, command, mcpServers, laravel-boost

### Community 27 - "Activity Log Migrations"
Cohesion: 0.83
Nodes (4): Spatie Activity Log, AddBatchUuidColumnToActivityLogTable Migration, AddEventColumnToActivityLogTable Migration, CreateActivityLogTable Migration

### Community 30 - "App Config Files"
Cohesion: 0.67
Nodes (3): AppConfig, FilesystemsConfig, MailConfig

## Knowledge Gaps
- **154 isolated node(s):** `command`, `args`, `agents`, `guidelines`, `mcp` (+149 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **18 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `User` connect `User Model` to `Task Board & Kanban`, `Service Providers & Livewire`, `Role Authorization Policies`, `Activity Authorization Policies`, `User Resource & Tables`, `User Resource Pages & Widgets`, `Edit User Page`, `Create User Page`, `User Growth Chart Widget`, `User Form Schema`?**
  _High betweenness centrality (0.135) - this node is a cross-community bridge._
- **Why does `config` connect `Database Migrations & Permissions` to `Composer Dependencies & Autoloading`, `Service Providers & Livewire`?**
  _High betweenness centrality (0.112) - this node is a cross-community bridge._
- **Why does `AdminPanelProvider` connect `Service Providers & Livewire` to `User Model`?**
  _High betweenness centrality (0.098) - this node is a cross-community bridge._
- **Are the 5 inferred relationships involving `User` (e.g. with `AdminPanelProvider` and `CustomPersonalInfo`) actually correct?**
  _`User` has 5 INFERRED edges - model-reasoned connections that need verification._
- **Are the 10 inferred relationships involving `config` (e.g. with `.up()` and `.down()`) actually correct?**
  _`config` has 10 INFERRED edges - model-reasoned connections that need verification._
- **What connects `command`, `args`, `agents` to the rest of the system?**
  _156 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Blade Views Best Practices` be split into smaller, more focused modules?**
  _Cohesion score 0.0545876887340302 - nodes in this community are weakly interconnected._