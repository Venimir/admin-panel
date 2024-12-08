<?php

namespace App\Filament\Widgets;

use App\Models\Subscriber;
use ArberMustafa\FilamentGoogleCharts\Widgets\PieChartWidget;

class ChurnPieChart extends PieChartWidget
{
    protected static ?int $sort = 1;

    private Subscriber|null $subscriber = null;

    private function getSubscriber() : Subscriber
    {
        if ($this->subscriber === null) {
            $this->subscriber = new Subscriber();
        }
        $this->subscriber->setPastTimePeriod(30);
        return  $this->subscriber;
    }

    protected static ?array $options = [
        'legend' => [
            'position' => 'top',
            'alignment' => 'center',
        ],
        'colors' =>  ['#db3a24', '#2aa062', '#2886f1', '#d3a807'],
        'height' => 300,
        'is3D' => true,
    ];

    protected function getHeading(): string
    {
        return 'Churn Statistics';
    }

    protected function getData(): array
    {
        return [
            ['Label', 'Subscribers'],
            ['Churned',  $this->getSubscriber()->getChurnedSubscribers()],
            ['Active',  $this->getSubscriber()->getActiveSubscribers()],
            ['New',  $this->getSubscriber()->getNewSubscribers()],
            ['Total',  $this->getSubscriber()->getTotalSubscribers()],
        ];
    }

}
