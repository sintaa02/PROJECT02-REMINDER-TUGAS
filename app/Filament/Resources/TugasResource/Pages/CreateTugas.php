<?php

namespace App\Filament\Resources\TugasResource\Pages;

use App\Filament\Resources\TugasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification as FilamentNotification;

class CreateTugas extends CreateRecord
{

    protected static string $resource = TugasResource::class;

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
