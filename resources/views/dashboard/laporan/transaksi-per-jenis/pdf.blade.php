<!DOCTYPE html>
<html lang="id">
<head>
    <title>LAPORAN Transaksi per Jenis</title>

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

        .page-break {
            page-break-after: always;
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
            <td style="padding-left: -120px; font-size: 30px; text-align: center; vertical-align: bottom">BUS RAPID TRANSIT</td>
        </tr>
        <tr>
            <td style="padding-left: -120px; font-size: 20px; text-align: center; vertical-align: center">TRANS JAWA TENGAH</td>
        </tr>
        <tr style="">
            <td style="padding-left: -120px; font-size: 15px; text-align: center; font-family: 'Times New Roman',serif; font-weight: bold; vertical-align: center">LAPORAN TRANSAKSI PER JENIS ( {{ date('d F Y',strtotime(request()->segment(6))) }} )</td>
        </tr>
    </table>
</header>

<footer style="font-size: 15px">
    <table style="width: 100%; margin: 10px">
        <tr>
            <td>
                Dicetak oleh {{ request()->session()->get('name') }} ({{ date('d F Y - H:i:s') }})
            </td>
        </tr>
    </table>
</footer>

@php
$jam = [
    '00' => 0,
    '01' => 0,
    '02' => 0,
    '03' => 0,
    '04' => 0,
    '05' => 0,
    '06' => 0,
    '07' => 0,
    '08' => 0,
    '09' => 0,
    '10' => 0,
    '11' => 0,
    '12' => 0,
    '13' => 0,
    '14' => 0,
    '15' => 0,
    '16' => 0,
    '17' => 0,
    '18' => 0,
    '19' => 0,
    '20' => 0,
    '21' => 0,
    '22' => 0,
    '23' => 0,
];
$totalTransaksi = 0;
$totalRupiah = 0;
@endphp
<main style="margin-top: 40px">
    <div style="font-weight: bold">Transaksi per Jenis Tiket</div>
    <table class="table" style="width: 100%; padding-top: 0.5cm">
        <thead style="background-color: darkred; color: white">
        <tr class="text-center">
            <th rowspan="2">JENIS TRANSAKSI</th>
            <th colspan="24">JAM TRANSAKSI</th>
            <th rowspan="2">TOTAL TRAN..</th>
            <th rowspan="2">TOTAL RUPIAH</th>
        </tr>
        <tr style="text-align: center">
            <th>00</th>
            <th>01</th>
            <th>02</th>
            <th>03</th>
            <th>04</th>
            <th>05</th>
            <th>06</th>
            <th>07</th>
            <th>08</th>
            <th>09</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
            <th>19</th>
            <th>20</th>
            <th>21</th>
            <th>22</th>
            <th>23</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @php($total = 0)
        @foreach($data as $d)
            <tr>
                <td>{{ $d->jenis }}</td>
                <td style="text-align: right">{{ $d->j_00 }}</td>   @php($jam['00'] += $d->j_00)
                <td style="text-align: right">{{ $d->j_01 }}</td>   @php($jam['01'] += $d->j_01)
                <td style="text-align: right">{{ $d->j_02 }}</td>   @php($jam['02'] += $d->j_02)
                <td style="text-align: right">{{ $d->j_03 }}</td>   @php($jam['03'] += $d->j_03)
                <td style="text-align: right">{{ $d->j_04 }}</td>   @php($jam['04'] += $d->j_04)
                <td style="text-align: right">{{ $d->j_05 }}</td>   @php($jam['05'] += $d->j_05)
                <td style="text-align: right">{{ $d->j_06 }}</td>   @php($jam['06'] += $d->j_06)
                <td style="text-align: right">{{ $d->j_07 }}</td>   @php($jam['07'] += $d->j_07)
                <td style="text-align: right">{{ $d->j_08 }}</td>   @php($jam['08'] += $d->j_08)
                <td style="text-align: right">{{ $d->j_09 }}</td>   @php($jam['09'] += $d->j_09)
                <td style="text-align: right">{{ $d->j_10 }}</td>   @php($jam['10'] += $d->j_10)
                <td style="text-align: right">{{ $d->j_11 }}</td>   @php($jam['11'] += $d->j_11)
                <td style="text-align: right">{{ $d->j_12 }}</td>   @php($jam['12'] += $d->j_12)
                <td style="text-align: right">{{ $d->j_13 }}</td>   @php($jam['13'] += $d->j_13)
                <td style="text-align: right">{{ $d->j_14 }}</td>   @php($jam['14'] += $d->j_14)
                <td style="text-align: right">{{ $d->j_15 }}</td>   @php($jam['15'] += $d->j_15)
                <td style="text-align: right">{{ $d->j_16 }}</td>   @php($jam['16'] += $d->j_16)
                <td style="text-align: right">{{ $d->j_17 }}</td>   @php($jam['17'] += $d->j_17)
                <td style="text-align: right">{{ $d->j_18 }}</td>   @php($jam['18'] += $d->j_18)
                <td style="text-align: right">{{ $d->j_19 }}</td>   @php($jam['19'] += $d->j_19)
                <td style="text-align: right">{{ $d->j_20 }}</td>   @php($jam['20'] += $d->j_20)
                <td style="text-align: right">{{ $d->j_21 }}</td>   @php($jam['21'] += $d->j_21)
                <td style="text-align: right">{{ $d->j_22 }}</td>   @php($jam['22'] += $d->j_22)
                <td style="text-align: right">{{ $d->j_23 }}</td>   @php($jam['23'] += $d->j_23)
                <td style="text-align: right">{{ number_format($d->total_transaksi) }}</td>     @php($totalTransaksi += $d->total_transaksi)
                <td style="text-align: right">{{ number_format($d->total_rupiah) }}</td>        @php($totalRupiah += $d->total_rupiah)
            </tr>
            @php($i++)
        @endforeach
        <tr style="background-color: lightgray">
            <th class="text-center">TOTAL</th>
            <th style="text-align: right">{{ $jam['00'] }}</th>
            <th style="text-align: right">{{ $jam['01'] }}</th>
            <th style="text-align: right">{{ $jam['02'] }}</th>
            <th style="text-align: right">{{ $jam['03'] }}</th>
            <th style="text-align: right">{{ $jam['04'] }}</th>
            <th style="text-align: right">{{ $jam['05'] }}</th>
            <th style="text-align: right">{{ $jam['06'] }}</th>
            <th style="text-align: right">{{ $jam['07'] }}</th>
            <th style="text-align: right">{{ $jam['08'] }}</th>
            <th style="text-align: right">{{ $jam['09'] }}</th>
            <th style="text-align: right">{{ $jam['10'] }}</th>
            <th style="text-align: right">{{ $jam['11'] }}</th>
            <th style="text-align: right">{{ $jam['12'] }}</th>
            <th style="text-align: right">{{ $jam['13'] }}</th>
            <th style="text-align: right">{{ $jam['14'] }}</th>
            <th style="text-align: right">{{ $jam['15'] }}</th>
            <th style="text-align: right">{{ $jam['16'] }}</th>
            <th style="text-align: right">{{ $jam['17'] }}</th>
            <th style="text-align: right">{{ $jam['18'] }}</th>
            <th style="text-align: right">{{ $jam['19'] }}</th>
            <th style="text-align: right">{{ $jam['20'] }}</th>
            <th style="text-align: right">{{ $jam['21'] }}</th>
            <th style="text-align: right">{{ $jam['22'] }}</th>
            <th style="text-align: right">{{ $jam['23'] }}</th>
            <th style="text-align: right">{{ number_format($totalTransaksi) }}</th>
            <th style="text-align: right">{{ number_format($totalRupiah) }}</th>
        </tr>
        </tbody>

    </table>

    <div class="page-break"></div>
    <div style="font-weight: bold; margin-top: 40px">Transaksi Tiket Offline</div>
    <table class="table" style="width: 100%; padding-top: 0.5cm">
        <thead style="background-color: darkred; color: white">
        <tr class="text-center">
            <th style="width: 1cm">No.</th>
            <th>PETUGAS TIKET</th>
            <th>TOTAL TRANSAKSI</th>
            <th>TOTAL RUPIAH</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @php($totTransOffline=0)
        @php($totRupiahOffline=0)
        @foreach($dataoffline as $do)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $do->username }}</td>
                <td class="text-center">{{ number_format($do->total_transaksi) }}</td>     @php($totTransOffline += $do->total_transaksi)
                <td class="text-right">{{ number_format($do->total_rupiah) }}</td>        @php($totRupiahOffline += $do->total_rupiah)
            </tr>
            @php($i++)
        @endforeach
        </tbody>
        <tfoot>
        <tr style="background-color: lightgray">
            <th colspan="2" class="text-center">TOTAL</th>
            <th class="text-center">{{ number_format($totTransOffline) }}</th>
            <th class="text-right">{{ number_format($totRupiahOffline) }}</th>
        </tr>
        </tfoot>

    </table>
</main>


</body>
</html>