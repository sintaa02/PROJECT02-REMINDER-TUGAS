<?php

namespace App\Policies;

use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MataKuliahPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->hasRole('admin')) {
            return true; // admin boleh semuanya
        }

        return null; // lanjut ke fungsi lain
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MataKuliah $mataKuliah): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MataKuliah $mataKuliah): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MataKuliah $mataKuliah): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MataKuliah $mataKuliah): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MataKuliah $mataKuliah): bool
    {
        return false;
    }



}
