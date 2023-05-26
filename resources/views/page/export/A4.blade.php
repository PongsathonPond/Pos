<html>

<head>
  <style>
    header {
      
      margin-left: auto;
      margin-right: auto;
     
    }

    body {
      margin: 0in 0in 0in 0in;
      width: 8.5in;
      height: 11in;
    }

    * {
      font-family: arial;
      font-size: 15px;
    }

    th {
      background-color: gray;
      color: white;
      font-weight: bold;
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
     <b style="font-size:25px">ร้าน ส.พานิชย์</b> <br>
     
     <p style="font-size:15px">137 หมู่ 6 ตำบล มะเกลือใหม่ อ.สูงเนิน จ.นครราชสีมา 30170
โทรศัพท์ : 090-2382762</p>
 
<p style="font-size:15px">
โทรศัพท์ : 090-2382762</p>
  </header>
  <table cellspacing=0 cellpadding="2" border=0 style="width:8.5in">
    <thead>
      <tr>
        <th colspan="3">
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
       
        <th align="right" style="width:0.75in" class="price">
          จำนวน
        </th>
        <th align="center" style="width:0.75in">
          ราคา
        </th>
        <th align="right" style="width:0.75in" class="price">
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
        <td align="right" class="price">{{$print->listcount[$key]}}</td>
        <td align="center">{{$print->listprice[$key]}} บาท</td>
        <td align="right" class="price">{{$print->listcount[$key]*$print->listprice[$key]}} บาท</td>
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
          <td style="width:0.75in" align="right" class="price">{{$print->change}} บาท</td>
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

  <script>
     window.print()
  </script>
</body>

</html>