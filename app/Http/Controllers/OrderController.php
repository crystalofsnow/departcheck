<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//requestのallメソッドを使うためには必須
use App\Models\Order;
use App\Models\Product;
use App\Models\Choose;
use App\Models\Order_detail;
use App\Models\Guest;
use App\Common\CalcClass;

class OrderController extends Controller
{
    public function first(Product $product)
    {
        //$products = Product::all();
        //dd($products);
        //dd($merc_info);
        //return view('orders/choose_value')->with(['mercs' => $merc_info]);
        return view('orders/index')->with(['products' => $product->get()]);
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
    /*
    public function send(Request $request)
    {
        //dd($request);
        $input=$request['orders'];
        //dd($input['date']);
        return redirect('orders/choose')->with(['dates' => $input['date']]);
    }
    */
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
        
        /*
        以下 app/CalcClassに移動
        
        
        $new_list=[]; //次のViewに渡すリスト
        $total_price = 0; //total price 初期値
        $total_amount = 0;
        
        $counts = $request->input('merc_value.*');
        foreach ($counts as $key){
            //$product_id = $key['product_id'];
            //dd($product_id);
            $product_info = Product::find($key['product_id']);//product infoの取り出し
            //dd($product_info);
            $amount = $key['amount'];//数の取り出し
            
            
            //商品ごとの値段の計算
            $oneprice = $product_info['price'];
            $one_merc_price = $oneprice * $amount;
            //dd($one_merc_price);
            
            //Totalの計算
            $total_price += $one_merc_price;
            $total_amount += $amount;
            
            
            //次のViewに渡すもの（商品ごごとの情報）
            $list=[];
            $list=array('product'=>$product_info, 'amount'=>$amount);
            array_push($new_list, $list);
        }
        
        //消費税計算
        $tax_rate = 8;
        //$total_price_tax = 0;
        $total_price_tax = $total_price * ($tax_rate + 100) / 100 ;
        
        //Totalの値段も次のViewへ
        $all_info = array('info'=>$new_list, 'total_price'=>$total_price, 'total_amount'=>$total_amount, 'total_price_tax'=>$total_price_tax);
        //dd($all_info);
        //dd($new_list);
        //$counts = $request->input('merc_value.*.product_id');
        //dd($counts);
        //$counts_merc = Product::whereIn('id', $counts)->get();
        //dd($counts_merc);
        //$data = $counts('')
        */
        $all_info_from_calcClass = CalcClass::Calculation($request);
        //dd($all_info_from_calcClass);
        return view('orders/subtotal')->with(['datas' => $all_info_from_calcClass]);
    }
    public function comfirm(Request $request, Order $order, Product $product, Order_detail $order_detail)
    {
        //orderの保存
        //dd($request);
         $all_info_from_calcClass = CalcClass::Calculation($request);
         $guest_id =$request['user_id'];
         
         $all_info_from_calcClass = array_merge($all_info_from_calcClass, array('guest_id'=>$guest_id));
         //dd($all_info_from_calcClass);
         //dd($user_id);
         //dd($all_info_from_calcClass);
         //$input_orders = $all_info_from_calcClass['order'];
         //dd($input_order);
         
         $order->fill($all_info_from_calcClass)->save();
         //dd($order);
         
         //order details の保存
         //dd($all_info_from_calcClass['info']);
         foreach($all_info_from_calcClass['info'] as $key => $value){
            $data =
            [
                'order_id' => $order->id,
                'product_id' => $value['product']->id,
                'amount' => $value['amount']
            ];
            //$order_detail->fill($data)->save();
            Order_detail::insert($data);
         }
         
         
         
         //products databasseの値の更新
         $mercs = $request->input('merc_value.*');
         foreach($mercs as $key => $value){
             //dd($value['product_id']);
             //foreach($value as $product_id => $amount){
             //    dd($amount);
             $product = Product::find($value['product_id']);
             $product->stock = $product->stock - $value['amount'];//database productsから値減らす
             $product->save();
             //dd($product);
         }
         //dd($mercs);
         //ループ
         //$product = Product::find($mercs['product_id']);
         //$product->amount = $product->amount - $mercs->amount;
         
         //dd($product);
         return view('orders/finished')->with(['datas' => $all_info_from_calcClass]);
    }
    /*public function test()
    {
        CalcClass::sayHello();

        return view(
            'test'
        );
    }
    */
    public function finished()
    {
        //dd($request);
        return view('orders/finished');
    }
    public function firststock(Request $request)
    {
        //dd($request);
         $firststock = $request->input('firststock.*');
         foreach($firststock as $key => $value){
             //dd($value['product_id']);
             //foreach($value as $product_id => $amount){
             //    dd($amount);
             $product = Product::find($value['product_id']);
             $product->stock = $value['stock'];//database stockに新たな値を保存
             $product->save();
             //dd($product);
         }
         return redirect('orders/choose')->with(['products' => $product->get()]);
         
    }
    public function members(Guest $guest)
    {
        return view('orders/members')->with(['members' => $guest ->get()]);
    }
    public function member_submit(Request $request, Guest $guest)
    {
        //input = $request;
        $guest->fill($request->all())->save();
        return redirect('orders/regist_comple');
    }
    public function regist_comple()
    {
        return view('orders/regist_comple')->with(['guests' =>$guest ->get()]);//guest id の表示
    }
}