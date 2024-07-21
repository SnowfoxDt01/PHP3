<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductComment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // ProductSeeder::class,
            // UserSeeder::class,
            // OrderSeeder::class,
            OrderDetailSeeder::class
        ]);
    }
}
