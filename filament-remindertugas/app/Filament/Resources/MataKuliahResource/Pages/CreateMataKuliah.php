<?php

namespace App\Filament\Resources\MataKuliahResource\Pages;

use App\Filament\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification as FilamentNotification;

class CreateMataKuliah extends CreateRecord
{
    protected static string $resource = MataKuliahResource::class;

    protected function getRedirectURL(): string{
        return $this->getResource()::getURL('index');
    }

    protected function getCreatedNotification(): ?FilamentNotification
    {
        return FilamentNotification::make()
            ->title('Berhasil')
            ->body('Mata Kuliah berhasil ditambahkan.')
            ->success()
            ->send();
    }

}
