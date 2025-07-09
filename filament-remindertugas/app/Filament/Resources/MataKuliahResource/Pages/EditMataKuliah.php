<?php

namespace App\Filament\Resources\MataKuliahResource\Pages;

use App\Filament\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class EditMataKuliah extends EditRecord
{
    protected static string $resource = MataKuliahResource::class;

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
                        ->body('Data Matakuliah berhasil dihapus.')
                        ->success()
                ),
        ];
    }

    // Notifikasi setelah update
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data Matakuliah berhasil diperbarui.')
            ->success()
            ->send();
    }

}
