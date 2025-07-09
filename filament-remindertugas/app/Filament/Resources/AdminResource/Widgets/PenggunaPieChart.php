<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;


class PenggunaPieChart extends ChartWidget
{
    protected static ?string $heading = 'Persentase Role Pengguna';

    protected function getData(): array
    {
        $data = User::selectRaw('role, COUNT(*) as count')
            ->groupBy('role')
            ->pluck('count', 'role');
        return [
            'datasets' => [
                [
                    'label' => 'Pengguna',
                    'data' => $data->values()->toArray(),
                    'backgroundColor' => ['#60a5fa', '#34d399', '#facc15'], // warna untuk tiap role
                ],
            ],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }


    //biar linenya ilang
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom', // atau 'right', 'top' sesuai preferensi
                ],
            ],
            'scales' => [
                'x' => [
                    'display' => false,
                    'grid' => ['display' => false],
                    'ticks' => ['display' => false],
                ],
                'y' => [
                    'display' => false,
                    'grid' => ['display' => false],
                    'ticks' => ['display' => false],
                ],
            ],
        ];
    }
    protected function getHeight(): string
    {
        return '190px'; // Sesuaikan dengan ukuran chart tugas
    }

    protected function getMaxHeight(): string
    {
        return '190px'; // Paksa tinggi maksimum
    }

}
