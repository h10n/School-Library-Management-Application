@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Profile</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Profile</h3>
      <div class="table-button-custom">
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
            Full name
          </div>
          <div class="col-md-8">
            {{ $item->hasRole('member') ? $item->member->name : $item->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Username
          </div>
          <div class="col-md-8">
            {{ $item->username }}
          </div>
        </div>
        @endrole
        @role('member')
        @include('members._detail-show', ['member' => $item->member])
        @endrole
        <div class="row">
          <div class="col-md-4">
            Last Login
          </div>
          <div class="col-md-8">
            {{ $item->last_login ? $item->last_login->format('d-m-Y H:i') : '' }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a class="btn btn-primary" href="{{ url('users/password/edit') }}"><span class="ion-key"></span> Change Password</a>
          </div>
          <div class="col-md-8">
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection