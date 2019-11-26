<div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
  {!! Form::label('title','Title',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('title',null,['class' => 'form-control','maxlength' => '50']) !!}
    {!! $errors->first('title','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('text') ? ' has-error' : ''}}">
  {!! Form::label('text','Text',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::textarea('text',null,['class' => 'form-control','maxlength' => '330']) !!}
    {!! $errors->first('text','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('img_file') ? ' has-error' : ''}}">
  {!! Form::label('img_file','Image',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('img_file') !!}
    {!! $errors->first('img_file','<p class="help-block"><strong>:message</strong></p>') !!}
    @if (isset($carousel) && $carousel->img)
    <div style="margin-top: 10px">{!! Html::image(asset('storage/uploads/slider/'.$carousel->img),null,['class' =>
      'img-rounded cover-buku']) !!}</div>
    @endif
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-2">
    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn
    btn-primary'] ) !!}
  </div>
</div>