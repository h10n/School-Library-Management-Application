<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>portrait</title>    
    <style>
        .laporanTable,
        .laporanTable td,
        .laporanTable th {
          border: 1px solid black;
          text-align: left;
        }

        .laporanTable {
          border-collapse: collapse;
          width: 100%;
        }

        th,
        td {
          /* padding: 15px; */
        }

        /* tr:nth-child(even) {background-color: #f2f2f2;} */
        #identitas {}

        h3 {
          text-align: center;
        }

        div {
          margin-bottom: 15px;
        }

        #ttdTable {
          width: 100%;
        }

        #ttdTable td {
          vertical-align: bottom;
        }

        #ttdTable .tengah {
          width: 35%;
        }

        #ttdTable .ttd {
          height: 30%;
        }

        .lb1 {
          font-size: 11px;
        }


        #kop {
          padding-left: 5px;
          padding-right: 5px;
          padding-top: 5px;
          border-bottom: 5px double black;
        }

        #kop p {
          padding: 0;
          margin: 0;
        }

        #kop1 {
          font-size: 16pt;
          text-align: center;
        }

        .kop2 {

          font-size: 11pt;
          text-align: center;
        }

        .kop3 {

          font-size: 10pt;
          text-align: center;
        }

        img {
          position: absolute;
          top: 10px;
          padding-right: 5px;
          margin: 0;
          font-size: 6pt;
          width: 130px;
          text-align: right;
        }
        </style>
</head>
<body>
  @if (!empty($transaction_bulanan)) 
  <img src="{{ asset('img/logo/Logo_Kota_Samarinda.png')  }}" >
  <table id="kop" width="100%">
    <tr>
      <td id="identitasPerpus">
        <p id='kop1'><b>PEMERINTAH KOTA SAMARINDA</b></p>
        <p id='kop1'><b>DINAS PENDIDIKAN</b></p>
        <p id='kop1'><b>UPTD SMK NEGERI 7 SAMARINDA</b></p>
        <p class='kop2'>KOMPETENSI KEAHLIAN :</p>
        <p class='kop2'>Rekayasa Perangkat Lunak - Teknik Komputer dan Jaringan - Multimedia</p>
        <p class='kop3'>Jl. Aminah Syukur No. 82 Tel : (0541) 7777769, Fax : (0541) 731374 Samarinda</p>
        <p class='kop3'>Email : smkn07samarinda@yahoo.com Website : www.smkn7smr.sch.id</span></p>
      </td>
    </tr>
  </table>

    <h3>Rekapitulasi Peminjaman Buku </h3>
    <h3>Perpustakaan SMK Negeri 7 Samarinda </h3>
    <h5>Periode : {{ $firstKey = array_key_first($transaction_bulanan) }} s.d {{ $firstKey = array_key_last($transaction_bulanan) }}</h5>
    {{-- @include('pdf._table-identitas') --}}
<div>
    <table class="laporanTable">
        <tr>
          <th>No</th>
          <th>Hari / Tanggal</th>
          <th>Jumlah Buku Dipinjam</th>
          <th>Jumlah Buku Kembali</th>
          <th>Keterangan</th>         
        </tr>
         @php
            // $total = '';
            $total_peminjaman = 0;
            $total_pengembalian = 0;      
            $no = 0;   
        @endphp
        @foreach ($transaction_bulanan as $key => $transaction)
        @if ($transaction['peminjaman']+$transaction['pengembalian'] != 0)
        <tr>
          <td>{{ ++$no }}</td>
          <td>{{ $key }}</td>
          <td>{{ $transaction['peminjaman'] }}</td>
          <td>{{ $transaction['pengembalian'] }}</td>
          <td></td>        
        </tr>
        @php
          $total_peminjaman += $transaction['peminjaman'];
          $total_pengembalian += $transaction['pengembalian'];
        @endphp     
        @endif        
        @endforeach

        <tr>
          <td></td>
          <td>Total</td>
          <td>{{ $total_peminjaman }}</td>
          <td>{{ $total_pengembalian }}</td>          
          <td></td>                              
        </tr>
      </table>
    </div>
        @include('pdf._table-ttd')     
        @elseif (!empty($transaction_tahunan))
        <h3>Rekapitulasi Peminjaman Buku </h3>
        <h3>Perpustakaan SMK Negeri 7 Samarinda </h3>
        {{-- @include('pdf._table-identitas') --}}
    <div>
        <table class="laporanTable">
            <tr>
              <th>No</th>
              <th>Bulan</th>
              <th>Jumlah Buku Di Pinjam</th>
              <th>Jumlah Buku Kembali</th>
              <th>Ket</th>
            </tr>
             @php
                $total_peminjaman = 0;         
                $total_pengembalian = 0;         
                $no = 0;   
            @endphp
            @foreach ($transaction_tahunan as $key => $transaction)
            {{-- @if ($transaction['jumlah'] != 0) --}}
            <tr>
              <td>{{ ++$no }}</td>
              <td>{{ $key }}</td>
              <td>{{ $transaction['peminjaman'] }}</td>        
              <td>{{ $transaction['pengembalian'] }}</td>        
              <td></td>        
            </tr>
            @php
              $total_peminjaman += $transaction['peminjaman'];
              $total_pengembalian += $transaction['pengembalian'];
            @endphp     
            {{-- @endif         --}}
            @endforeach
    
            <tr>
              <td></td>
              <td>Total</td>                   
              <td>{{ $total_peminjaman }}</td>                    
              <td>{{ $total_pengembalian }}</td>                    
              <td></td>                    
            </tr>
          </table>
        </div>
            @include('pdf._table-ttd')
        @endif               
</body>
</html>