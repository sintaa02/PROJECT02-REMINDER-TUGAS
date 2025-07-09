<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// // Tambahin ini:
use App\Models\Tugas;
use App\Policies\TugasPolicy;
use App\Models\Dosen;
use App\Policies\DosenPolicy;
use App\Models\MataKuliah;
use App\Policies\MataKuliahPolicy;
use App\Models\Kategori;
use App\Policies\KategoriPolicy;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Policies\RolePolicy;



class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Tugas::class => \App\Policies\TugasPolicy::class,
        \App\Models\Dosen::class => \App\Policies\DosenPolicy::class,
        \App\Models\MataKuliah::class => \App\Policies\MataKuliahPolicy::class,
        \App\Models\Kategori::class => \App\Policies\KategoriPolicy::class,
        // Tambahkan model dan policy lainnya di sini
        \Spatie\Permission\Models\Role::class => \App\Policies\RolePolicy::class,



    ];


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
