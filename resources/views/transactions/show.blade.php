@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li><a href="{{ url('/admin/transactions') }}"> Transaction</a></li>
    <li class="active">Borrowing Details</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Borrowing Details</h3>
      <div class="table-button-custom">
        <a class="btn bg-red" href="{{ route('transactions.index') }}"><span class="ion-android-arrow-back">
            Back</span></a>
      </div>
    </div>

    <div class="box-body">
      <div class="detail-buku">
        <div class="row">
          <div class="col-md-4">
            Member Id
          </div>

          <div class="col-md-8">
            <a href="{{ route('members.show',$transaction->member_id) }}">{{ $transaction->member->no_induk }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Name
          </div>
          <div class="col-md-8">
            {{ $transaction->member->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Book Id
          </div>
          <div class="col-md-8">
            <a href="{{ route('books.show',$transaction->book_id) }}">{{ $transaction->book->no_induk }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Title
          </div>
          <div class="col-md-8">
            {{ $transaction->book->title }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Borrow Staff
          </div>
          <div class="col-md-8">
            {{ $transaction->user->name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Return Staff
          </div>
          <div class="col-md-8">
            {{ $transaction->userReturned->name ?? '-' }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Borrowing Date
          </div>
          <div class="col-md-8">
            {{ $transaction->tgl_peminjaman }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            Max Borrowing Date
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
            Fine
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