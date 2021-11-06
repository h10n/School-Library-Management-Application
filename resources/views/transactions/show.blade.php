@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/transactions') }}"> Peminjaman</a></li>
    <li class="active">Detail Peminjaman</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Detail Peminjaman</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('transactions.index') }}"><span class="ion-android-arrow-back"> Kembali</span></a>                
      </div>
    </div>

    <div class="box-body">
      <div class="detail-buku">
        <div class="row">
          <div class="col-md-4">
            NIS/NIP
          </div>

          <div class="col-md-8">
            <a href="{{ route('members.show',$transaction->member_id) }}">{{ $transaction->member->no_induk }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Nama
          </div>
          <div class="col-md-8">
            {{ $transaction->member->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            No. Induk
          </div>
          <div class="col-md-8">
            <a href="{{ route('books.show',$transaction->book_id) }}">{{ $transaction->book->no_induk }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Judul
          </div>
          <div class="col-md-8">
            {{ $transaction->book->title }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Petugas Peminjaman
          </div>
          <div class="col-md-8">
            {{ $transaction->user->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Petugas Pengembalian
          </div>
          <div class="col-md-8">
            {{ $transaction->userReturned->name ?? '-' }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Tanggal Peminjaman
          </div>
          <div class="col-md-8">
            {{ $transaction->tgl_peminjaman }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Max Tanggal Pengembalian
          </div>
          <div class="col-md-8">            
            {{ $transaction->tgl_max }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Status
          </div>
          <div class="col-md-8">
            {{ $transaction->status }}            
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Denda
          </div>
          <div class="col-md-8">
            {{ $transaction->total_denda }}       
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection