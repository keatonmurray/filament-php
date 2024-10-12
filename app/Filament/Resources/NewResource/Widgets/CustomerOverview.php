<?php

namespace App\Filament\Resources\NewResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class CustomerOverview extends ChartWidget
{
    protected static ?string $heading = 'Customer Overview';

    // Set the type of chart (line chart in this case)
    protected function getType(): string
    {
        return 'line';
    }

    // Generate data for the chart
    protected function getData(): array
    {
        $customers = User::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'New Customers',
                    'data' => $customers->pluck('total'),
                    'borderColor' => '#4F46E5', // Indigo
                    'backgroundColor' => 'rgba(79, 70, 229, 0.5)', // Translucent indigo
                    'fill' => true,
                ],
            ],
            'labels' => $customers->pluck('date'),
        ];
    }
}
