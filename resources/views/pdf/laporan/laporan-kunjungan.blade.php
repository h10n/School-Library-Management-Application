<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recapitulation of Visitors</title>
  <link href="{{ asset('css/kop.css') }}" rel="stylesheet" media="screen">
  <link href="{{ asset('css/laporan.css') }}" rel="stylesheet" media="screen">
</head>

<body>
  <header>
    @include('pdf.laporan._kop')
  </header>
  
  @if (!empty($visitor_bulanan))
  @include('pdf.laporan.kunjungan._kunjungan-date-range')  
  @elseif (!empty($visitor_tahunan))
  @include('pdf.laporan.kunjungan._kunjungan-year')
  @endif

  @include('pdf.laporan._table-ttd')
</body>

</html>