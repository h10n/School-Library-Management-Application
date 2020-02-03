@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Profil</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Profil</h3>
      <div class="table-button-custom">
        {{-- <a class="btn bg-orange" href="#"><span class="ion-edit"> Tambah Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="#"><span class="ion-ios-paper"> Export</span></a> --}}
      </div>
    </div>

    <div class="box-body">
      <div class="col-md-2">
        @if (auth()->user()->photo)
        <p>{!! Html::image(asset('img/admins_photo/'.auth()->user()->photo),null,['class' => 'img-fluid member-photo'])
          !!}</p>
        @endif
      </div>
      <div class="col-md-10 detail-buku">

        <div class="row">
          <div class="col-md-4">
            Nama Lengkap
          </div>

          <div class="col-md-8">
            {{ auth()->user()->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Username
          </div>
          <div class="col-md-8">
            {{ auth()->user()->username }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Email
          </div>
          <div class="col-md-8">
            {{ auth()->user()->email }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            No. Telepon
          </div>
          <div class="col-md-8">
            {{ auth()->user()->telp }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Alamat
          </div>
          <div class="col-md-8">
            {{ auth()->user()->alamat }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Login Terakhir
          </div>
          <div class="col-md-8">
            {{auth()->user()->last_login }}
          </div>
        </div>

      </div>
      <a class="btn btn-primary" href="{{ url('admin/settings/profile/edit') }}">Ubah</a>
    </div>
  </div>
</section>
@endsection