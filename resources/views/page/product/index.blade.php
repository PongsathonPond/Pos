@extends('layouts.shop')

@section('content')
    <div class="col-lg-2">
        <div class="card ">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">เพิ่มสินค้า</h6>
                    </div>

                </div>
            </div>
            <div class="card-body p-3 pb-0">

                <form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
                    <form id="post-form">
                        @csrf
                        <div class="row">


                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="ชื่อสินค้า" name="name">
                            </div>

                            <div class="input-group input-group-outline mb-1">
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    <option>กรุณาเลือกประเภท</option>
                                    @foreach ($typeCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-outline my-3">
                                    <input type="text" class="form-control" placeholder="ราคาปลีก" name="priceP">
                                </div>


                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-outline my-3">
                                    <input type="text" class="form-control" placeholder="ราคาส่ง" name="priceS">
                                </div>


                            </div>
                            <div class="input-group input-group-outline my-1">
                                <input type="text" class="form-control" placeholder="จำนวน" name="qty">
                            </div>

                            <div class="input-group input-group-static my-3">
                                <input type="text" class="form-control" placeholder="BARCODE ID" name="id">
                            </div>

                            <button type="input" class="btn btn-success">Add Product</button>


                        </div>

                    </form>
            </div>
        </div>

        <br><br>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <strong>สำเร็จ !</strong> เพิ่มสินค้าลงในรายการขายเรียบร้อย
            </div>
        @endif

        @if (session('update'))
        <div class="alert alert-success" role="alert">
            <strong>สำเร็จ !</strong> แก้ไขข้อมูลสินค้าเรียบร้อย
        </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <strong>พบข้อผิดพลาด !</strong> ไม่พบสินค้าในฐานข้อมูล
            </div>
        @endif
       
    </div>

    <div class="col-lg-10">

        <div class="card">
            <div class="card-header p-3 pt-2">

                <h5>รายการสินค้า</h5>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7">รหัสสินค้า</th>
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">ชื่อสินค้า
                            </th>
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">
                                ราคาปลีก/ส่ง</th>
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">จำนวน</th>

                            <th></th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($product as $item)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <b>
                                                {{ $item->id_product }}
                                            </b>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <b>{{ $item->name }}</b>

                                </td>
                                <td>
                                    <span class="badge badge-pill badge-lg bg-gradient-success">{{ $item->priceP }}</span>
                                    <span class="badge badge-pill badge-lg bg-gradient-warning">{{ $item->priceS }}</span>
                                </td>
                                <td>
                                    <b>
                                        {{ $item->qty }}
                                    </b>

                                </td>

                                <td class="align-middle">

                                    <button type="button" class="btn btn-secondary btn-sm bg-gradient-secondary mb-3 "
                                        data-bs-toggle="modal" data-bs-target="#modal-default{{$item->id_product }}"> <i
                                            class="far fa-edit"></i></button>

                                            <a href="{{ url('/barcode/' . $item->id_product) }} "  target="_blank" class="btn btn-secondary btn-sm bg-gradient-secondary mb-3"
                                                onclick="return confirm('สร้างบาร์โค้ด ?')"> สร้างบาร์โค้ด</a>
        
           



                                        
                                                


                                    <div class="modal fade" id="modal-default{{$item->id_product }}" tabindex="-1" role="dialog"
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
                                                  
                                                            <form action="{{ url('/product-update/' . $item->id_product) }}"
                                                                method="post">
                                                                @csrf
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label><b>ชื่อสินค้า</b></label>
                                                                        <input type="text" class="form-control"  name="name" value="{{$item->name}}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label><b>ราคาปลีก</b></label>
                                                                        <input type="text" class="form-control" name="priceP" value="{{$item->priceP}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label><b>ราคาส่ง</b></label>
                                                                        <input type="text" class="form-control" name="priceS" value="{{$item->priceS}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label><b>จำนวน</b></label>
                                                                        <input type="text" class="form-control" name="qty" value="{{$item->qty}}" >
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
                                    </div>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                paging: true,
                lengthMenu: [10, 25, 50, 75, 100, 10000],
                ordering: false,
                info: false,

                "language": {
                    "search": "<b>ค้นหา</b>",
                    "zeroRecords": "ไม่พบข้อมูล - ขออภัย",
                    "info": '',
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "",
                    "lengthMenu": "   _MENU_ ",
                    "paginate": {
                        "previous": false,
                        "next": false
                    }
                }
            });
        });
    </script>
@endsection
