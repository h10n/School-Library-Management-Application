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
        </style>
</head>
<body>
  @if (!empty($visitor_bulanan))    
    <h3>Rekapitulasi Jumlah Pengunjung </h3>
    <h3>Perpustakaan SMK Negeri 7 Samarinda </h3>
    {{-- @include('pdf._table-identitas') --}}
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
        <h3>Rekapitulasi Jumlah Pengunjung </h3>
        <h3>Perpustakaan SMK Negeri 7 Samarinda </h3>
        {{-- @include('pdf._table-identitas') --}}
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