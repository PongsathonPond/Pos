@extends('layouts.shop')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')
 
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header p-3 pt-2">

                <h5>รายการขายปลีก</h5>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="myTable">
                    <thead>
                        <tr>

                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">
                                ID SLIP
                            </th>
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">
                                ประเภทการชำระ
                            </th>
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">
                                ยอดรวม
                            </th>
                        
                            <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">
                                เวลาที่ขาย</th>

                                <th class="text-uppercase text-secondary  text-1xl font-weight-bolder opacity-7 ps-2">
                                    ใบเสร็จ
                                </th>
                              
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>


                        @foreach ($list as $item)
                       
                        
                       
                            <tr>
                                <td>
                                  
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <b>
                                                MAKE_TEST
                                            </b>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if($item->type_sale == "ค้างชำระ")
                                    <b style="color:rgb(238, 22, 22)">{{ $item->type_sale }}</b>
                                    @elseif($item->type_sale == "โอนผ่านบัญชีธนาคาร")
                                    <b style="color:rgb(38, 3, 233)">{{ $item->type_sale }}</b>
                                    @elseif($item->type_sale == "เงินสด")
                                    <b>{{ $item->type_sale }}</b>
                                    
                                    @endif

                                    

                                </td>
                                <td>
                                    <b>{{ $item->total_price }} บาท</b> 

                                </td>
                                <td>
                                    <b>{{ $ThaiFormat->makeFormat($item->created_at) }}</b>

                                </td>
                                <td>
                                         <a   href="{{ URL::to('generate-pdf2/' . $item->id) }}"
                                        target="_blank"  class="text-danger" > ออกใบเสร็จ <i class="fas fa-print"></i></a>

                                </td>


                                <td class="align-middle">
                                    <button type="button" class="btn btn-secondary btn-sm bg-gradient-secondary mb-3  "
                                        data-bs-toggle="modal" data-bs-target="#modal-default"> <i
                                            class="far fa-eye"></i></button>

                                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog"
                                        aria-labelledby="modal-default" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title font-weight-normal" id="modal-title-default">
                                                        <b>ข้อมูลเพิ่มเติม</b>
                                                    </h6>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="p-4">
                                                        <form>

                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <div class="input-group input-group-static mb-4">
                                                                        <label><b>ชื่อผู้ค้างชำระ</b></label>
                                                                       
                                                                        @foreach ($item->testto as $item1)
                       
                     
                          
                                                                        <input type="text" class="form-control"  value=" {{ $item1->name }}" readonly>
                                                                        @endforeach
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-success">บันทึก</button>
                                                    <button type="button" class="btn btn-link  ml-auto"
                                                        data-bs-dismiss="modal">ปิด</button>
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
