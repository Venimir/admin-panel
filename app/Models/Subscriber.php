<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasFactory;

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

    public static function getChurnRate(): float
    {
        $thirtyDaysAgo = now()->subDays(30);
        
        // Get the number of active subscribers 30 days ago
        $activeSubscribers = static::where('subscribed_at', '<=', $thirtyDaysAgo)
            ->where(function ($query) use ($thirtyDaysAgo) {
                $query->where('status', 'active')
                    ->orWhere(function ($q) use ($thirtyDaysAgo) {
                        $q->where('status', 'churned')
                            ->where('churned_at', '>', $thirtyDaysAgo);
                    });
            })
            ->count();

        // Get new subscribers in the last 30 days
        $newSubscribers = static::where('subscribed_at', '>', $thirtyDaysAgo)
            ->count();

        // Get churned subscribers in the last 30 days
        $churnedSubscribers = static::where('status', 'churned')
            ->where('churned_at', '>', $thirtyDaysAgo)
            ->count();

        // Calculate total subscribers (active 30 days ago + new subscribers)
        $totalSubscribers = $activeSubscribers + $newSubscribers;

        // Calculate churn rate
        if ($totalSubscribers === 0) {
            return 0.0;
        }

        return round(($churnedSubscribers / $totalSubscribers) * 100, 2);
    }
}
