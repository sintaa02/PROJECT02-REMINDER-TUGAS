<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TugasChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Tugas per Hari';

    protected function getData(): array
    {
        $data = Tugas::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->when(Auth::user()->hasRole('user'), function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $user = Auth::user();
        $query = Tugas::query();

        // Kalau user biasa, filter berdasarkan user_id
        if ($user->hasRole('user')) {
            $query->where('user_id', $user->id);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Tugas',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => 'rgba(79, 70, 229, 0.2)', // biru lembut
                    'borderColor' => '#4F46E5',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.4,
                    'pointBackgroundColor' => '#4F46E5',
                ],
            ],
            'labels' => $data->pluck('date')->map(fn($date) => Carbon::parse($date)->translatedFormat('M d'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getHeight(): string
    {
        return '190px'; // Sesuaikan dengan chart kiri
    }

    protected function getMaxHeight(): string
    {
        return '190px'; // Paksa tinggi maksimum
    }
}