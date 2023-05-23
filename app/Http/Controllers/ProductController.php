<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $typeCategory = Categories::all();
        // $product = Product::all();
        
      
        
        // return view('page.product.index', compact('typeCategory', 'product'));

        // if ($request->ajax()) {
        //     $data = Product::select(['id_product', 'category_id', 'name', 'priceP','priceS','qty']) // Select only the necessary columns
        //         ->paginate(10); // Change 10 to the number of items you want per page

        //     return datatables()->of($data)
        //         ->addColumn('action', function ($row) {
        //             // Add any action buttons you want here
        //             // Example: return '<a href="'.route('users.edit', $row->id).'" class="btn btn-primary">Edit</a>';
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
                
        // }

        if ($request->ajax()) {
            $data = Product::select('*')->latest()->get(); // Change the pagination size as per your requirement

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('page.product.index', compact('typeCategory'));

    }
    

    public function store(Request $request)
    {
        $request->validate([
            'id_product' => 'required|unique:products',
            'name' => 'required',
            'priceP' => 'required',
            'priceS' => 'required',
            'qty' => 'required',
        ],
            [
                'id_product.unique' => "รหัสสินค้าซ้ำ",
                'name.required' => "กรุณากรอกชื่อสินค้า",
                'priceP.required' => "กรุณากรอกราคาขายปลีกสินค้า",
                'priceS.required' => "กรุณากรอกราคาขายส่งสินค้า",
                'qty.required' => "กรุณากรอกจำนวนสินค้า",
            ],

        );

        $tableName = new Product();
        $tableName->id_product = $request->id_product;
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

    public function delete($id)
    {
        //ลบข้อมูล
        
        $delete = Product::where('id_product',$id)->delete();
        
        return redirect()->back()->with('delete', "ลบเรียบร้อยแล้ว");

    }

    public function fetchRecords(Request $request)
    {
    $records = Product::all();
    return $records;
    }

}
