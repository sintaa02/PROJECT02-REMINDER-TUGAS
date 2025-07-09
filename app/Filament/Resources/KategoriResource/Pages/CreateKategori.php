<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification as FilamentNotification;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    protected function getRedirectURL(): string{
        return $this->getResource()::getURL('index');
    }

    protected function getCreatedNotification(): ?FilamentNotification
    {
        return FilamentNotification::make()
            ->title('Berhasil')
            ->body('Kategori berhasil ditambahkan.')
            ->success()
            ->send();
    }
}
