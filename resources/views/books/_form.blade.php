<div class="form-group{{$errors->has('no_induk') ? ' has-error' : ''}}">
  {!! Form::label('no_induk','Book Id',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('no_induk',null,['class' => 'form-control','maxlength' => '20']) !!}
    {!! $errors->first('no_induk','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
  {!! Form::label('title','Title',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::textarea('title',null,['class' => 'form-control','maxlength' => '150', 'rows' => '4']) !!}
    {!! $errors->first('title','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('author_id') ? ' has-error' : ''}}">
  {!! Form::label('author_id','Author',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('author_id',['' => '']+App\Author::get()->pluck('title','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Choose Author']) !!}
    {!! $errors->first('author_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('published_location') ? ' has-error' : ''}}">
  {!! Form::label('published_location','Published Location',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('published_location',null,['class' => 'form-control','maxlength' => '50']) !!}
    {!! $errors->first('published_location','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>

</div>

<div class="form-group{{$errors->has('publisher_id') ? ' has-error' : ''}}">
  {!! Form::label('publisher_id','Publisher',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('publisher_id',['' => '']+App\Publisher::pluck('name','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Choose Publisher']) !!}
    {!! $errors->first('publisher_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('published_year') ? ' has-error' : ''}}">
  {!! Form::label('published_year',' Published Year',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    <div class="input-group date" id="published-year">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('published_year',null,['class' => 'form-control pull-right','maxlength' => '4']) !!}
    </div>
    {!! $errors->first('published_year','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('book_year') ? ' has-error' : ''}}">
  {!! Form::label('book_year','Book Year',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    <div class="input-group date" id="book-year">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
      {!! Form::text('book_year',null,['class' => 'form-control pull-right','maxlength' => '4']) !!}
    </div>
    {!! $errors->first('book_year','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('classification_code') ? ' has-error' : ''}}">
  {!! Form::label('classification_code','Classification Code',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('classification_code',null,['class' => 'form-control','maxlength' => '15']) !!}
    {!! $errors->first('classification_code','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('category_id') ? ' has-error' : ''}}">
  {!! Form::label('category_id','Category',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">

    {!! Form::select('category_id',['' => '']+App\Category::get()->pluck('name','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Choose Category']) !!}
    {!! $errors->first('category_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('source') ? ' has-error' : ''}}">
  {!! Form::label('source','Source',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::select('source',['' => '','pengadaan' => 'Procurement','hadiah' => 'Grant'],null,['class' =>
    'js-selectize','placeholder' => 'Choose Source']) !!}
    {!! $errors->first('source','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('amount') ? ' has-error' : ''}}">
  {!! Form::label('amount','Amount',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::number('amount',null,['class' => 'form-control', 'min' =>'1','max' => '9999']) !!}
    {!! $errors->first('amount','<p class="help-block"><strong>:message</strong></p>') !!}
    @if (isset($book))
    <p class="help-block">{{$book->borrowed}} Buku Sedang Dipinjam</p>
    @endif
  </div>
</div>

<div class="form-group{{$errors->has('cover_file') ? ' has-error' : ''}}">
  {!! Form::label('cover_file','Cover',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('cover_file') !!}
    {!! $errors->first('cover_file','<p class="help-block"><strong>:message</strong></p>') !!}
    @if (isset($book) && $book->cover)
    <div style="margin-top: 10px">
      {!! Html::image(asset('storage/uploads/buku/'.$book->cover),null,['class' => 'img-rounded cover-buku']) !!}
    </div>
    @endif
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn
    btn-primary'] ) !!}
  </div>
</div>