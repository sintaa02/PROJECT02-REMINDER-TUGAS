<?php

namespace App\Filament\Resources\KategoriResource\Pages;

use App\Filament\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class EditKategori extends EditRecord
{
    protected static string $resource = KategoriResource::class;

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
                        ->body('Data Kategori berhasil dihapus.')
                        ->success()
                ),
        ];
    }

    // Notifikasi setelah update
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data Kategori berhasil diperbarui.')
            ->success()
            ->send();
    }

}
