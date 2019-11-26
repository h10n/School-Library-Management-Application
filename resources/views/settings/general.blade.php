@extends('layouts.app')
@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
        <li class="active">Setting</li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Pengaturan</h3>
            <div class="table-button-custom">
                <a class="btn bg-orange" href="#"><span class="ion-edit"> Tambah Data</span></a>
                <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
                <a class="btn bg-purple" href="#"><span class="ion-ios-paper"> Export</span></a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table">
                <caption><span class="ion-ios-gear"> Umum</caption>
                <tbody>
                    <tr>
                        <td class="text-muted">Nama Perpustakaan</td>
                        <td>{{ $nama_perpus }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Alamat</td>
                        <td>{{ $alamat_perpus }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Tentang</td>
                        <td>{{ $tentang }}</td>
                    </tr>
                    <tr>
                      <td class="text-muted">Logo Perpustakan</td>
                      <td>
                          @if ($logo)
                            <p>{!! Html::image(asset('img/logo/'.$logo),null,['class' => 'img-rounded cover-buku']) !!}</p>
                          @endif
                        </div>
                      </div></td>
                    </tr>
                  </tbody>
              </table>
              <table class="table">
                  <caption><span class="ion-arrow-swap"> Peminjaman</caption>
                  <tbody>
                    <tr>
                        <td class="text-muted">Nominal Denda</td>
                        <td>Rp.{{ $denda }}/Hari</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Max Durasi Peminjaman</td>
                        <td>{{ $durasi }} Hari</td>
                    </tr>
                      <tr>
                        <td class="text-muted">Max Jumlah Peminjaman</td>
                        <td>{{ $jumlah }} Buku</td>
                    </tr>
                  </tbody>
              </table>
            <a class="btn btn-primary" href="{{ url('admin/settings/general/edit') }}">Ubah</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
@endsection
