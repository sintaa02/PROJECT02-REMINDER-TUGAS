<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class TugasOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 3;
    }

    protected function getStats(): array
    {
        $user = Auth::user();
        $query = Tugas::query();

        // Kalau user biasa, filter berdasarkan user_id
        if ($user->hasRole('user')) {
            $query->where('user_id', $user->id);
        }


        return [
            Stat::make('Tugas Belum Selesai', (clone $query)->where('selesai', false)->count())
                ->description('Jumlah tugas belum selesai')
                ->color('danger')
                ->icon('heroicon-o-x-circle'),
            Stat::make('Tugas Deadline Keseluruhan', (clone $query)->whereNotNull('deadline')->count())
                ->description('Jumlah tugas dengan deadline')
                ->color('info')
                ->icon('heroicon-o-calendar'),
            Stat::make('Total Tugas', (clone $query)->count())
                ->description('Jumlah total tugas yang ada')
                ->color('primary')
                ->icon('heroicon-o-document-text'),
            Stat::make('Total Dosen', \App\Models\Dosen::count())
                    ->description('Jumlah total dosen yang ada')
                    ->color('success')
                    ->icon('heroicon-s-identification'),
            Stat::make('Total Kategori', \App\Models\Kategori::count())
                    ->description('Jumlah total kategori yang ada')
                    ->color('info')
                    ->icon('heroicon-o-tag'),
            Stat::make('Total Mata Kuliah', \App\Models\MataKuliah::count())
                    ->description('Jumlah total mata kuliah yang ada')
                    ->color('secondary')
                    ->icon('heroicon-o-book-open'),

        ];
    }
}
