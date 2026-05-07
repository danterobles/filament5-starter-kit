# Plan de Mejoras — Mayo 2026

Diagnóstico basado en análisis del grafo de conocimiento (graphify) + revisión de código.
Stack: PHP 8.3 · Laravel 13 · Filament v5 · Livewire 4 · Pest 4

---

## Resumen Ejecutivo

| Etapa | Área | Impacto | Riesgo | Esfuerzo |
|-------|------|---------|--------|----------|
| 1 | Bug crítico: SoftDeletes | Alto | Bajo | 1 día |
| 2 | Cobertura de tests | Alto | Bajo | ✅ |
| 3 | Rendimiento de widgets | Medio | Bajo | ✅ |
| 4 | Limpieza de código | Bajo-Medio | Bajo | ✅ |
| 5 | Features incompletas | Medio | Medio | ✅ |

---

## Etapa 1 — Bug Crítico: SoftDeletes ✅ RESUELTO

### Solución aplicada
Se optó por **eliminar** las acciones SoftDelete en lugar de implementarlas,
ya que la funcionalidad no se usa en el proyecto.

Archivos modificados:
- `app/Filament/Resources/Users/Pages/EditUser.php` — eliminados `ForceDeleteAction`, `RestoreAction` e imports
- `app/Filament/Resources/Users/Tables/UsersTable.php` — eliminados `ForceDeleteBulkAction`, `RestoreBulkAction` e imports

---

## Etapa 2 — Cobertura de Tests con Pest

### Problema
El proyecto tiene únicamente `Feature/ExampleTest.php` y `Unit/ExampleTest.php` como stubs.
Cero cobertura real sobre los módulos centrales identificados por el grafo:
`UserResource` (12 aristas), `RolePolicy` / `ActivityPolicy` (13 aristas c/u), `User Model` (13 aristas).

### 2.1 — Tests de UserResource (CRUD)

Archivo: `tests/Feature/UserResourceTest.php`

Cubrir:
- Listar usuarios (tabla visible, paginación)
- Crear usuario con rol asignado → verificar `model_has_roles`
- Editar usuario → sincronización de rol via `afterSave()`
- Toggle activo/inactivo desde `EditUser` header action
- Validaciones del formulario (email único, contraseña mínimo 8 chars)
- Búsqueda global por `name`, `last`, `email`
- Eliminación con SoftDelete (después de Etapa 1)
- Restaurar usuario eliminado (después de Etapa 1)

### 2.2 — Tests de Políticas

Archivo: `tests/Feature/Policies/ActivityPolicyTest.php`
Archivo: `tests/Feature/Policies/RolePolicyTest.php`

Cubrir:
- `viewAny`, `view`, `create`, `update`, `delete` para cada política
- Verificar que usuarios sin permiso reciben `false`
- Verificar que `super_admin` tiene acceso completo via Shield

### 2.3 — Tests del Modelo User

Archivo: `tests/Unit/UserTest.php`

Cubrir:
- `getFullNameAttribute()` combina `name` + `last` correctamente
- `getFilamentAvatarUrl()` retorna `null` cuando no hay avatar
- `canAccessPanel()` retorna `false` para usuarios inactivos
- Relación `roles` via Spatie

### 2.4 — Tests de Widgets

Archivo: `tests/Feature/Widgets/UserStatsOverviewTest.php`

Cubrir:
- Widget renderiza sin errores
- Stats reflejan conteos correctos con factory data

---

## Etapa 3 — Rendimiento de Widgets

### Problema
`UserStatsOverview` y `UserGrowthChart` ejecutan queries DB cada 10 segundos por polling.
`UserResource::getNavigationBadge()` ejecuta `User::count()` en cada carga de página.
`UserGrowthChart` usa `DATE_FORMAT()` que es MySQL-specific — fallará en entorno SQLite (tests).

### 3.1 — Reducir polling o agregar caché

```php
// UserStatsOverview.php y UserGrowthChart.php
// Cambiar de 10s a null (sin polling) o 60s mínimo
protected ?string $pollingInterval = null;
```

Si el polling es necesario, cachear los resultados:
```php
protected function getStats(): array
{
    return Cache::remember('user_stats_overview', 60, fn () => $this->computeStats());
}
```

### 3.2 — Cachear navigation badge

```php
// UserResource.php
public static function getNavigationBadge(): ?string
{
    return Cache::remember('users_count_badge', 30, fn () => static::getModel()::count());
}
```

### 3.3 — Compatibilidad SQLite en UserGrowthChart

`DATE_FORMAT(created_at, '%Y-%m')` es MySQL-only. Reemplazar con:
```php
use Illuminate\Support\Facades\DB;

$results = User::selectRaw("strftime('%Y-%m', created_at) as month_key, COUNT(*) as count")
    // SQLite
```

O usar la abstracción de Laravel:
```php
->selectRaw("strftime('%Y-%m', created_at) as month_key, COUNT(*) as count")
```

