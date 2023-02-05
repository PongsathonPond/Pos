<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();

        return view('page.shop.index', compact('cartItems'));
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

        session()->flash('success', 'Item Cart is Updated Successfully !');

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

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('shopP');
    }
}
