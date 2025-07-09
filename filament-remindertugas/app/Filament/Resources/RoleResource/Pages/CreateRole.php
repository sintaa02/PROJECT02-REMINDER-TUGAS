<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification as FilamentNotification;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;


    protected function getRedirectURL(): string{
        return $this->getResource()::getURL('index');
    }

    protected function getCreatedNotification(): ?FilamentNotification
    {
        return FilamentNotification::make()
            ->title('Berhasil')
            ->body('Tugas berhasil ditambahkan.')
            ->success()
            ->send();
    }
}
