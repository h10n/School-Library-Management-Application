<div class="form-group{{$errors->has('member_id') ? ' has-error' : ''}}">
  {!! Form::label('member_id','Nomor/Nama Anggota',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('member_id',['' => '']+App\Member::get()->pluck('nomor_nama','id')->all(),null,['class' => 'js-selectize','placeholder' => 'Pilih Anggota']) !!}
    {!! $errors->first('member_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('book_id') ? ' has-error' : ''}}">
  {!! Form::label('book_id','No Induk/Judul Buku',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('book_id',['' => '']+App\Book::get()->pluck('nomor_judul','id')->all(),null,['class' => 'js-selectize','placeholder' => 'Pilih Buku']) !!}
    {!! $errors->first('book_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group">
  <div class="col-md-6 col-md-offset-2">      
    {!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
  </div>
</div>
