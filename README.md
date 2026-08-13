# Laravel 13 + Filament 5 — Starter Kit

Boilerplate de desarrollo acelerado para proyectos **Laravel 13** con panel de administración **Filament PHP 5**. Incluye autenticación completa, RBAC, gestión de usuarios, Kanban y calendario — todo listo para personalizar y escalar.

---

## Tabla de Contenidos

- [Stack](#stack)
- [Features](#features)
- [Arquitectura](#arquitectura)
- [Requerimientos](#requerimientos)
- [Instalación](#instalación)
- [Variables de entorno](#variables-de-entorno)
- [Guía de Personalización](#guía-de-personalización)
  - [Nombre y branding](#1-nombre-y-branding)
  - [Strings de navegación](#2-strings-de-navegación)
  - [Color primario](#3-color-primario)
  - [RBAC — Roles y permisos](#4-rbac--roles-y-permisos)
  - [Activar / desactivar features](#5-activar--desactivar-features)
  - [Agregar un Resource](#6-agregar-un-resource)
  - [Agregar un Cluster](#7-agregar-un-cluster)
- [Modelos](#modelos)
- [Autenticación](#autenticación)
- [Comandos frecuentes](#comandos-frecuentes)
- [Testing](#testing)
- [Despliegue](#despliegue)
- [Licencia](#licencia)

---

## Stack

| Capa | Tecnología | Versión |
|------|-----------|---------|
| Backend | [Laravel](https://laravel.com) | 13.x |
| Admin Panel | [Filament](https://filamentphp.com) | 5.x |
| Frontend reactivo | [Livewire](https://livewire.laravel.com) | 4.x |
| Estilos | [Tailwind CSS](https://tailwindcss.com) | 4.x |
| Testing | [Pest PHP](https://pestphp.com) | 4.x |
| Code style | [Laravel Pint](https://laravel.com/docs/pint) | 1.x |
| Runtime | PHP | 8.3+ |

### Plugins de Filament

| Plugin | Función | Versión |
|--------|---------|---------|
| [Filament Shield](https://filamentphp.com/plugins/bezhansalleh-shield) | RBAC — roles y permisos | ^4.2 |
| [Filament Breezy](https://filamentphp.com/plugins/jeffgreco-breezy) | Perfil, 2FA, passkeys, sesiones | ^3.1 |
| [Auth UI Enhancer](https://filamentphp.com/plugins/diogogpinto-auth-ui-enhancer) | Login con imagen lateral | ^2.0 |
| [Filament Logger](https://filamentphp.com/plugins/jacobtims-logger) | Log de actividad de usuarios | ^1.2 |
| [Apex Charts](https://filamentphp.com/plugins/leandrocfe-apex-charts) | Gráficas interactivas | ^5.0 |
| [FlowForge](https://filamentphp.com/plugins/relaticle-flowforge) | Kanban / Task Board | ^4.0 |
| [FullCalendar](https://filamentphp.com/plugins/saade-fullcalendar) | Calendario de eventos | ^4.0 |
| [Icon Picker](https://filamentphp.com/plugins/guava-icon-picker) | Selector de íconos Heroicons | ^5.0 |
| [Timeline View](https://filamentphp.com/plugins/devletes-timeline-view) | Vistas de línea de tiempo | ^1.0 |
| [FilaCheck](https://filamentphp.com/plugins/laraveldaily-filacheck) | Lint de código Filament | ^1.2 |

---

## Features

### Panel de administración (`/admin`)
- Login con imagen de fondo personalizable
- Búsqueda global con atajo de teclado (`Cmd/Ctrl + K`)
- Notificaciones de base de datos en tiempo real
- Sidebar colapsable en desktop

### Gestión de usuarios
- CRUD completo con validaciones (nombre, apellido, email, teléfono, avatar)
- Activar / desactivar usuario desde la página de edición
- Asignación de rol al crear o editar
- Búsqueda global por nombre, apellido y email
- Upload de avatar con editor circular (almacenado en `storage/avatars/`, visibilidad privada)
- Widgets en dashboard: estadísticas, tabla de últimos registros, gráfica de crecimiento mensual
- Navegación agrupada bajo `UsersCluster` con sub-navegación integrada

### Autenticación
- Login / Recuperación de contraseña
- **2FA (TOTP)** — autenticación de dos factores opcional
- **Passkeys** — autenticación sin contraseña (WebAuthn)
- Gestión de sesiones del navegador
- Página de perfil personalizable con campos adicionales

### RBAC (Filament Shield)
- Roles y permisos gestionados desde el panel
- Rol `super_admin` con bypass automático de todos los permisos
- Políticas para `Role` y `Activity` incluidas y con tests

### Task Board (Kanban)
- Tablero con columnas: **To Do**, **In Progress**, **Completed**
- Drag & drop con persistencia de posición
- Acceso controlado via permiso Shield (`page_TaskBoard`)

### Agenda / Calendario
- Vista de calendario mensual con eventos (FullCalendar)
- Vista de línea de tiempo simple y doble
- Modelo `Agenda` con soporte de eventos de todo el día, ubicación y color

---

## Arquitectura

```
app/
├── Filament/
│   ├── Clusters/
│   │   └── Users/
│   │       └── UsersCluster.php          # Cluster de navegación de usuarios
│   ├── Pages/
│   │   └── TaskBoard.php                 # Página Kanban (FlowForge)
│   ├── Resources/
│   │   └── Users/                        # Resource de usuarios
│   │       ├── Pages/                    # ListUsers, CreateUser, EditUser
│   │       ├── Schemas/UserForm.php      # Formulario reutilizable
│   │       ├── Tables/UsersTable.php     # Tabla reutilizable
│   │       └── Widgets/                  # UserStatsOverview, LatestUsersTable, UserGrowthChart
│   └── Widgets/                          # AgendaCalendarWidget, AgendaTimelineWidget (x2)
├── Livewire/
│   └── CustomPersonalInfo.php            # Campos extra en la página de perfil
├── Models/
│   ├── User.php                          # Usuario con roles, 2FA, avatar
│   ├── Task.php                          # Tarea del Kanban
│   └── Agenda.php                        # Evento del calendario
├── Policies/
│   ├── RolePolicy.php
│   └── ActivityPolicy.php
└── Providers/Filament/
    └── AdminPanelProvider.php            # Configuración central del panel

lang/
└── es/
    └── navigation.php                    # Strings de navegación personalizables

database/seeders/
└── ShieldSeeder.php                      # Roles y permisos iniciales (super_admin)
```

| URL | Descripción |
|-----|-------------|
| `/admin` | Panel de administración |
| `/admin/login` | Inicio de sesión |
| `/admin/user-management/users` | Gestión de usuarios (dentro del cluster) |
| `/admin/task-board` | Tablero Kanban |
| `/up` | Health check (nativo Laravel 13) |

---

## Requerimientos

- PHP 8.3+ (recomendado 8.4)
- Composer 2.x
- Node.js 20+ y npm 10+
- MySQL 8+ / PostgreSQL 15+ / SQLite 3.35+

---

## Instalación

```bash
# 1. Clonar
git clone https://github.com/tu-usuario/filament5-starter-kit.git mi-proyecto
cd mi-proyecto

# 2. Dependencias
composer install
npm install

# 3. Entorno
cp .env.example .env
php artisan key:generate

# 4. Base de datos
php artisan migrate

# 5. Permisos y rol super_admin (Shield)
php artisan db:seed --class=ShieldSeeder

# 6. Datos de demo (opcional)
php artisan db:seed

# 7. Assets
npm run build
```

Accede al panel en `http://localhost/admin`.

> **Primer acceso:** Crea el primer usuario desde `/admin/register` y asígnale el rol `super_admin` via Tinker:
> ```bash
> php artisan tinker --execute 'App\Models\User::first()->assignRole("super_admin");'
> ```

---

## Variables de entorno

Variables clave a configurar antes del primer deploy:

| Variable | Descripción | Default |
|----------|-------------|---------|
| `APP_NAME` | Nombre visible en el panel y emails | `Laravel` |
| `APP_URL` | URL pública de la aplicación | `http://localhost` |
| `APP_ENV` | Entorno (`local`, `production`) | `local` |
| `APP_DEBUG` | Mostrar stack traces | `true` |
| `DB_CONNECTION` | Driver (`sqlite`, `mysql`, `pgsql`) | `sqlite` |
| `FILESYSTEM_DISK` | Disco para avatares y uploads | `local` |

Para **producción**: `APP_ENV=production`, `APP_DEBUG=false`, y configura `FILESYSTEM_DISK=s3` si los avatares deben ser accesibles públicamente.

---

## Guía de Personalización

### 1. Nombre y branding

```dotenv
# .env
APP_NAME="Mi Aplicación"
```

El nombre se usa automáticamente en el panel, emails y el título del browser. El `AdminPanelProvider` ya lee `config('app.name')`.

**Imagen de login:** Reemplaza `public/img/image_nl_mty.jpg` con tu propia imagen y actualiza la referencia en `AdminPanelProvider.php`:

```php
AuthUIEnhancerPlugin::make()
    ->emptyPanelBackgroundImageUrl(asset('img/mi-imagen.jpg')),
```

---

### 2. Strings de navegación

Los textos del sidebar (grupos, etiquetas de recursos y páginas) se centralizan en:

```
lang/es/navigation.php
```

```php
return [
    'groups' => [
        'roles_permissions' => 'Roles y Permisos',  // ← grupo del cluster Users
        'management'        => 'Gestión',            // ← grupo del TaskBoard
        'settings'          => 'Configuración',
    ],
    'users' => [
        'navigation_label' => 'Usuarios',
    ],
    'task_board' => [
        'navigation_label' => 'Task Board',
        'title'            => 'Task Board',
    ],
];
```

PHP no permite llamar `__()` en declaraciones de propiedades estáticas. Para aplicar los strings en cualquier Resource o Page, sobreescribe el método en lugar de usar la propiedad:

```php
// ✗  No funciona en tiempo de definición de clase
protected static ?string $navigationLabel = __('navigation.users.navigation_label');

// ✓  Sobreescribir el método estático
public static function getNavigationLabel(): string
{
    return __('navigation.users.navigation_label');
}

public static function getNavigationGroup(): ?string
{
    return __('navigation.groups.roles_permissions');
}
```

`UsersCluster` y `TaskBoard` ya usan este patrón como referencia.

---

### 3. Color primario

En `app/Providers/Filament/AdminPanelProvider.php`:

```php
use Filament\Support\Colors\Color;

->colors([
    'primary' => Color::Sky,        // Azul cielo (default)
    // 'primary' => Color::Indigo,
    // 'primary' => Color::Emerald,
    // 'primary' => Color::hex('#e11d48'),
])
```

---

### 4. RBAC — Roles y permisos

Shield gestiona el acceso a todos los Resources, Pages y Widgets.

**Crear o editar roles:** Navega a `Roles y Permisos > Roles` en el panel.

**Regenerar permisos** tras agregar Resources o Pages:

```bash
php artisan shield:generate --all
```

**Rol `super_admin`:** Tiene acceso automático a todo via un gate "before". No necesita permisos individuales.

**Permisos del TaskBoard:** El permiso `page_TaskBoard` se incluye en `ShieldSeeder` para `super_admin`. Para otros roles, asígnalo desde el panel de Roles.

**Para cualquier Page personalizada:**

```php
// app/Filament/Pages/MiPagina.php
public static function canAccess(): bool
{
    return auth()->user()?->can('page_MiPagina') ?? false;
}
```

Luego agrega `page_MiPagina` al ShieldSeeder o asígnalo manualmente en el panel.

---

### 5. Activar / desactivar features

Los plugins se registran en `AdminPanelProvider.php` dentro de `->plugins([...])`. Para desactivar uno, comenta o elimina su entrada:

```php
->plugins([
    FilamentApexChartsPlugin::make(),
    // FilamentFullCalendarPlugin::make(),   // ← desactiva el calendario
    // FilamentLoggerPlugin::make(),          // ← desactiva el log de actividad
    FilamentShieldPlugin::make(),
    BreezyCore::make()...,
])
```

**FilamentInfoWidget** (muestra la versión de Filament) solo aparece en entorno `local`. En producción se oculta automáticamente.

**Widgets de Agenda:** Se registran en `->widgets([...])` del `AdminPanelProvider`. Para desactivarlos elimínalos del array.

**TaskBoard:** Para desactivarlo, elimina `TaskBoard.php` o sobreescribe `canAccess()` retornando `false`.

---

### 6. Agregar un Resource

```bash
# Crea el Resource con CRUD completo a partir del modelo
php artisan make:filament-resource NombreModelo --generate --no-interaction
```

El Resource se descubre automáticamente via `discoverResources()`. Para asignarlo al cluster de usuarios:

```php
// En el Resource generado:
protected static ?string $cluster = \App\Filament\Clusters\Users\UsersCluster::class;
```

Para agruparlo en un grupo de navegación sin cluster:

```php
public static function getNavigationGroup(): ?string
{
    return __('navigation.groups.management');
}
```

---

### 7. Agregar un Cluster

Un **Cluster** agrupa Resources y Pages bajo un único ítem en el sidebar con sub-navegación integrada.

```bash
php artisan make:filament-cluster NombreCluster --no-interaction
```

Filament crea el cluster en `app/Filament/Clusters/NombreCluster/`. Edita el archivo generado:

```php
class NombreCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $slug = 'mi-cluster';  // controla el prefijo de URL

    public static function getNavigationLabel(): string
    {
        return __('navigation.groups.mi_cluster');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.groups.mi_grupo');
    }
}
```

Asigna el cluster en cada Resource o Page:

```php
protected static ?string $cluster = \App\Filament\Clusters\NombreCluster\NombreCluster::class;
```

> **Nota de URLs:** Cuando el slug del cluster y el slug del resource coinciden (ej. `users/users`), ajusta `protected static ?string $slug` en el cluster para diferenciarlos.

---

## Modelos

### `User`

| Campo | Tipo | Notas |
|-------|------|-------|
| `name` | string | Nombre |
| `last` | string | Apellido |
| `email` | string | Único |
| `phone` | string\|null | Teléfono |
| `avatar_url` | string\|null | Path en storage |
| `password` | string | Hash bcrypt |
| `active` | boolean | Controla acceso al panel |
| `full_name` | virtual | Accessor `name + last` |

Traits: `HasRoles` (Spatie), `TwoFactorAuthenticatable` (Breezy), `HasFactory`, `Notifiable`

### `Task`

| Campo | Tipo | Notas |
|-------|------|-------|
| `title` | string | Título |
| `description` | string\|null | Descripción |
| `status` | string | `todo` · `in_progress` · `completed` |
| `position` | integer | Orden en la columna Kanban |
| `user_id` | foreignId | Usuario asignado |

### `Agenda`

| Campo | Tipo | Notas |
|-------|------|-------|
| `title` | string | Título del evento |
| `description` | string\|null | Descripción |
| `start_date` | datetime | Inicio |
| `end_date` | datetime | Fin |
| `all_day` | boolean | Evento de todo el día |
| `color` | string\|null | Color en el calendario |
| `location` | string\|null | Ubicación |

---

## Autenticación

| Feature | URL | Notas |
|---------|-----|-------|
| Login | `/admin/login` | Imagen lateral configurable |
| Recuperar contraseña | `/admin/password-reset` | Requiere `MAIL_*` configurado |
| Perfil | `/admin/my-profile` | Nombre, apellido, teléfono, avatar |
| 2FA (TOTP) | Desde perfil | Compatible con Google Authenticator, Authy |
| Passkeys | Desde perfil | WebAuthn sin contraseña |
| Sesiones | Desde perfil | Lista y cierre de sesiones activas |

**Control de acceso:** `User::canAccessPanel()` retorna `false` cuando `active = false`, bloqueando el acceso sin eliminar la cuenta.

---

## Comandos frecuentes

```bash
# Desarrollo (servidor + queue + vite en paralelo)
composer run dev

# Compilar assets para producción
npm run build

# Regenerar permisos Shield tras agregar Resources o Pages
php artisan shield:generate --all

# Crear entidades Filament
php artisan make:filament-resource NombreModelo --generate --no-interaction
php artisan make:filament-page NombrePagina --no-interaction
php artisan make:filament-cluster NombreCluster --no-interaction

# Listar rutas del panel
php artisan route:list --path=admin --except-vendor

# Code style
vendor/bin/pint

# Lint de código Filament (detecta patrones obsoletos)
vendor/bin/filacheck --fix
```

---

## Testing

```bash
# Suite completa
php artisan test --compact

# Filtrar por archivo
php artisan test --compact --filter=UserResourceTest
php artisan test --compact --filter=RolePolicyTest
```

**Cobertura incluida:**

| Test | Cubre |
|------|-------|
| `UserResourceTest` | CRUD, validaciones, búsqueda, activar/desactivar |
| `RolePolicyTest` | Políticas RBAC para roles (viewAny, create, update, delete) |
| `ActivityPolicyTest` | Políticas RBAC para log de actividad |
| `UserStatsOverviewTest` | Widget de estadísticas renderiza correctamente |

---

## Despliegue

El endpoint `/up` responde `200 OK` cuando la app arranca correctamente (nativo Laravel 13). Úsalo en load balancers, Kubernetes o servicios de uptime monitoring.

```bash
# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

Variables de producción críticas:

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com
FILESYSTEM_DISK=s3
```

Compatible con [Laravel Cloud](https://cloud.laravel.com/), Laravel Forge y cualquier servidor con PHP 8.3+.

---

## Licencia

[MIT](https://opensource.org/licenses/MIT)
