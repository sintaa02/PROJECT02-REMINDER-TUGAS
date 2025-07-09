<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class PenggunaChart extends ChartWidget
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
        return 'pie'; // Ubah dari line ke pie
    }

}
