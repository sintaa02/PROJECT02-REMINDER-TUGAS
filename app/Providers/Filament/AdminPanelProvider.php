<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Notifications\Notification;
use App\Models\Tugas;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Notifications\TugasDeadlineNotification;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Filament\Navigation\NavigationItem;


class AdminPanelProvider extends PanelProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            $user = Filament::auth()->user();
            if (!$user) return;

            // Tampilkan notifikasi selamat datang hanya sekali (saat login)
            if (!session()->has('welcome_shown')) {
                if ($user->hasRole('admin')) {
                    Notification::make()
                        ->title('👩‍🎓 Admin ' . $user->name . ' online!')
                        ->body('Saatnya bekerja. Atau setidaknya, terlihat sibuk.')
                        ->success()
                        ->send();
                }

                if ($user->hasRole('user')) {
                    Notification::make()
                        ->title('👋 Hai ' . $user->name . '!')
                        ->body('Senang bertemu kamu kembali. Semangat mengerjakan tugas-tugasmu hari ini ya!')
                        ->success()
                        ->send();
                }

                session(['welcome_shown' => true]); // Flag agar tidak muncul lagi
            }


            //NOTIFIKASI UNTUK ROLE USER
            if ($user->hasRole('user')) {
                $cacheKey = 'notif_deadline_user_' . auth()->id();

            // 🛑 Tambahkan pengecekan cache sebelum kirim notifikasi
            if (!Cache::has($cacheKey)) {
                Cache::put($cacheKey, true, now()->addMinutes(1));

                    $pesan = 'Belum ada tugas mendekati deadline.'; // ⬅️ fix error ini
                    $tugasDekat = Tugas::where('user_id', $user->id)
                        ->whereDate('ingatkan_pada', '<=', now()->addDay()) // hanya berdasarkan deadline
                        ->get();
                    if ($tugasDekat->count() > 0) {
                        $pesan = view('notifications.tugas', ['tugas' => $tugasDekat])->render();

                        Notification::make()
                            ->title('📌 Ada ' . $tugasDekat->count() . ' tugas mendekati deadline!')
                            ->body(view('notifications.tugas', ['tugas' => $tugasDekat]))
                            ->warning()
                            ->send();

                        Notification::make()
                            ->title('📌 Reminder Tugas Harian')
                            ->body(strip_tags($pesan))
                            ->info()
                            ->sendToDatabase($user);
                    }

                    $tugasBelumSelesai = Tugas::where('user_id', $user->id)
                        ->where('status', '!=', 'selesai')
                        ->get();
                    if ($tugasBelumSelesai->count() > 0) {
                        Notification::make()
                            ->title('📝 Tugas Belum Selesai')
                            ->body('Kamu masih punya ' . $tugasBelumSelesai->count() . ' tugas yang belum dikerjakan.')
                            ->warning()
                            ->sendToDatabase($user);
                    }
            }
        }
        //NOIFIKASI ROLE ADMIN

        if ($user->hasRole('admin')) {
            $cacheKey = 'admin_notifikasi_' . $user->id;

            if (!Cache::has($cacheKey)) {
                Cache::put($cacheKey, true, now()->addMinutes(2));

                $user = auth()->user();

                $userBaru = \App\Models\User::whereDate('created_at', today())->count();
                $dosenBaru = \App\Models\Dosen::whereDate('created_at', today())->count();

                if ($userBaru > 0) {
                    Notification::make()
                        ->title('👤 User Baru')
                        ->body("Ada {$userBaru} user baru hari ini.")
                        ->success()
                        ->sendToDatabase($user);
                }

                if ($dosenBaru > 0) {
                    Notification::make()
                        ->title('👨‍🏫 Dosen Baru')
                        ->body("Ada {$dosenBaru} dosen baru hari ini.")
                        ->info()
                        ->sendToDatabase($user);
                }
            }
        }
    });
}



    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('📘Remindy')
            ->login()
            ->registration()
            ->passwordReset()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->widgets([
                \App\Filament\Resources\AdminResource\Widgets\TugasOverview::class,

            ])
            ->widgets([
                \App\Filament\Resources\AdminResource\Widgets\TugasChart::class,
                \App\Filament\Resources\AdminResource\Widgets\PenggunaPieChart::class,
                \App\Filament\Resources\AdminResource\Widgets\TugasTable::class,
            ])


            ->databaseNotifications();
    }


    //Admin n User dapat mengakses panel ini
    protected function gate(): void
    {
        Gate::define('viewFilament', function (User $user) {
            return $user->hasAnyRole(['admin', 'user']);
        });
    }
}
