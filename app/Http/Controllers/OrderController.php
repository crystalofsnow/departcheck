<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        return view('orders/index')->with(['orders' => $order]);
        //'orderはbladeファイルで使う変数．中身は$orderはid=1のOrderインスタンス'
    }
}
