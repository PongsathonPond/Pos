<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index($id) 
    {
        
        $int = (int)$id;
        
        $productCode =  $int;
       
        return view('page.barcode.barcode', [
            'productCode' => $productCode
        ]);
    }
}