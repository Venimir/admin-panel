<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory;

    /** @var int $numberOfDays Past period of time in days */
    private int $numberOfDays = 0;

    /**
     * @param int $numberOfDays
     * @return void
     */
    public function setPastTimePeriod(int $numberOfDays) : void
    {
        $this->numberOfDays = $numberOfDays;
    }

    protected $fillable = [
        'email',
        'status',
        'subscribed_at',
        'churned_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'churned_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Support\Carbon
     */
    private function getPastDaysAgo()
    {
        return now()->subDays($this->numberOfDays);
    }

    public function getActiveSubscribers()
    {
      return self::query()->where('status', 'active')->count();
    }

    public function getActiveSubscribersForPastPeriodOfTime()
    {
        $pastDaysAgo = $this->getPastDaysAgo();

        return self::where('subscribed_at', '<=', $pastDaysAgo)
                ->where(function ($query) use ($pastDaysAgo) {
                    $query->where('status', 'active')
                        ->orWhere(function ($q) use ($pastDaysAgo) {
                            $q->where('status', 'churned')
                                ->where('churned_at', '>', $pastDaysAgo);
                        });
                })
                ->count();
    }

    public function getNewSubscribers()
    {
        $pastDaysAgo = $this->getPastDaysAgo();

        return self::where('subscribed_at', '>', $pastDaysAgo)
            ->count();
    }

    public function getChurnedSubscribers()
    {
        $pastDaysAgo = $this->getPastDaysAgo();

        return self::where('status', 'churned')
        ->where('churned_at', '>', $pastDaysAgo)
        ->count();
    }

    public function getAllChurnedSubscribers()
    {
       return self::where('status', 'churned')->count();
    }


    public function getTotalSubscribers() : int
    {
        return self::query()->count();
    }

    public function getChurnRate(): float
    {
        // Get the number of active subscribers 30 days ago
        $activeSubscribers = $this->getActiveSubscribersForPastPeriodOfTime();

        // Get new subscribers in the last 30 days
        $newSubscribers = $this->getNewSubscribers();

        // Get churned subscribers in the last 30 days
        $churnedSubscribers = $this->getChurnedSubscribers();

        // Calculate total subscribers (active 30 days ago + new subscribers)
        $totalActiveSubscribers = $activeSubscribers + $newSubscribers;

        // Calculate churn rate
        if ($totalActiveSubscribers === 0) {
            return 0.0;
        }

        return round(($churnedSubscribers / $totalActiveSubscribers) * 100, 2);
    }

}
