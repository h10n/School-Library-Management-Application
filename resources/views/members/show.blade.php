@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
    <li><a href="{{ url('/admin/members') }}"> Anggota</a></li>
    <li class="active">Detail Anggota</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Detail Anggota</h3>
      <div class="table-button-custom">
        {{-- <a class="btn bg-orange" href="{{ route('members.create') }}"><span class="ion-android-add"> Tambah
            Data</span></a> --}}
        <a class="btn bg-olive" href="{{ route('members.edit',$member->id) }}"><span class="ion-edit"> Edit
            Data</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.members.card',$member->id) }}"><span class="ion-printer">
            Cetak Kartu</span></a>
      </div>
    </div>
    <div class="box-body">
      <div class="col-md-2">
        @if (isset($member) && $member->photo)
        <p>{!! Html::image(asset('img/members_photo/'.$member->photo),null,['class' => 'img-fluid member-photo']) !!}
        </p>
        @endif
      </div>
      <div class="col-md-10 detail-buku">
        <div class="row">
          <div class="col-md-4">
            NIS
          </div>

          <div class="col-md-8">
            {{ $member->nis }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Nama
          </div>
          <div class="col-md-8">
            {{ $member->name }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            Kelas
          </div>
          <div class="col-md-8">
            {{ $member->kelas }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            Jurusan
          </div>
          <div class="col-md-8">
            {{ $member->jurusan }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            Alamat
          </div>
          <div class="col-md-8">
            {{ $member->address }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            E-mail
          </div>

          <div class="col-md-8">
            {{ $member->email }}
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            No Telepon
          </div>
          <div class="col-md-8">
            {{ $member->phone }}
          </div>
        </div>
        
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
            @forelse ($member->borrowLogs()->borrowed()->get() as $log)
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
            @forelse ($member->borrowLogs()->returned()->get() as $log)
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
      <a class="btn bg-red" href="{{ route('members.index') }}"><span class="ion-android-arrow-back"> Kembali ke Daftar
          Anggota</span></a>
    </div>
  </div>
</section>
@endsection