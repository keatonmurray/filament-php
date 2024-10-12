<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PatientStats extends ChartWidget
{
    protected static ?string $heading = 'Patients';

    protected function getData(): array
    {
        return [
            'labels' => ['January', 'February', 'March'],
            'datasets' => [
                [
                    'label' => 'Patients',
                    'data' => [10, 20, 30],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
