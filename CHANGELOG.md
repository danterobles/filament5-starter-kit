# Changelog

Todos los cambios notables de este proyecto se documentan en este archivo.

El formato sigue las convenciones de [Keep a Changelog](https://keepachangelog.com/es-ES/1.1.0/).
Este starter kit no publica releases con versión semántica (es una base de proyecto en evolución
continua, no una librería versionada), así que las entradas se agrupan por fecha en vez de por
número de versión.

## 2026-08-14

### Fixed
- 5 vulnerabilidades reportadas por `npm audit` (3 high, 2 critical) en la cadena de Vite
  (`vite`, `launch-editor`, `shell-quote` vía `concurrently`) — dependencias de desarrollo,
  sin impacto en el bundle de producción.

### Added
- Archivo `LICENSE` (MIT), enlazado desde el README.

## 2026-08-13

### Security
- Cerrados 3 vectores de escalación de privilegios: un usuario sin `super_admin` podía
  auto-asignarse ese rol vía el formulario de edición de usuario, mutar el `status` de tareas
  ajenas en masa sin `Update:Task`, y reasignar tareas propias o ajenas a cualquier usuario sin
  restricción.
- Cerrado IDOR potencial y agregadas guardas de auto-eliminación / auto-degradación: un usuario
  ya no puede borrar su propia cuenta desde el panel, y el único `super_admin` restante no puede
  quitarse ese rol a sí mismo.
- La contraseña sembrada del usuario admin (`demo`) ahora queda restringida a entornos
  `local`/`testing`.

### Added
- Cobertura de tests para TaskBoard (Kanban), `CustomPersonalInfo`, notificaciones y widgets
  que estaban en cero.
- Índices de base de datos en `tasks.status` y `agendas.start_date`.
- Acción "Ver tarea" en el recordatorio de tarea asignada, y `ViewAction` en las tablas de
  Tasks/Agendas (antes solo Users la tenía).
- `AgendaResource` agrupado bajo "Gestión" en el sidebar, junto a Tasks.
- Widget de tareas vencidas/por vencer en el Dashboard (antes solo mostraba widgets de Agenda).
- Notificación de tarea asignada extraída a una clase `App\Notifications\TaskAssignedNotification`
  dedicada e implementando `ShouldQueue`.

### Changed
- Migración de `guava/filament-icon-picker` a `^5.0`.
- Eager-loading agregado a `AgendasTable`; `UserStatsOverview` reemplaza una query cruda por la
  API de relaciones de Spatie.
- ~12 closures sin tipar en recursos de Filament ganan type hints explícitos.
- 11 archivos con violaciones de Pint pre-existentes corregidos.

### Fixed
- Bug real en `LatestUsersTable`: el widget decía mostrar 10 usuarios pero la paginación de
  Filament exponía todos — ahora respeta el límite.

### Removed
- Referencias a Openpay en el README y configuración huérfana (`config/services.php`,
  `.env.example`) que quedaron tras remover el SDK.

## 2026-08-12

### Removed
- SDK de pagos de Openpay (se había integrado el 2026-05-12; se retira por no ser necesario
  para el starter kit — puede reincorporarse en una versión futura si aplica).

## 2026-07-20

### Added
- Notificación de recordatorio al crear una tarea asignada.
- Alcance de `Task` y `Agenda` por usuario propietario (`OwnedByUserScope`).

### Fixed
- Brecha de RBAC en los resources de Task, Agenda y User.
- Orden de seeders: los roles/permisos de Shield ahora se siembran antes de crear el usuario
  admin (evitaba que el admin quedara sin rol si el seeder se interrumpía a medias).

### Changed
- Las 3 migraciones de `tasks` se unificaron en una sola.

## 2026-05-25 — Plan Junio

### Added
- `AgendaResource` con CRUD completo y tests.
- `TaskResource` con listado tabular, filtros y acciones masivas.

### Removed
- Dependencias externas sin uso y código comentado.

## 2026-05-19

### Added
- Navegación por clusters, strings de idioma, activación del TaskBoard.

### Changed
- Consistencia de formato de teléfono en formularios.
- Polling de widgets reducido; dependencia de avatar externo removida;
  `FilamentInfoWidget` restringido a entorno local.

### Docs
- README reescrito con guía de personalización y variables de entorno de Openpay
  (removidas posteriormente el 2026-08-13).

## 2026-05-12

### Added
- Integración del SDK de Openpay para pagos (removida el 2026-08-12).

## 2026-05-07

### Added
- Plugin de Timeline (`devletes/filament-timeline-view`).

### Changed
- Mejoras de rendimiento; código y grafos sin uso removidos.

## 2026-05-06

### Added
- Plugin de selector de íconos (`guava/filament-icon-picker`).
- Widget de FullCalendar con datos de ejemplo sobre el modelo `Agenda`.

## 2026-05-05

### Added
- Plugin de FullCalendar (`saade/filament-fullcalendar`).

## 2026-05-04

### Added
- Modelo `Task` y plugin de tablero Kanban (`relaticle/flowforge`).
- Herramienta de grafo de conocimiento del código (graphify) para búsquedas asistidas.

## 2026-04-28

### Added
- Gestión de usuarios y roles del starter kit.
- Plugin de gráficas Apex Charts.
- Plugin Auth UI Enhancer (imagen lateral en login).
- `laraveldaily/filacheck` para linting de código Filament.

## 2026-04-25

### Added
- RBAC basado en `bezhansalleh/filament-shield` (Spatie Permissions).
- Seeder del usuario administrador.

## 2026-04-20

### Added
- Plugin de Activity Log (`jacobtims/filament-logger`).
- Plugin Breezy (perfil, 2FA, passkeys) con tema personalizado.

## 2026-04-17

### Added
- Commit inicial del starter kit: Laravel 13 + Filament 5, `FilamentUser` en el modelo `User`.
