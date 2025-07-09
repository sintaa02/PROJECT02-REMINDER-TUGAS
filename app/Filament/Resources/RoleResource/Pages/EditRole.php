<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;


class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

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
                        ->body('Data Role berhasil dihapus.')
                        ->success()
                ),
        ];
    }

    // Notifikasi setelah update
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data Role berhasil diperbarui.')
            ->success()
            ->send();
    }
}
