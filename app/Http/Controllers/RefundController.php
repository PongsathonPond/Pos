<?php

namespace App\Http\Controllers;


use App\Models\Order_product;
use App\Models\Product;
use App\Models\Refund;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RefundController extends Controller
{
    //
    public function index()
    {
        $refund = Refund::all();
        return view('page.refund.index',compact('refund'));
    }

    public function addToRefund(Request $request)
    {

        $delete = Order_product::where('product_id',$request->id_product)->get();
        
        
        if (empty($delete[0])) {
            session()->flash('error', 'Product is Added to Cart Successfully !');
        }else{
            session()->flash('success', 'Product is Added to Cart Successfully !');
            $fide = Order_product::where('product_id',$request->id_product)->first();
            $delete = Order_product::where('product_id',$request->id_product)->delete();
            $updateP = Product::where('id_product',$request->id_product)->first();
            $fideOrders = Orders::where('id',$fide->order_id)->first();
           
            $tableName = new Refund();
            $tableName->name = $updateP->name;
            $tableName->key_slug = $updateP->id_product;
            $tableName->priceP = $updateP->priceP;
            $tableName->priceS = $updateP->priceS;
            $tableName->qty = 1;
            $tableName->save();
            Product::where('id_product',$request->id_product)->update([
                'qty' => $updateP->qty+1,
            ]);
           
            if($fideOrders->type == "ขายปลีก"){
                Orders::where('id',$fide->order_id)->update([
                    'total_price'=> $fideOrders->total_price - $updateP->priceP,
                ]);
            }else{
                Orders::where('id',$fide->order_id)->update([
                    'total_price'=> $fideOrders->total_price - $updateP->priceS,
                ]);
            }    
           

     
        }
       
    

        return redirect()->route('refund.index');

    }


}
