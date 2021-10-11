<div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
  {!! Form::label('title','Judul',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">    
    {!! Form::textarea('title',null,['class' => 'form-control','maxlength' => '150', 'rows' => '4']) !!}
    {!! $errors->first('title','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('author_id') ? ' has-error' : ''}}">
  {!! Form::label('author_id','Penulis',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('author_id',['' => '']+App\Author::get()->pluck('title','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Pilih Penulis']) !!}
    {!! $errors->first('author_id','<p class="help-block"><strong>:message</strong></p>') !!}

  </div>
  {{-- <div class="col-md-2">
    <a onclick="add('{{ route('authors.create')}}','Penulis')" class="btn bg-blue"><span class="ion-plus"> Tambah
        Penulis</span></a>
  </div> --}}
</div>

<div class="form-group{{$errors->has('published_location') ? ' has-error' : ''}}">
  {!! Form::label('published_location','Tempat Terbit',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('published_location',null,['class' => 'form-control','maxlength' => '50']) !!}
    {!! $errors->first('published_location','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>

</div>

<div class="form-group{{$errors->has('publisher_id') ? ' has-error' : ''}}">
  {!! Form::label('publisher_id','Penerbit',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('publisher_id',['' => '']+App\Publisher::pluck('name','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Pilih Penerbit']) !!}
    {!! $errors->first('publisher_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
  {{-- <div class="col-md-2">
    <a onclick="add('{{ route('publishers.create')}}','Penerbit')" class="btn bg-blue"><span class="ion-plus"> Tambah
        Penerbit</span></a>
  </div> --}}
</div>

<div class="form-group{{$errors->has('published_year') ? ' has-error' : ''}}">
  {!! Form::label('published_year','Tahun Terbit',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    <div class="input-group date" id="published-year">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('published_year',null,['class' => 'form-control pull-right','maxlength' => '4']) !!}
      {!! $errors->first('published_year','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
</div>

<div class="form-group{{$errors->has('book_year') ? ' has-error' : ''}}">
  {!! Form::label('book_year','Tahun Buku',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    <div class="input-group date" id="book-year">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('book_year',null,['class' => 'form-control pull-right','maxlength' => '4']) !!}
      {!! $errors->first('book_year','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
</div>

<div class="form-group{{$errors->has('classification_code') ? ' has-error' : ''}}">
  {!! Form::label('classification_code','No Klasifikasi',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('classification_code',null,['class' => 'form-control','maxlength' => '10']) !!}
    {!! $errors->first('classification_code','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('category_id') ? ' has-error' : ''}}">
  {!! Form::label('category_id','Kategori',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">

    {!! Form::select('category_id',['' => '']+App\Category::get()->pluck('title','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Pilih Kategori']) !!}
    {!! $errors->first('category_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
  {{-- <div class="col-md-2">
    <a onclick="add('{{ route('categories.create')}}','Kategori')" class="btn bg-blue"><span class="ion-plus"> Tambah
        Kategori</span></a>
  </div> --}}
</div>

{{-- <div class="form-group{{$errors->has('initial') ? ' has-error' : ''}}">
  {!! Form::label('initial','Inisial Buku',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-1">
    {!! Form::text('initial',null,['class' => 'form-control','maxlength' => '1']) !!}
    {!! $errors->first('initial','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div> --}}

<div class="form-group{{$errors->has('source') ? ' has-error' : ''}}">
  {!! Form::label('source','Sumber',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::select('source',['' => '','P' => 'Pengadaan','S' => 'Hadiah'],null,['class' =>
    'js-selectize','placeholder' => 'Pilih Sumber']) !!}
    {!! $errors->first('source','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('no_induk') ? ' has-error' : ''}}">
  {!! Form::label('no_induk','No Induk Buku',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('no_induk',null,['class' => 'form-control','maxlength' => '20']) !!}
    {!! $errors->first('no_induk','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('amount') ? ' has-error' : ''}}">
  {!! Form::label('amount','Jumlah',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::number('amount',null,['class' => 'form-control', 'min' =>'1','max' => '9999']) !!}
    {!! $errors->first('amount','<p class="help-block"><strong>:message</strong></p>') !!}
    @if (isset($book))
    <p class="help-block">{{$book->borrowed}} Buku Sedang Dipinjam</p>
    @endif
  </div>
</div>

<div class="form-group{{$errors->has('cover') ? ' has-error' : ''}}">
  {!! Form::label('cover','Cover',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('cover') !!}
    @if (isset($book) && $book->cover)
    <p>{!! Html::image(asset('img/'.$book->cover),null,['class' => 'img-rounded cover-buku']) !!}</p>
    @endif
    {!! $errors->first('cover','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">        
    {!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
  </div>
</div>