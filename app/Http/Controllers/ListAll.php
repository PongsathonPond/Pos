<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ListAll extends Controller
{
    public function store(Request $request)
    {
        $tableName = new Orders();
        $tableName->user_id = Auth::user()->id;;
        $tableName->total_price = $request->total_price;
        $tableName->type_sale = $request->type_sale;
        $tableName->amount = $request->amount;
        $tableName->change = $request->change;
        $tableName->save();


        $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            ->first();


        for ($i = 0; $i < count($request->product_id); $i++) {
            $table = new Order_product();
        $table->order_id  = $orders->id;
        $table->product_id = $request->product_id[$i];
        $table->quantity = $request->quantity[$i];
        $table->price = $request->price[$i];
            $table->save();
        }



        return redirect()->route('shopP')->with('ok', 'addlistall!');;

    }
}
