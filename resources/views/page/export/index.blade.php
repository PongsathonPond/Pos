<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExportPDF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
    </style>
</head>

<body>
<table class="body-wrap">
    <tbody>
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td class="content-block" style="">
                                        <h2 style="text-align: center; margin-bottom: 0">ใบเสร็จรับเงิน
                                            ร้าน ส.พานิชย์
                                            </h4>
                                            <h3 style="text-align: center"> 137 หมู่6 ตำบลมะเกลือใหม่ อำเภอสูงเนิน จังหวัดนครราชสีมา 30170</h4>
                                                <h3 style="text-align: center"> โทรศัพท์ : 090-2382762</h3>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody>
                                            <tr>
                                                <td>รหัสใบเสร็จ:
                                                    <br>
                                                    ผู้ขาย:<br>
                                                    ผู้รับเงิน:
                                                  <br>เวลาซื้อขาย :

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0"
                                                           cellspacing="0">

                                                        <tbody>

                                                        <tr class="total">
                                                            <td>รายการ</td>

                                                            <td class="aligncenter">
                                                                จำนวน
                                                            </td>
                                                            <td class="alignright">
                                                                ราคา
                                                            </td>
                                                        </tr>
                                                        @php

                                                            $i = 0;
                                                            $j = 0;

                                                        @endphp


                                                                <tr>
                                                                    <td>

                                                                    </td>

                                                                    <td class="aligncenter">

                                                                    </td>

                                                                    <td class="alignright">

                                                                    </td>
                                                                </tr>




                                                        <tr>
                                                            <td class="aligncenter">

                                                            </td>

                                                            <td class="alignright"
                                                                width="60%">ราคารวม</td>

                                                            <td class="alignright">

                                                                บาท

                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td class="aligncenter">

                                                            </td>

                                                            <td class="alignright"
                                                                width="60%">จำนวนเงินที่รับ
                                                            </td>

                                                            <td class="alignright">
                                                               บาท

                                                            </td>
                                                        </tr>

                                                        <tr class="total">
                                                            <td class="aligncenter">

                                                            </td>

                                                            <td class="alignright"
                                                                width="60%">เงินทอน</td>

                                                            <td class="alignright">

                                                                บาท

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h1 style="margin-left: 35%; margin-bottom: 10%">Thank You</h1>
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tbody>
                        <tr>
                            <td class="aligncenter content-block">Questions? Email <a
                                    href="mailto:">khaovovl@hotmail.com</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </td>
        <td></td>
    </tr>
    </tbody>
</table>

<style type="text/css">
    /* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
    * {
        margin: 0;
        padding: 0;
        font-family: "THsarabunNew;";
        box-sizing: border-box;
        font-size: 14px;
    }

    img {
        max-width: 100%;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        line-height: 1.6;
    }

    /* Let's make sure all tables have defaults */
    table td {
        vertical-align: top;
    }

    /* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
    body {
        font-family: "THsarabunNew;";
        background-color: #f6f6f6;
    }

    .body-wrap {
        background-color: #f6f6f6;
        width: 100%;
    }

    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        /* makes it centered */
        clear: both !important;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        display: block;
        padding: 20px;
    }

    /* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
    .main {
        background: #fff;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
    }

    .content-wrap {
        padding: 20px;
    }

    .content-block {
        padding: 0 0 20px;
    }

    .header {
        width: 100%;
        margin-bottom: 20px;
    }

    .footer {
        width: 100%;
        clear: both;
        color: #999;
        padding: 20px;
    }

    .footer a {
        color: #999;
    }

    .footer p,
    .footer a,
    .footer unsubscribe,
    .footer td {
        font-size: 12px;
    }

    /* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
    h1,
    h2,
    h3 {

        font-family: "THsarabunNew;";
        color: #000;
        margin: 40px 0 0;
        line-height: 1.2;
        font-weight: 400;
    }

    h1 {
        font-family: "THsarabunNew;";
        font-size: 32px;
        font-weight: 500;
    }

    h2 {
        font-family: "THsarabunNew;";
        font-size: 24px;
    }

    h3 {
        font-family: "THsarabunNew;";
        font-size: 18px;
    }

    h4 {
        font-family: "THsarabunNew;";
        font-size: 14px;
        font-weight: 600;
    }

    p,
    ul,
    ol {
        margin-bottom: 10px;
        font-weight: normal;
    }

    p li,
    ul li,
    ol li {
        margin-left: 5px;
        list-style-position: inside;
    }

    /* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
    a {
        color: #1ab394;
        text-decoration: underline;
    }

    .btn-primary {
        text-decoration: none;
        color: #FFF;
        background-color: #1ab394;
        border: solid #1ab394;
        border-width: 5px 10px;
        line-height: 2;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        border-radius: 5px;
        text-transform: capitalize;
    }

    /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
    .last {
        margin-bottom: 0;
    }

    .first {
        margin-top: 0;
    }

    .aligncenter {
        text-align: center;
    }

    .alignright {
        text-align: right;
    }

    .alignleft {
        text-align: left;
    }

    .clear {
        clear: both;
    }

    /* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
    .alert {
        font-size: 16px;
        color: #fff;
        font-weight: 500;
        padding: 20px;
        text-align: center;
        border-radius: 3px 3px 0 0;
    }

    .alert a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
    }

    .alert.alert-warning {
        background: #f8ac59;
    }

    .alert.alert-bad {
        background: #ed5565;
    }

    .alert.alert-good {
        background: #1ab394;
    }

    /* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
    .invoice {
        margin: 40px auto;
        text-align: left;
        width: 80%;
    }

    .invoice td {
        padding: 5px 0;
    }

    .invoice .invoice-items {
        width: 100%;
    }

    .invoice .invoice-items td {
        border-top: #eee 1px solid;
    }

    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }

    /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
    @media only screen and (max-width: 640px) {

        h1,
        h2,
        h3,
        h4 {
            font-weight: 600 !important;
            margin: 20px 0 5px !important;
        }

        h1 {
            font-size: 22px !important;
        }

        h2 {
            font-size: 18px !important;
        }

        h3 {
            font-size: 16px !important;
        }


        .container {
            width: 100% !important;
        }

        .content,
        .content-wrap {
            padding: 10px !important;
        }

        .invoice {
            width: 100% !important;
        }
    }
</style>

<script type="text/javascript"></script>
</body>


</html>