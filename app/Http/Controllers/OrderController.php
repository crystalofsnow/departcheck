<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//requestのallメソッドを使うためには必須
use App\Models\Order;
use App\Models\Product;
use App\Models\Choose;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        return view('orders/index')->with(['orders' => $order->get()]);
    }
    
    public function choose(Product $product)
    {
        //dd($dates);
        return view('orders/choose')->with(['products' => $product->get()]);
    }
    //with データ渡し products でblade
    
    public function subtotal()
    {
        //dd($request);
        return view('orders/subtotal');
    }
    public function send(Request $request)
    {
        //dd($request);
        $input=$request['orders'];
        //dd($input['date']);
        return redirect('orders/choose')->with(['dates' => $input['date']]);
    }
    public function choose_value()//Merchandise
    {
        //dd($merc);
        return view('orders/choose_value');
    }
    public function merc(Request $request)//Merchandise
    {
        //dd($request);
        $mercs = $request->input('merc.*.product_id');;//リクエストの全データを取得(all method)・配列を受け取る/配列になっている？
        //dd($mercs);
        //$mercs = $input['merc'];
        //dd($input);
        //$test=[]
        //foreach($mercs as $merc)
        $merc_info = Product::whereIn('id', $mercs)->get();
        
        //dd($merc_info);
        return view('orders/choose_value')->with(['mercs' => $merc_info]);
    }
    public function count(Request $request)
    {
        //dd($request);
        $new_list=[];
        $counts = $request->input('merc_value.*');
        foreach ($counts as $key){
            //$product_id = $key['product_id'];
            //dd($product_id);
            $product_info = Product::find($key['product_id']);
            //dd($product_info);
            $amount = $key['amount'];
            $list=[];
            $list=array('product'=>$product_info, 'amount'=>$amount);
            array_push($new_list, $list);
        }
        //dd($new_list);
        //$counts = $request->input('merc_value.*.product_id');
        //dd($counts);
        //$counts_merc = Product::whereIn('id', $counts)->get();
        //dd($counts_merc);
        //$data = $counts('')
        return view('orders/subtotal')->with(['datas' => $new_list]);
    }
}

