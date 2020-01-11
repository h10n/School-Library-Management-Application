@extends('layouts.app')

@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="ion-ios-home"></i> Dashboard</a></li>
    <li><a href="{{ url('/admin/transactions') }}"> Peminjaman</a></li>
    <li class="active">Tambah Peminjaman</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Tambah Peminjaman</h3>
      <div class="table-button-custom">
        <a class="btn bg-orange" href="{{ route('transactions.create') }}"><span class="ion-edit"> Tambah
            Data</span></a>
        <a class="btn bg-olive"><span class="ion-refresh"> Refresh</span></a>
        <a class="btn bg-purple" href="{{ route('admin.export.books') }}"><span class="ion-ios-paper"> Export</span></a>
      </div>
    </div>

    <div class="box-body">
      {!! Form::open([
      'url' => route('transactions.store'),
      'method' => 'POST',
      'class' => 'form-horizontal'
      ])
      !!}
      @include('transactions._form')
      {!! Form::close() !!}
    </div>
  </div>
</section>
@endsection

@push('req-scripts')
<script>
        function resetTransaksi() {
            //very awful code, fix it in future
            var $select = $('#member_id');
            var control = $select[0].selectize;
            control.clear();

            var $select = $('#book_id');
            var control = $select[0].selectize;
            control.clear();
        }
        // function printErrorMsg (key, value) {        
        // // Swal.fire('Oops...','Data Gagal Tersimpan!','error');
        //     // $(".print-error-msg").find("ul").html('');
        //     $(".print-error-msg").css('display','block');
        //     // $.each( msg, function( key, value ) {
        //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //     // });
        //     console.log(value);
        // }
        // $(".tambah-buku").click(function (e) {
        //   console.log("working");
        //   var id_buku = $("select[name=book_id]").val();
        //   var nama_buku = $("select[name=book_id] option:selected").text();
        //   // console.log(nama);
        //   printErrorMsg(id_buku,nama_buku);
        // })
</script>
@endpush