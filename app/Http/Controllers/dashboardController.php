<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class dashboardController extends Controller
{
    public function dash1()
    {
        
        return view('page.dashboard.index1');
    }
    public function dash1find(Request $request)
    {
        $from = $request->start;
        $to = $request->end;
      
        
             $orders = DB::table('order_products')
                ->join('products', 'order_products.product_id', 'products.id_product')
                ->select('products.name',DB::raw('SUM(quantity) as total_qty'),DB::raw('SUM(price) as total_price'))
                ->whereBetween('order_products.created_at', [$from, $to])
                ->groupBy('products.name')
                ->get();
                
        dd($orders);
        return view('page.dashboard.index1find');
    }

    
}
