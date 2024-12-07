<?php

namespace App\Filament\Widgets;

use App\Models\Subscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ChurnRateStats extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        $churnRate = Subscriber::getChurnRate();
        $totalSubscribers = Subscriber::count();
        $activeSubscribers = Subscriber::where('status', 'active')->count();
        $churnedSubscribers = Subscriber::where('status', 'churned')->count();

        return [
            Stat::make('Churn Rate', number_format($churnRate, 2) . '%')
                ->description('Last 30 days')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color($churnRate > 5 ? 'danger' : 'success')
                ->chart([7, 4, 6, $churnRate]),

            Stat::make('Total Subscribers', $totalSubscribers)
                ->description('All time')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Active Subscribers', $activeSubscribers)
                ->description('Current')
                ->descriptionIcon('heroicon-m-user')
                ->color('success'),
        ];
    }
}
