<div class="form-group{{$errors->has('text') ? ' has-error' : ''}}">
  {!! Form::label('text','Text',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-8">
    {!! Form::textarea('text',null,['class' => 'form-control','maxlength' => '220']) !!}
    {!! $errors->first('text','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn
    btn-primary'] ) !!}
  </div>
</div>