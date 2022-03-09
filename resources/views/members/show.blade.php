@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/members') }}"> Anggota</a></li>
    <li class="active">Detail Anggota</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Detail Anggota</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('members.index') }}"><span class="ion-android-arrow-back">
            Back</span></a>
      </div>
    </div>
    <div class="box-body">
      <div class="col-md-2">
        @php
        $avatarImg = !empty($member->photo) ? asset('storage/uploads/anggota/'.$member->photo) :
        asset('img/no-avatar-small.svg');
        @endphp
        <p>{!! Html::image($avatarImg,null,['class' => 'img-fluid member-photo']) !!}</p>
      </div>
      <div class="col-md-10 detail-buku">
        @include('members._detail-show')
      </div>
      @include('members._status-history-table')
      <div class="col-md-12">
        <a class="btn bg-olive" href="{{ route('members.edit',$member->id) }}">
          <span class="ion-edit">
             Edit Data
          </span>
        </a>
        <a class="btn bg-purple pull-right" href="{{ route('members.card',$member->id) }}" target="_blank">
          <span class="ion-printer">
             Cetak Kartu
          </span>
        </a>
      </div>
    </div>
  </div>
</section>
@endsection