Considerar usar `DB::connection()->getDriverName()` para detectar el driver,
o migrar a una query compatible con ambos usando Carbon para el procesamiento en PHP.

---

## Etapa 4 — Limpieza de Código

### Problema
El grafo detectó 55 nodos aislados y múltiples comunidades con cohesión baja (0.10-0.17).
Parte de esto se debe a código comentado y patrones desactualizados que fragmentan la lectura.

### 4.1 — Eliminar código comentado

Archivos con código comentado a limpiar:

| Archivo | Líneas | Descripción |
|---------|--------|-------------|
| `app/Models/User.php` | 6, 60-64 | `MustVerifyEmail`, bloque `canAccessPanel` comentado |
| `app/Filament/Resources/Users/UserResource.php` | 31 | `$recordTitleAttribute` comentado |
| `app/Filament/Resources/Users/Schemas/UserForm.php` | 121 | `->options()` alternativa comentada |
| `app/Providers/Filament/AdminPanelProvider.php` | 55 | `TaskBoard::class` comentado |
| `app/Filament/Resources/Users/Pages/CreateUser.php` | 21 | `getUrl('edit')` comentado |

### 4.2 — Modernizar accessor `full_name`

El patrón `getFullNameAttribute()` es Laravel 8. Actualizar a PHP 8 + Laravel 9+:
```php
// app/Models/User.php
use Illuminate\Database\Eloquent\Casts\Attribute;

protected function fullName(): Attribute
{
    return Attribute::make(
        get: fn () => trim("{$this->name} {$this->last}"),
    );
}
```

### 4.3 — Eliminar dependencia externa ui-avatars.com

`UsersTable` hace requests a `https://ui-avatars.com` para avatares por defecto.
Esto es una dependencia de terceros en producción (privacidad, disponibilidad).

Reemplazar con un avatar generado localmente usando las iniciales,
o usar el helper de Filament para avatars por defecto sin requests externos.

### 4.4 — Limpiar bloque de comentario en CustomPersonalInfo

```php
// app/Livewire/CustomPersonalInfo.php — líneas 3-8
// Eliminar el banner de comentario decorativo (no aporta información)
```

---

## Etapa 5 — Features Incompletas

### 5.1 — Activar TaskBoard en el Panel

`AdminPanelProvider` tiene `TaskBoard::class` comentado. La comunidad `Task Board Page`
existe en el grafo (`Relaticle Flowforge BoardPage`, `Task Model`, `TaskBoard Page`)
pero no está accesible desde el navegador.

```php
// AdminPanelProvider.php — descomentar:
->pages([
    Dashboard::class,
    App\Filament\Pages\TaskBoard::class,
])
```

Verificar que `TaskBoard` tiene política/permisos correctos antes de activar.

### 5.2 — BrandName desde configuración

`brandName('StarterKit_V1')` está hardcodeado. Para un starter kit que se clona,
esto debería venir del entorno:

```php
->brandName(config('app.name'))
```

Y en `.env`:
```
APP_NAME="Mi Aplicación"
```

### 5.3 — Relación `tasks` en User Model

`Task` tiene `belongsTo(User::class)` pero `User` no tiene la relación inversa.
Agregar para habilitar eager loading y búsquedas:

```php
// app/Models/User.php
public function tasks(): HasMany
{
    return $this->hasMany(Task::class);
}
```

### 5.4 — Revisar `phone` requerido en UserForm

`phone` está como `->required()` en `UserForm.php` pero en `CustomPersonalInfo`
está comentado (`// ->required()`). Inconsistencia entre admin y perfil propio.
Decidir si `phone` es obligatorio o no y unificar.

---

## Orden de Ejecución Recomendado

```
Semana 1:
  [x] Etapa 1 — SoftDeletes (urgente, bloquea tests de delete/restore)
  [ ] Etapa 3.3 — Fix DATE_FORMAT (bloquea tests en SQLite)
  [ ] Etapa 2 — Tests (comenzar por UserResource, luego Policies)

Semana 2:
  [ ] Etapa 3.1-3.2 — Caching de widgets y badge
  [ ] Etapa 4 — Limpieza de código
  [ ] Etapa 5 — Features incompletas
```

---

## Nodos del Grafo más Afectados por Este Plan

| Nodo | Aristas | Etapas que lo afectan |
|------|---------|----------------------|
| `User Model` | 13 | 1, 2.3, 4.2, 5.3 |
| `UserResource` | 12 | 2.1, 3.2, 5.2 |
| `RolePolicy` / `ActivityPolicy` | 13 c/u | 2.2 |
| `EditUser` | 7 | 1, 2.1 |
| `UserStatsOverview Widget` | — | 3.1 |
| `UserGrowthChart` | — | 3.1, 3.3 |
| `CustomPersonalInfo` | 7 | 4.4, 5.4 |
