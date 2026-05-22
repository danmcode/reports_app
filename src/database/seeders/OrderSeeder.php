<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            ['OrderId' => 1, 'ClientId' => 1, 'ProductId' => 1, 'Quantity' => 10, 'Total' => 15000000.00],
            ['OrderId' => 2, 'ClientId' => 2, 'ProductId' => 1, 'Quantity' => 2,  'Total' => 3000000.00],
            ['OrderId' => 3, 'ClientId' => 2, 'ProductId' => 3, 'Quantity' => 5,  'Total' => 2500000.00],
            ['OrderId' => 4, 'ClientId' => 3, 'ProductId' => 1, 'Quantity' => 6,  'Total' => 9000000.00],
            ['OrderId' => 5, 'ClientId' => 3, 'ProductId' => 2, 'Quantity' => 5,  'Total' => 15000000.00],
        ];

        foreach ($orders as $order) {
            Order::updateOrCreate(['OrderId' => $order['OrderId']], $order);
        }
    }
}
