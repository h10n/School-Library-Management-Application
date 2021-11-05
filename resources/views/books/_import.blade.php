<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {!! Form::label('template', 'Template Terbaru',['class' => 'col-md-2 control-label']) !!}
<div class="col-md-4">
  <a href="{{ route('admin.template.books') }}" class="btn btn-success btn-xs">
    <i class="fa fa-cloud-download"></i> Download
  </a>
</div>
</div>

<div class="form-group {{ $errors->has('excel') ? 'has-error' : '' }}">
  {!! Form::label('excel', 'Pilih File',['class' => 'col-md-2 control-label']) !!}
<div class="col-md-4">
  {!! Form::file('excel') !!}
  {!! $errors->first('excel', '<p class="help-block"><strong>:message</strong></p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
  {!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
</div>
</div>
