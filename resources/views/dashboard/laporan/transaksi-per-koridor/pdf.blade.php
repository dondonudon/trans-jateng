<!DOCTYPE html>
<html lang="id">
<head>
    <title>LAPORAN Transaksi per Koridor</title>

    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin-top: 100px;
            margin-right: 50px;
            margin-left: 50px;
            margin-bottom: 100px;
            font-family: 'Open Sans', sans-serif;;
            font-size: 14px;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 1.5cm;
            margin-bottom: 0.5cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /*background-color: #03a9f4;*/
            color: black;
            text-align: left;
            line-height: 20px;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /*background-color: #03a9f4;*/
            color: black;
            text-align: center;
            line-height: 35px;
        }

        .header-brt {
            padding-left: -120px;
            font-weight: bold;
            font-size: 30px;
            text-align: center;
            vertical-align: bottom
        }

        .header-tjt {
            padding-left: -120px;
            color: darkred;
            font-weight: bold;
            font-size: 23px;
            text-align: center;
            vertical-align: center
        }

        .header-title {
            padding-left: -120px;
            font-size: 20px;
            text-align: center;
            font-family: 'Times New Roman',serif;
            font-weight: bold;
            vertical-align: center
        }

        .footer-cetak {
            width: 100%;
            margin: 10px;
            font-size: 10px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td, .table th {
            border: 1px solid #dddddd;
            /*text-align: left;*/
            padding: 3px;
        }

        .table-sm td, .table-sm th {
            /*border: 1px solid black;*/
            margin: 1px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .color-gray {
            background-color: #e4e4e4;
        }
    </style>
</head>
<body>
<header>
    <table class="" style="width: 100%; border-bottom: 3px solid darkred">
        <tr>
            <td rowspan="3" style="width: 20%;">
                <img src="{{ public_path('assets/logo/with-name/logo-1000.png') }}" class="img-fluid mt-3" style="width: 120px" alt="Logo">
            </td>
            <td class="header-brt">BUS RAPID TRANSIT</td>
        </tr>
        <tr>
            <td class="header-tjt">TRANS JAWA TENGAH</td>
        </tr>
        <tr style="">
            <td class="header-title">LAPORAN TRANSAKSI PER KORIDOR</td>
        </tr>
    </table>
</header>

<footer>
    <table class="footer-cetak">
        <tr>
            <td>
                Dicetak oleh {{ request()->session()->get('name') }} ({{ date('d F Y - H:i:s') }})
            </td>
        </tr>
    </table>
</footer>

<main style="margin-top: 40px">
    <div style="font-weight: bold">Data Transaksi Tanggal {{ date('d M Y',strtotime(request()->segment(6))) }} - {{ date('d M Y',strtotime(request()->segment(7))) }}</div>
    <table class="table" style="width: 100%; padding-top: 0.5cm">
        <thead style="background-color: darkred; color: white">
        <tr class="text-center">
            <th class="text-center" style="width: 8%">No.</th>
            <th style="width: 40%">PETUGAS TIKET</th>
            <th style="width: 30%">BUS</th>
            <th style="width: 30%">KORIDOR</th>
            <th style="width: 22%">TRANSAKSI</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @php($total = 0)
        @foreach($data as $d)
            <tr>
                <td class="text-center">{{ $i }}</td>
                <td>{{ $d->petugas }}</td>
                <td>{{ $d->bus }}</td>
                <td>{{ $d->koridor }}</td>
                <td class="text-right">{{ number_format($d->pendapatan) }}</td>     @php($total += $d->pendapatan)
            </tr>
            @php($i++)
        @endforeach
        <tr style="background-color: lightgray">
            <th class="text-center" colspan="4">TOTAL TRANSAKSI</th>
            <th class="text-right">{{ number_format($total) }}</th>
        </tr>
        </tbody>

    </table>
</main>


</body>
</html>