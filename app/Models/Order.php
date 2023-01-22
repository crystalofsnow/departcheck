<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'total_amount',
        'total_price',
        'total_price_tax'
        ];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
}
//fillableでデータ格納