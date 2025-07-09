<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Filament\Resources\AdminResource\Widgets\TugasOverview;
use Filament\Widgets\TableWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Tables\Columns\TextColumn;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;


class TugasTable extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $user = Auth::user();
        $query = Tugas::query();

        // Kalau user biasa, filter berdasarkan user_id
        if ($user->hasRole('user')) {
            $query->where('user_id', $user->id);
        }

        return $table
            ->query(
                \App\Models\Tugas::query()
                    ->when($user->hasRole('user'), function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->with(['mataKuliah', 'kategori'])
                    ->latest('created_at')

            )
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul Tugas')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mataKuliah.nama')
                    ->label('Mata Kuliah')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi Tugas')
                    ->limit(50),
                TextColumn::make('deadline')
                    ->date()
                    ->label('Deadline')
                    ->sortable(),
                TextColumn::make('ingatkan_pada')
                    ->date()
                    ->label('Ingatkan Pada')
                    ->sortable(),
                TextColumn::make('kategori.name')
                    ->label('Kategori Tugas')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status Tugas')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'baru' => '🆕 Baru',
                        'proses' => '⏳ Sedang Dikerjakan',
                        'selesai' => '✅ Selesai',
                        'batal' => '❌ Dibatalkan',
                    })
                    ->sortable()
                    ->searchable(),

            ]);
    }
}
