<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        {
            User::created(function ($user) {
                // Jika user baru belum punya role, kasih role 'user'
                if (! $user->hasAnyRole(['admin', 'user'])) {
                    $user->assignRole('user');
                }
            });
        }
    }
}
