# Contribuir a este starter kit

Gracias por tu interés en contribuir. Este documento resume cómo está organizado el proyecto,
cómo levantar el entorno y qué se espera de un pull request.

## Requisitos

- PHP 8.3+
- Composer
- Node.js (ver versión en uso vía `nvm` si aplica) + npm
- SQLite (por defecto en desarrollo/tests) o el motor configurado en `.env`

## Puesta en marcha

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build   # o `npm run dev` / `composer run dev` durante desarrollo
```

El seeder crea un usuario `super_admin` (`starterkit@mailinator.com`). En entornos distintos a
`local`/`testing`, la contraseña se toma de `ADMIN_SEED_PASSWORD` o se genera aleatoriamente e
imprime una sola vez en consola — revisa la salida del seeder.

## Flujo de trabajo

1. Crea una rama descriptiva a partir de `main` (p. ej. `feat/nombre-corto`, `fix/nombre-corto`).
2. Haz tus cambios siguiendo las convenciones de la sección siguiente.
3. Verifica localmente antes de abrir el PR (ver [Antes de abrir un PR](#antes-de-abrir-un-pr)).
4. Abre el PR contra `main` con una descripción clara de qué cambia y por qué.

## Convenciones del proyecto

- Sigue las reglas de `CLAUDE.md` en la raíz del repo — aplica tanto a contribuciones humanas
  como asistidas: type hints y tipos de retorno explícitos en todo método, llaves siempre en
  estructuras de control, promoción de propiedades en constructores, comandos `php artisan make:*`
  para generar archivos nuevos en vez de crearlos a mano.
- Sigue las convenciones de código ya existentes en archivos hermanos antes de introducir un
  patrón nuevo (estructura de Resources/Pages/Schemas/Tables de Filament, nombres de tests, etc.).
- No cambies dependencias del proyecto sin discutirlo primero.
- No crees carpetas base nuevas en `app/` sin acordarlo antes.

### Commits

El historial usa un prefijo de tipo al estilo [Conventional Commits](https://www.conventionalcommits.org/)
(`feat:`, `fix:`, `refactor:`, `perf:`, `test:`, `style:`, `docs:`, `chore:`), con el mensaje en
español y enfocado en el *porqué* del cambio, no solo el qué. Ejemplo:

```
fix(security): cerrar 3 vectores de escalación de privilegios en Filament

Auditoría de seguridad sobre los recursos Users/Tasks encontró tres formas
en que un usuario autenticado podía saltarse el modelo de autorización...
```

Cuando un cambio abarca varios temas independientes (p. ej. una auditoría con hallazgos de
seguridad, tests, rendimiento y UX), prefiere varios commits enfocados sobre uno solo grande.

### Tests

Este proyecto usa [Pest](https://pestphp.com). Todo cambio de comportamiento debe venir con un
test nuevo o actualizado:

```bash
php artisan make:test --pest NombreDelTest      # feature test
php artisan make:test --pest NombreDelTest --unit
php artisan test --compact                       # suite completa
php artisan test --compact --filter=NombreDelTest
```

No borres tests existentes sin justificarlo explícitamente en el PR.

### Estilo y análisis estático

```bash
vendor/bin/pint --dirty --format agent    # formatear solo archivos modificados
vendor/bin/filacheck --fix                # después de tocar app/Filament
```

## Antes de abrir un PR

Corre esto y confirma que todo pasa antes de solicitar revisión:

```bash
php artisan test --compact
vendor/bin/pint --test --format agent
vendor/bin/filacheck
npm run build   # si tocaste algo del frontend
```

## Reportar un bug o proponer una mejora

Abre un issue describiendo:
- Qué esperabas que pasara vs. qué pasó (para bugs), o el problema que resuelve la mejora.
- Pasos para reproducir, si aplica.
- Versión de PHP/Laravel/Filament si es relevante.
