<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\AgendaCalendarWidget;
use App\Livewire\CustomPersonalInfo;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use DiogoGPinto\AuthUIEnhancer\AuthUIEnhancerPlugin;
use Filament\Forms\Components\FileUpload;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\App;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jacobtims\FilamentLogger\FilamentLoggerPlugin;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Leandrocfe\FilamentApexCharts\FilamentApexChartsPlugin;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login()
            ->colors([
                'primary' => Color::Sky,
            ])
            ->passwordReset()
            ->databaseNotifications()
            ->brandName(config('app.name'))
            ->sidebarCollapsibleOnDesktop()
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->globalSearchFieldKeyBindingSuffix()
            ->globalSearchDebounce('450ms')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\Filament\Clusters')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                ...App::environment('local') ? [FilamentInfoWidget::class] : [],
                AgendaCalendarWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                FilamentApexChartsPlugin::make(),
                FilamentFullCalendarPlugin::make()
                    ->selectable()
                    ->editable(),
                AuthUIEnhancerPlugin::make()
                    ->formPanelPosition('left')
                    ->formPanelWidth('35%')
                    ->emptyPanelBackgroundImageUrl(asset('img/image_nl_mty.jpg')),
                FilamentShieldPlugin::make(),
                FilamentLoggerPlugin::make(),
                BreezyCore::make()
                    ->avatarUploadComponent(
                        fn (FileUpload $fileUpload) => $fileUpload->disableLabel(),
                    )
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        userMenuLabel: 'Mi Perfil',
                        shouldRegisterNavigation: true,
                        navigationGroup: 'Configuración',
                        hasAvatars: true,
                        slug: 'my-profile',
                    )
                    ->myProfileComponents([
                        'personal_info' => CustomPersonalInfo::class,
                    ])
                    ->enableBrowserSessions(condition: true)
                    ->enableTwoFactorAuthentication(
                        force: false,
                    ),
            ]);
    }
}
