<?php

namespace App\Filament\Resources\DosenResource\Pages;

use App\Filament\Resources\DosenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class EditDosen extends EditRecord
{
    protected static string $resource = DosenResource::class;

    // Tombol di bagian header (biasanya Delete)
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title('Dihapus')
                        ->body('Data dosen berhasil dihapus.')
                        ->success()
                ),
        ];
    }

    protected function getRedirectURL(): string{
        return $this->getResource()::getURL('index');
    }

    // Notifikasi setelah update
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data dosen berhasil diperbarui.')
            ->success()
            ->send();
    }

}
