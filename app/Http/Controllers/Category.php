<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function index()
    {
        $typeCategory = Categories::all();

        return view('page.product.category', compact('typeCategory'));
    }

    
    public function store(Request $request)
    {
        $tableName = new Categories();
        $tableName->name = $request->name;
        $tableName->save();

        return redirect()->route('product.category')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
