@extends('layouts.app')
@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="box">
        <div class="box-header-dashboard">
            <h3 class="box-title">Dashboard</h3>
        </div>
        <div class="box-body">
            <div class="callout callout-info">
                Selamat Datang di Aplikasi Perpustakaan {{ $nama_perpus }}
            </div>
            

            <div class="col-md-12">
              <h5>Buku yang Sedang Dipinjam</h5>
              <table class="table table-condensed table-striped">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Tanggal Peminjaman</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse (auth()->user()->member->borrowLogs()->borrowed()->get() as $log)
                  <tr>
                    <td>{{ $log->book->title }}</td>
                    <td>{{ $log->created_at }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Tidak Ada Data</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <h5>Buku yang Telah Dikembalikan</h5>
              <table class="table table-condensed table-striped">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Tanggal Kembali</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse (auth()->user()->member->borrowLogs()->returned()->get() as $log)
                  <tr>
                    <td>{{ $log->book->title }}</td>
                    <td>{{ $log->updated_at }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="2">Tidak Ada Data</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            
        </div>

    </div>

</section>
@endsection

@section('scripts')
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script type="text/javascript">
    var data = {
        labels: {
            !!json_encode($authors) !!
        },
        datasets: [{
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: {
                !!json_encode($books) !!
            }
        }]
    };

    var ctx = document.getElementById("chartPenulis").getContext("2d");
    var myLineChart = new Chart(ctx).Bar(data);
</script>
@endsection