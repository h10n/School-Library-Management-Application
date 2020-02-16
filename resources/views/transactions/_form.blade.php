<div class="form-group{{$errors->has('transaction_code') ? ' has-error' : ''}}">
  {!! Form::label('transaction_code','Kode Transaksi',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('transaction_code',null,['class' => 'form-control']) !!}
    {!! $errors->first('transaction_code','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('member_id') ? ' has-error' : ''}}">
  {!! Form::label('member_id','NIS/Nama Anggota',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('member_id',['' => '']+App\Member::get()->pluck('title','id')->all(),null,['class' => 'js-selectize','placeholder' => 'Pilih Anggota']) !!}
    {!! $errors->first('member_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('book_id') ? ' has-error' : ''}}">
  {!! Form::label('book_id','No Induk/Judul Buku',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('book_id',['' => '']+App\Book::get()->pluck('stuff','id')->all(),null,['class' => 'js-selectize','placeholder' => 'Pilih Buku']) !!}
    {!! $errors->first('book_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>

  {{-- <div class="col-md-2">
    <a class="btn bg-blue tambah-buku"><span class="ion-plus"> Tambah
        Buku</span></a>
  </div> --}}
</div>
{{-- <div class="form-group">
  
  <div class="col-md-4 col-md-offset-2">
    <div class="print-error-msg" style="display:none">
      <ul id="error-list"></ul>
  </div>
  </div>
</div> --}}
<div class="form-group">
  <div class="col-md-6 col-md-offset-2">
      <a class="btn bg-red" href="{{ route('members.index') }}"><span class="ion-android-arrow-back"> Kembali ke Daftar Anggota</span></a>
    {{ Form::reset('Reset',['class' => 'btn bg-yellow', 'onclick' => 'resetTransaksi()']) }}
    {!! Form::submit('Simpan',['class' => 'btn btn-primary']) !!}
  </div>
</div>
