<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $typeCategory = Categories::all();
        $product = Product::all();

        return view('page.product.index', compact('typeCategory', 'product'));
    }

    public function store(Request $request)
    {
        $tableName = new Product();
        $tableName->id_product = $request->id;
        $tableName->name = $request->name;
        $tableName->priceP = $request->priceP;
        $tableName->priceS = $request->priceS;
        $tableName->category_id = $request->category_id;
        $tableName->qty = $request->qty;
        $tableName->save();

        return redirect()->route('product.index')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }

    public function update(Request $request, $id)
    {
       
       
        
        $request->validate([

            'name' => 'required',
            'priceP' => 'required',
            'priceS' => 'required',
            'qty' => 'required',

        ],

            ['name.required' => "กรุณาป้อนชื่อสินค้า",
            'priceP.required' => "กรุณาป้อนราคาขายปลีก",
            'priceS.required' => "กรุณาป้อนราคาขายส่ง",
            'qty.required' => "กรุณาป้อนจำนวน",
            ]
        );  
        Product::where('id_product',$request->id)->update([

            'name' => $request->name,
            'priceP' => $request->priceP,
            'priceS' => $request->priceS,
            'qty' => $request->qty,

        ]);

        return redirect()->back()->with('update', "อัพเดตข้อมูลเรียบร้อย");
        // return redirect()->route('usermanager')->with('success',"อัพเดตข้อมูลเรียบร้อย");
    }

}
