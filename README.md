# Laravel 13 + Filament 5 — Starter Kit

Boilerplate para iniciar proyectos con **Laravel 13** y **Filament PHP 5**. Incluye configuración base, modelo de usuario extendido y panel de administración listo para usar.

se utlizarqn varios plugins de filament para mejorar

## Stack

| Capa | Tecnología | Versión |
|------|-----------|---------|
| Backend | [Laravel](https://laravel.com) | 13.x |
| Admin Panel | [Filament](https://filamentphp.com) | 5.x |
| Frontend reactive | [Livewire](https://livewire.laravel.com) | 4.x |
| Estilos | [Tailwind CSS](https://tailwindcss.com) | 4.x |
| Testing | [Pest PHP](https://pestphp.com) | 4.x |
| Code Style | [Laravel Pint](https://laravel.com/docs/pint) | 1.x |

## Requerimientos Mínimos

- **PHP** 8.3+
- **Composer** 2.x
- **Node.js** 20+ y **npm** 10+
- **Base de datos**: MySQL 8+ / PostgreSQL 15+ / SQLite 3.35+

## Instalación

```bash
git clone https://github.com/tu-usuario/filament5-starter-kit.git
cd filament5-starter-kit

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate
npm run build
```

## Desarrollo

```bash
composer run dev
```

## Testing

```bash
php artisan test --compact
```

## License

[MIT](https://opensource.org/licenses/MIT)
