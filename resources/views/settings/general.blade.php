@extends('layouts.app')
@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
        <li class="active">Pengaturan</li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Pengaturan</h3>
            <div class="table-button-custom">
                {{-- <a class="btn bg-orange" href="#"><span class="ion-edit"> Tambah Data</span></a>
                <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
                <a class="btn bg-purple" href="#"><span class="ion-ios-paper"> Export</span></a> --}}
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <caption><span class="ion-ios-gear"> Umum</caption>
                        <tbody>
                            <tr>
                                <td class="text-muted">Nama</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Alamat</td>
                                <td>{{ $item->address }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Website</td>
                                <td>{{ $item->website }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Pengelola</td>
                                <td>{{ $item->pengelola }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Tentang</td>
                                <td>{{ $item->about }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Kepala Perpustakaan</td>
                                <td>{{ $item->kepala_perpustakaan }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">NIP Kepala Perpustakaan</td>
                                <td>{{ $item->nip_kepala_perpustakaan }}</td>
                            </tr>
                            {{-- <tr>
                                <td class="text-muted">Pustakawan</td>
                                <td>{{ $item->pustakawan }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">NIP Pustakawan</td>
                                <td>{{ $item->nip_pustakawan }}</td>
                            </tr> --}}
                            <tr>
                                <td class="text-muted">Logo</td>
                                <td>
                                    @if ($item->logo)
                                    <p>{!! Html::image(asset('storage/uploads/logo/'.$item->logo),null,['class' => 'img-rounded cover-buku']) !!}
                                    </p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <caption><span class="ion-arrow-swap"> Peminjaman</caption>
                        <tbody>
                            <tr>
                                <td class="text-muted">Nominal Denda</td>
                                <td>Rp.{{ $item->denda }}/Hari</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Max Durasi Peminjaman</td>
                                <td>{{ $item->durasi }} Hari</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Max Jumlah Peminjaman</td>
                                <td>{{ $item->max_peminjaman }} Buku</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ url('admin/settings/general/edit') }}"><span class="ion-edit"> Edit</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection