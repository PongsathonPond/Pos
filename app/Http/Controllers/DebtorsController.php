<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debtors;
use App\Models\Orders;
class DebtorsController extends Controller
{
    public function index()
    {
        $deb = Debtors::all();
        return view('page.debtors.index',compact('deb'));
    }

     public function read($id)
    {
        $deb = Debtors::find($id);
        $deb2= Orders::where('debtors_id',$id)->get();
        return view('page.debtors.find', compact('deb','deb2'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:debtors',
        ],
            [
                'name.required' => "กรุณาป้อนชื่อ",
                'address.required' => "กรุณาป้อนที่อยู่",
                'phone.required' => "กรุณาป้อนเบอร์โทร",
                'email.required' => "กรุณาป้อนรหัสบัตร",
                'email.unique' => "รหัสบัตรซ้ำ",
               
            ],

        );

        $tableName = new Debtors();
        $tableName->name = $request->name;
        $tableName->address = $request->address;
        $tableName->phone = $request->phone;
        $tableName->email  = $request->email ;
        $tableName->save();
        return redirect()->route('debtors.index')->with('success', "บันทึกข้อมูลเรียบร้อย");

    }
}
