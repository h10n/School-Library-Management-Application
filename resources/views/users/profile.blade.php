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
        @php
        if ($item->hasRole('member')) {
          $photoData = $item->member->photo;
          $imgDir = 'anggota/';
        }else{
          $photoData = $item->photo;
          $imgDir = 'user/';
        }            
        
        $imgUrl = $photoData ? asset('storage/uploads/'.$imgDir.$photoData) : asset('img/no-avatar-small.svg');                
        @endphp
        <p>{!! Html::image($imgUrl,null,['class' => 'img-fluid member-photo']) !!}</p>
      </div>

      <div class="col-md-10 detail-buku">        
        @role(['visitor', 'staff', 'admin'])
        <div class="row">
          <div class="col-md-4">
            Nama Lengkap
          </div>
          <div class="col-md-8">
            {{ $item->hasRole('member') ? $item->member->name : $item->name }}
          </div>
        </div>
        @endrole
        @role('member')
        @include('members._detail-show', ['member' => $item->member])
        @endrole
        <div class="row">
          <div class="col-md-4">
            Username
          </div>
          <div class="col-md-8">
            {{ $item->username }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Login Terakhir
          </div>
          <div class="col-md-8">            
            {{ $item->last_login ? $item->last_login->format('d-m-Y H:i') : '' }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a class="btn btn-primary" href="{{ url('users/password/edit') }}"><span class="ion-key"></span> Ganti Password</a>
          </div>
          <div class="col-md-8">            
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
@endsection