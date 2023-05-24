<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $typeCategory = Categories::all();
       
        if ($request->ajax()) {
 // Change the pagination size as per your requirement
                
                // $data = DB::table('products')
                // ->join('categories', 'products.category_id', '=', 'categories.id')
                // ->select('products.*', 'categories.name as category_name')
                // ->orderByDesc('products.created_at');

                $data = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.name as category_name')
                ->orderByDesc('products.created_at');
                // $data = DB::table('products')->orderByDesc('products.created_at');
                
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionButtons = '<button type="button" style="margin: 0%;" class="btn btn-secondary btn-sm bg-gradient-secondary mb-3"
                        data-bs-toggle="modal" data-bs-target="#modal-default' . $data->id_product . '">
                        <i class="far fa-edit"></i></button> ';
        
                        
                    $actionButtons .= '<a href="' . url('/barcode/' . $data->id_product) . '" style="margin: 0%;" target="_blank"
                        class="btn btn-secondary btn-sm bg-gradient-secondary mb-3"
                        onclick="return confirm(\'สร้างบาร์โค้ด ?\')">สร้างบาร์โค้ด</a>';
        
                    $actionButtons .= '<a href="' . url('/product/delete/' . $data->id_product) . '" style="margin:1%;"
                        class="btn btn-secondary btn-sm bg-gradient-danger mb-3"
                        onclick="return confirm(\'ลบหรือไม่ ?\')">ลบข้อมูล</a>';

                    $actionButtons .= ' <div class="modal fade" id="modal-default' . $data->id_product .'" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title font-weight-normal" id="modal-title-default">
                                    <b>จัดการสินค้า</b>
                                </h6>
                                <button type="button" class="btn-close text-dark"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-4">
                              
                                        <form action="' . url('/product-update/' . $data->id_product) .'"
                                            method="post">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">
                                        <div class="row">
                
                                            <div class="col-12">
                                                <div class="input-group input-group-static mb-4">
                                                    <label><b>ชื่อสินค้า</b></label>
                                                    <input type="text" class="form-control"  name="name" value="'.$data->name.'" >
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-static mb-4">
                                                    <label><b>ราคาปลีก</b></label>
                                                    <input type="text" class="form-control" name="priceP" value="'.$data->priceP.'">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group input-group-static mb-4">
                                                    <label><b>ราคาส่ง</b></label>
                                                    <input type="text" class="form-control" name="priceS" value="'.$data->priceS.'">
                                                </div>
                                            </div>
                
                                            <div class="col-12">
                                                <div class="input-group input-group-static mb-4">
                                                    <label><b>จำนวน</b></label>
                                                    <input type="text" class="form-control" name="qty" value="'.$data->qty.'" >
                                                </div>
                                            </div>
                                        </div>
                
                                        <div >
                                            <button type="submit" class="btn bg-gradient-success">บันทึก</button>
                                            <button type="button" class="btn btn-link  ml-auto"
                                                data-bs-dismiss="modal">ปิด</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>';
        
                
                    return $actionButtons;
                })
                ->rawColumns(['action'])
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && !empty($request->search['value'])) {
                        $searchValue = $request->search['value'];
                        $searchTerms = explode('/', $searchValue);
                        $categorySearchTerm = trim($searchTerms[0]);
                        $nameSearchTerm = isset($searchTerms[1]) ? trim($searchTerms[1]) : null;
            
                        $query->where(function($subquery) use ($categorySearchTerm, $nameSearchTerm) {
                            $subquery->where('categories.name', 'like', "%$categorySearchTerm%")
                                     ->where('products.name', 'like', "%$nameSearchTerm%");
                        });
                    }
                })
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
