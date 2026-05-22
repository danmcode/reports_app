<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'OrderId';
    public $timestamps = false;

    protected $fillable = [
        'OrderId',
        'ClientId',
        'ProductId',
        'Quantity',
        'Total',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'ClientId', 'ClientId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductId', 'ProductId');
    }
}
