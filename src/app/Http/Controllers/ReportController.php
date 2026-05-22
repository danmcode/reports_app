<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client', 'product'])->orderBy('OrderId')->get();

        $totalAmount  = $orders->sum('Total');
        $totalOrders  = $orders->count();
        $totalQuantity = $orders->sum('Quantity');

        return view('report', compact('orders', 'totalAmount', 'totalOrders', 'totalQuantity'));
    }
}
