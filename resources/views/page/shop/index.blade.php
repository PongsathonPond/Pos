@extends('layouts.shop')
@section('content')
    <div class="col-3 mt-2">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">storefront</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">สแกนบาร์โค้ด</p>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">

                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="input-group input-group-static mb-4">
                        <input type="text" class="form-control" name="name" id="inputkey" placeholder="BARCODE ID">
                    </div>
                </form>
            </div>
        </div>



        <br><br>
        @if (session('success'))

            <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                <span class="alert-text">  <strong>สำเร็จ !</strong> เพิ่มสินค้าลงในรายการขายเรียบร้อย</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                <span class="alert-text">  <strong>พบข้อผิดพลาด !</strong> ไม่พบสินค้าในฐานข้อมูล</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('delete'))
            <div class="alert alert-warning alert-dismissible text-white fade show" role="alert">
                <span class="alert-text">  <strong>สำเร็จ !</strong> ลบสินค้าออกจากรายการขายเรียบร้อย</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


    </div>

    <div class="col-9 mt-2">

        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">รายการขาย</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7">ชื่อสินค้า
                                </th>
                                <th class="text-uppercase text-secondary text-1xl font-weight-bolder opacity-7 ps-2">
                                    จำนวน</th>
                                <th class="text-center text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7">
                                    ราคาต่อชิ้น</th>

                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 ">{{ $item->name }}</h6>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 ">{{ $item->quantity }}</h6>


                                    </td>
                                    <td class="align-middle text-center text-sm">


                                        <span class="badge badge-pill badge-lg bg-gradient-success text-1xl" >    <h5 class="mb-0 " style="color: white">{{ $item->price }}</h5></span>
                                    </td>

                                    <td class="align-middle">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">

                                            <button class="btn bg-gradient-danger btn-sm"> <i
                                                    class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-body ">

                <div class="row">
                    <div class="col-4">
                        <div class="input-group input-group-static mb-4">
                            <label>
                                <h4>จำนวนเงินที่รับ</h4>
                            </label>
                            <input type="text" class="form-control" name="name" id="num2"
                                style="color: rgb(19, 23, 235)" placeholder="ยอดเงิน" required>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="input-group input-group-static mb-4">
                            <label>
                                <h4>ประเภทการชำระ</h4>
                            </label>
                            <div class="input-group input-group-static mb-1">
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id"
                                    style="color: rgb(19, 23, 235)">

                                    <option value="เงินสด"><b>เงินสด</b></option>
                                    <option value="โอนผ่านบัญชีธนาคาร"><b>โอนผ่านบัญชีธนาคาร</b></option>
                                    <option value="ค้างชำระ"><b>ค้างชำระ</b></option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group input-group-static mb-4">
                            <label>
                                <h4>รหัสผู้ค้างชำระ</h4>
                            </label>
                            <input type="text" class="form-control" name="name" id="inputkey"
                                style="color: rgb(19, 23, 235)" placeholder="กรณีเลือกประเภทเป็นค้างชำระเท่านั้น" required>
                        </div>
                    </div>

                </div>
                <input type="hidden" class="btn btn-success " id="num1" value=" {{ Cart::getTotal() }}">
                <h4> ยอดรวม : <span
                        class="badge badge-pill badge-lg bg-gradient-success">{{ number_format(Cart::getTotal(), 2, '.', ',') }}</span>
                    บาท
                </h4>

                <div class="row">

                    <h4> เงินทอน : <span class="badge badge-pill badge-lg bg-gradient-secondary">
                            <input class="form-control" style="color: rgb(255, 255, 255) ;font-size:1vw;width:120px"
                                id="answer" readonly> </span>

                        <a class="badge badge-pill badge-lg bg-gradient-secondary" style="font-size:1vw"
                            onclick="calculate()"> คำนวณ </a>

                    </h4>





                </div>

            </div>
        </div>

        <script>
            window.onload = function() {
                document.getElementById("inputkey").focus();
            }
        </script>
        <script>
            function calculate() {
                var field1 = document.getElementById("num1").value;
                var field = document.getElementById("num2").value;
                var result = parseFloat(field) - parseFloat(field1);

                if (!isNaN(result)) {
                    document.getElementById("answer").value = result;


                }
            }
        </script>
    @endsection
