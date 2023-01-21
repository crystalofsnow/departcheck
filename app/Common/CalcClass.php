<?php

namespace app\Common;
use App\Models\Product;
use Illuminate\Http\Request;//requestのallメソッドを使うためには必須

class CalcClass
{
    public static function Calculation($request)
    {
         //dd($request);
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
        return $all_info;
    }
}
