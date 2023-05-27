

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>A4 Template</title>
  </head>
  <style>
 
 header {
   
   margin-left: auto;
   margin-right: auto;
  
 }

 body {
   margin: 0in 0in 0in 0.3in;
   width: 8.5in;
   height: 11in;
 }

 * {
   font-family: arial;
   font-size: 15px;
   
 }

 th {
    background-color: #c17676;
   color: white;
   font-weight: bold;
 }

 img {
   width: 150px;
   margin: 0.1in;
 }

 td {
   vertical-align: top;
 }

 .store-info div {
   font-size: 1.2em;
 }

 .store-info div.company-name {
   font-size: 1.5em;
   font-weight: bold;
 }

 table.order-info td {

   padding: 2px 4px 2px 4px;
 }

 table.order-info tr td.label {
   font-weight: bold;
   text-align: right;
   border-right: solid 1px #c0c0c0;

 }

 table.order-info tr td.label.first {}

 table.order-info tr td.label.last {}

 table.line-items {
   margin-top: 0.1in;
   padding: 0.1in 0in 0.1in 0in;
 }

 table.line-items th {
   padding: 2px;
 }

 table.footer {
   border-top: solid 1px #707070;
 }

 table.footer td.label {
   font-weight: bold;
   text-align: right;
 }

 td.notes {
   padding: 0.1in;
   font-style: italic;
 }

 .barcode {
   font-family: "Free 3 of 9 Extended";
   font-size: 48pt;
 }

</style>
</head>

<body>
<!-- Order Header - THIS SECTION CAN BE MODIFIED AS NEEDED -->
<header>

<div class="container">
  <div class="row">
    <div class="col-3"> <img src="/img/SPN.jpg" st>
    <br>
</div>
    <div class="col-9" style="margin-top: 5%;">
<b style="font-size:25px">ร้าน ส.พานิชย์</b> <br>
<b style="font-size:15px">137 หมู่ 6 ตำบล มะเกลือใหม่ อ.สูงเนิน จ.นครราชสีมา 30170</b> <br>
<b style="font-size:15px"> โทรศัพท์ : 092-5377750</b>
</div>
</div>
</div>






</header>
<table cellspacing=0 cellpadding="2" border=0 style="width:100%">
 <thead>
   <tr >
     <th colspan="3" style="text-align: center;" >
       รายละเอียด
     </th>
   </tr>
 </thead>
 <tbody>
   <tr>
     <td colspan="2" style="width:4.5in" class="store-info">
       
     </td>
     <td style="width:3.5in;" align="right" valign="top">

     </td>
   </tr>
   <tr>
     <td style="height:0.15in"></td>
   </tr>
   <tr>
     <td align="right" style="width:1in">
       <b>ส่งถึง:</b>
     </td>
     <td style="width:3.5in; font-size:14px">
       <div>ชื่อผู้ซื้อ</div>
       <div>ที่อยู่</div>
     </td>
     <td style="width:2.5in">
       <table cellspacing="0" border="0" class="order-info">
         <tr>
           <td align="right" class="label first">เลขที่</td>
           <td> {{$print->slip_id}}</td>
         </tr>
         <tr>
           <td align="right" class="label">วันที่ขาย</td>
           <td>{{$print->created_at}}</td>
         </tr>
         <tr>
           <td align="right" class="label last">พนักงานขาย</td>
           <td>{{$print->user_auth}}</td>
         </tr>
       </table>
     </td>
   </tr>
 </tbody>
</table>

<!-- END Order Header -->

<table cellspacing=0 cellpadding="2" border="0" style="width:100%" class="line-items">
 <thead>

   <!-- Order Items Header - THIS SECTION CAN BE MODIFIED AS NEEDED -->

   <tr>
     <th align="left" style="width:0.5in" class="sku">
       ลำดับ
     </th>
     <th align="center" style="width:1.5in" class="sku">
       รายการสินค้า
     </th>
    
     <th style="text-align: center;" style="width:0.75in" class="price">
       จำนวน
     </th>
     <th style="text-align: center;" style="width:0.75in">
       ราคา
     </th>
     <th style="text-align: center;" style="width:0.75in" class="price">
       จำนวนเงิน
     </th>
   </tr>

   <!-- END Order Items Header -->

 </thead>
 <tbody>
            @php                                                                 
             $i = 0;
              @endphp
 @foreach($print->listall as $key =>$row)
 
   <!-- Order Items - THIS SECTION CAN BE MODIFIED AS NEEDED -->
   <tr>
     <td class="sku">{{$i+=1}}</td>
    
     <td>{{$row}}</td>
     <td style="text-align: center;" class="price">{{$print->listcount[$key]}}</td>
     <td style="text-align: center;">{{$print->listprice[$key]}} บาท</td>
     <td style="text-align: center;" class="price">{{$print->listcount[$key]*$print->listprice[$key]}} บาท</td>
   </tr>
   <!-- END Order Items -->
   
 </tbody>
 @endforeach

</table>

<!-- Order Footer - THIS SECTION CAN BE MODIFIED AS NEEDED -->

<table cellspacing=0 cellpadding="2" border="0" style="width:100%" class="footer">

 <p>
   <br>
 </p>
 <tbody>
 <br>
   <tr>
      
     <td align="right" class="label price">
       จำนวนเงินรวม:
     </td>
     <td style="width:0.75in" align="right" class="price"></td>
   </tr>
   <tr>
     <tr class="tax">
       <td align="right" class="label price">
         ส่วนลด:
       </td>
       <td style="width:0.75in" align="right" class="price"></td>
     </tr>
     <tr>
       <td align="right" class="label price">
         มูลค่าสินค้า:
       </td>
       <td style="width:0.75in" align="right" class="price">{{$print->total_price}} </td>
     </tr>
     <tr>
       <td align="right" class="label price">
         รวมเงินทั้งสิ้น:
       </td>
       <td style="width:0.75in" align="right" class="price"></td>
     </tr>
 </tbody>
</table>

<!-- END Order Footer -->

</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

  <script>
  window.print()
</script>
</html>



