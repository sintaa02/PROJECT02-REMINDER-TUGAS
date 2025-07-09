<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;

    public static function canCreate(): bool
    {
        return false;
    }

    // Hapus method ini, atau return array kosong
    protected function getHeaderActions(): array
    {
        return []; // ✅ Tombol "New Role" tidak ditampilkan
    }
}
