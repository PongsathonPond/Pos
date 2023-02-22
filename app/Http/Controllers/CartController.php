<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
class CartController extends Controller
{
    public function cartList()
    {
        
        $cartItems = \Cart::getContent();
        $listall = DB::table('orders')
       ->orderBy('id', 'desc')
       ->paginate(1);
    
       $lastID = Orders::max('id');
       $order_receipt = Orders::where('id',$lastID)->get();
        return view('page.shop.index', compact('cartItems','listall','order_receipt'));
    }

    public function addToCart(Request $request)
    {

        $item = DB::table('products')
            ->where('id_product', '=', $request->name)
            ->get();

        if (empty($item[0])) {
            session()->flash('error', 'Product is Added to Cart Successfully !');
        } else {
            \Cart::add([
                'id' => $item[0]->id_product,
                'name' => $item[0]->name,
                'price' => $item[0]->priceP,
                'quantity' => 1,
                'attributes' => array(
                    'image' => "nil",
                ),
            ]);
            session()->flash('success', 'Product is Added to Cart Successfully !');

        }

        return redirect()->route('shopP');

    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity,
                ],
            ]
        );

        session()->flash('update', 'Item Cart is Updated Successfully !');

        return redirect()->route('shopP');
    }

    public function removeCart(Request $request)
    {


        \Cart::remove($request->id);
        session()->flash('delete', 'Item Cart Remove Successfully !');

        return redirect()->route('shopP');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('deleteall', 'All Item Cart Clear Successfully !');

        return redirect()->route('shopP');
    }
}
