<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ekspor {{ ucfirst($request['jenis']) }}</title>
  <link href="{{ asset('css/kop.css') }}" rel="stylesheet" media="screen">
  <link href="{{ asset('css/laporan.css') }}" rel="stylesheet" media="screen">
</head>

<body>
  <header>
    @include('pdf.laporan._kop')
  </header>
  
  @if (!empty($data))
  <h3>Ekspor {{ ucfirst($request['jenis']) }} </h3>
  <h5>Periode : {{ $request['periode_awal'] }} s.d {{ $request['periode_akhir'] }}
  {{-- deprecated, min php 7.3--}}
  {{-- <h5>Periode : {{ $firstKey = array_key_first($visitor_bulanan) }} s.d {{ $firstKey = array_key_last($visitor_bulanan) }} --}}
  </h5>
  @include('pdf.laporan.ekspor.'.$table)  
  @endif

  @include('pdf.laporan._table-ttd')
</body>

</html>