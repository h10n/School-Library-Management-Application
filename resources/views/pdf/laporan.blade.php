<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>portrait</title>
    <style>
        .laporanTable, .laporanTable td, .laporanTable th {  
          border: 1px solid black;
          text-align: left;
        }
        
        .laporanTable {
          border-collapse: collapse;
          width: 100%;
        }
        
        th, td {
          /* padding: 15px; */
        }
        
        /* tr:nth-child(even) {background-color: #f2f2f2;} */
        #identitas {

        }
        h3{
          text-align: center;
        }
        div {
          margin-bottom: 15px;
        }
        #ttdTable {
          width: 100%;          
        }
        #ttdTable td{         
          vertical-align:bottom;
        }
        #ttdTable .tengah{
          width: 35%;
        }
        #ttdTable .ttd{
          height: 30%;
        }
        .lb1{
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
  @if (!empty($visitor_bulanan))    
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
    <h3>Rekapitulasi Jumlah Pengunjung </h3>
    <h3>Perpustakaan SMK Negeri 7 Samarinda </h3>
    <h5>Periode : {{ $firstKey = array_key_first($visitor_bulanan) }} s.d {{ $firstKey = array_key_last($visitor_bulanan) }}</h5>
<div>
    <table class="laporanTable">
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Hari/Tanggal</th>
          <th colspan="3">Kelas</th>
          <th rowspan="2">Guru/Karyawan Sekolah</th>
          <th rowspan="2">Jumlah</th>          
        </tr>
        <tr>
          <th>X</th>  
          <th>XI</th>  
          <th>XII</th>           
        </tr>
         @php
            // $total = '';
            $total_kelas_x = 0;
            $total_kelas_xi = 0;
            $total_kelas_xii = 0;
            $total_guru_staff = 0;
            $total_jumlah = 0;         
            $no = 0;   
        @endphp
        @foreach ($visitor_bulanan as $key => $visitor)
        @if ($visitor['jumlah'] != 0)
        <tr>
          <td>{{ ++$no }}</td>
          <td>{{ $key }}</td>
          <td>{{ $visitor['kelas_x'] }}</td>
          <td>{{ $visitor['kelas_xi'] }}</td>
          <td>{{ $visitor['kelas_xii'] }}</td>
          <td>{{ $visitor['guru_staff'] }}</td>
          <td>{{ $visitor['jumlah'] }}</td>        
        </tr>
        @php
          $total_kelas_x += $visitor['kelas_x'];
          $total_kelas_xi += $visitor['kelas_xi'];
          $total_kelas_xii += $visitor['kelas_xii'];
          $total_guru_staff += $visitor['guru_staff'];
          $total_jumlah += $visitor['jumlah'];
        @endphp     
        @endif        
        @endforeach

        <tr>
          <td></td>
          <td>Total</td>
          <td>{{ $total_kelas_x }}</td>
          <td>{{ $total_kelas_xi }}</td>          
          <td>{{ $total_kelas_xii }}</td>          
          <td>{{ $total_guru_staff }}</td>                    
          <td>{{ $total_jumlah }}</td>                    
        </tr>
      </table>
    </div>
        @include('pdf._table-ttd')     
        @elseif (!empty($visitor_tahunan))
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
        <h3>Rekapitulasi Jumlah Pengunjung </h3>
        <h3>Perpustakaan SMK Negeri 7 Samarinda </h3>
        <h5>Tahun : {{ $tahun }}</h5>
    <div>
        <table class="laporanTable">
            <tr>
              <th>No</th>
              <th>Bulan</th>
              <th>Jumlah Pengunjung</th>
              <th>Ket</th>
            </tr>
             @php
                $total_jumlah = 0;         
                $no = 0;   
            @endphp
            @foreach ($visitor_tahunan as $key => $visitor)
            {{-- @if ($visitor['jumlah'] != 0) --}}
            <tr>
              <td>{{ ++$no }}</td>
              <td>{{ $key }}</td>
              <td>{{ $visitor['jumlah'] }}</td>        
              <td></td>        
            </tr>
            @php
              $total_jumlah += $visitor['jumlah'];
            @endphp     
            {{-- @endif         --}}
            @endforeach
    
            <tr>
              <td></td>
              <td>Total</td>                   
              <td>{{ $total_jumlah }}</td>                    
              <td></td>                    
            </tr>
          </table>
        </div>
            @include('pdf._table-ttd')
        @endif               
</body>
</html>