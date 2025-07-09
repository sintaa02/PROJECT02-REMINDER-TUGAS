<?php

namespace App\Filament\Resources\TugasResource\Pages;

use App\Filament\Resources\TugasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class EditTugas extends EditRecord
{
    protected static string $resource = TugasResource::class;
    // Mengatur URL redirect setelah update
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
                        ->body('Data Tugas berhasil dihapus.')
                        ->success()
                ),
        ];
    }

    // Notifikasi setelah update
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data Tugas berhasil diperbarui.')
            ->success()
            ->send();
    }
}
