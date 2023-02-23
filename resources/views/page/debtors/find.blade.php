@extends('layouts.shop')
@inject('ThaiFormat', 'App\Services\ThaiDate')
@section('content')

<h4>รายการหนี้: {{$deb->name}} เบอร์โทร : {{$deb->phone}}</h4>
<br>
<div class="col-lg-6">



    <div class="card">
        <div class="card-header p-3 pt-2">

            <h5>ยอดค้าง</h5>
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
                          
                       
                    </tr>
                </thead>

                <tbody>

                    @php
                        $sumtotal = 0;
                    @endphp

                    @foreach ($deb2 as $item)
                   
               
                   
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
                                <b>{{$item->type_sale}}</b>
                            </td>

                            <td>
                                
                                <b>{{$item->total_price}} บาท</b>

                                @php
                                    $sumtotal += $item->total_price ;
                                @endphp
                            </td>

                            <td>
                                <b>{{ $ThaiFormat->makeFormat($item->created_at) }}</b>

                            </td>
                           


                            <td class="align-middle">
                                <a   href="{{ URL::to('generate-pdf2/' . $item->id) }}"
                                    target="_blank"  class="text-danger" > ออกใบเสร็จ <i class="fas fa-print"></i></a>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <h5 style="margin-left: 10px">ยอดค้างชำระ: {{ $sumtotal}} บาท</h5>
            
        </div>
    </div>

</div>
    <div class="col-lg-6">

        <div class="card">
            <div class="card-header p-3 pt-2">

                <h5>รายการชำระหนี้</h5>
            </div>
                <div class="col-6">
                    <!-- Button trigger modal -->
<button type="button" class="btn bg-gradient-primary " style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#exampleModal">
    เพิ่มการชำระหนี้ของ : {{$deb->name}}
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">แบบฟอร์มเพิ่มการจ่ายเงิน</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
            <div class="modal-body">
               
                    <form>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-group input-group-static mb-4">
                                    <label><b>ชื่อผู้ค้างชำระ</b></label>
                                   

                                    <input type="text" class="form-control"  >
                                  
                                </div>
                            </div>


                        </div>

                    </form>
            
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn bg-gradient-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
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


                        @foreach ($deb as $item)
                       
                        
                       
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
                                 

                                    

                                </td>
                                <td>
                                    

                                </td>
                                <td>
                               

                                </td>
                                <td>
                                       

                                </td>


                                <td class="align-middle">
                               

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
