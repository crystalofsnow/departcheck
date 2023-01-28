<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order_detail extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTO(Product::class);
    }
    protected $fillable =
    [
        'order_id',
        'product_id',
        'amount'
    ];
       
}
