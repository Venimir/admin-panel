<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    public function run(): void
    {
        // Create subscribers from more than 30 days ago
        for ($i = 0; $i < 100; $i++) {
            Subscriber::create([
                'email' => fake()->unique()->email(),
                'status' => 'active',
                'subscribed_at' => now()->subDays(rand(31, 365)),
                'churned_at' => null,
            ]);
        }

        // Create subscribers within the last 30 days
        for ($i = 0; $i < 50; $i++) {
            Subscriber::create([
                'email' => fake()->unique()->email(),
                'status' => 'active',
                'subscribed_at' => now()->subDays(rand(1, 30)),
                'churned_at' => null,
            ]);
        }

        // Create churned subscribers within the last 30 days (for churn rate calculation)
        for ($i = 0; $i < 8; $i++) {
            $subscribedAt = now()->subDays(rand(31, 365));
            Subscriber::create([
                'email' => fake()->unique()->email(),
                'status' => 'churned',
                'subscribed_at' => $subscribedAt,
                'churned_at' => now()->subDays(rand(1, 30)),
            ]);
        }

        // Create some older churned subscribers
        for ($i = 0; $i < 5; $i++) {
            $subscribedAt = now()->subDays(rand(60, 365));
            Subscriber::create([
                'email' => fake()->unique()->email(),
                'status' => 'churned',
                'subscribed_at' => $subscribedAt,
                'churned_at' => now()->subDays(rand(31, 59)),
            ]);
        }
    }
}
