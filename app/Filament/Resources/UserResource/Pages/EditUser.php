<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use Filament\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;


class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectURL(): string{
        return $this->getResource()::getURL('index');
    }

    // Tombol di bagian header (biasanya Delete)
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Dihapus')
                        ->body('Data User berhasil dihapus.')
                        ->success()
                ),
        ];
    }

    // Notifikasi setelah update
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data User berhasil diperbarui.')
            ->success();
    }

}
