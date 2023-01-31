@extends('layouts.shop')
@section('content')

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">เพิ่มสินค้า</h6>
                    </div>

                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <form>
                    <div class="row">

                    <div class="input-group input-group-static my-3">
                        <input type="text" class="form-control" placeholder="BARCODE ID">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <input type="text" class="form-control" placeholder="ชื่อสินค้า">
                    </div>

                        <div class="input-group input-group-outline mb-1">
                            <select class="form-control" id="exampleFormControlSelect1" >
                                <option>กรุณาเลือกประเภท</option>
                                <option>2</option>

                            </select>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="ราคาปลีก">
                            </div>


                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="ราคาส่ง">
                            </div>


                        </div>
                        <div class="input-group input-group-outline my-2">
                            <input type="text" class="form-control" placeholder="จำนวน">
                        </div>


                            <button type="input" class="btn btn-success">Success</button>


                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
