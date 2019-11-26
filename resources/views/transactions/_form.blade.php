<div class="form-group{{$errors->has('member_id') ? ' has-error' : ''}}">
  {!! Form::label('member_id','Member Id/Name',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('member_id',['' => '']+App\Member::get()->pluck('nomor_nama','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Choose Members']) !!}
    {!! $errors->first('member_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('book_id') ? ' has-error' : ''}}">
  {!! Form::label('book_id','Book Id/Title',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('book_id',['' => '']+App\Book::get()->pluck('nomor_judul','id')->all(),null,['class' =>
    'js-selectize','placeholder' => 'Choose Book']) !!}
    {!! $errors->first('book_id','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group">
  <div class="col-md-6 col-md-offset-2">
    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn
    btn-primary'] ) !!}
  </div>
</div>