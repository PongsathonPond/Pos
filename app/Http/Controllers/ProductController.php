<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categories;

class ProductController extends Controller
{
    public function index()
    {
        $typeCategory = Categories::all();
        $product = Product::paginate(10);


        return view('page.product.index',compact('typeCategory','product'));
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


}
