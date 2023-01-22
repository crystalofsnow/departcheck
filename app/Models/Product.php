<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'stock'
        ];
    public function order_details()
    {
        return $this->belongsToMany(Order_detail::class);
    }
}