<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['active', 'inactive', 'new'];
        
        for ($i = 1; $i <= 50; $i++) {
            Customer::create([
                'name' => 'Customer ' . $i,
                'email' => 'customer' . $i . '@example.com',
                'phone' => '08' . rand(100000000, 999999999),
                'status' => $statuses[array_rand($statuses)],
                'order_count' => rand(0, 50),
                'total_spending' => rand(0, 50000000),
                'join_date' => now()->subDays(rand(0, 365))
            ]);
        }
    }
}
