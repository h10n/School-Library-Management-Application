<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
  {!! Form::label('name','Nama',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-9">
    {!! Form::text('name',null,['class' => 'form-control', 'maxlength' => '45']) !!}
    {!! $errors->first('name','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('singkatan') ? ' has-error' : ''}}">
  {!! Form::label('singkatan','Singkatan',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::text('singkatan',null,['class' => 'form-control', 'maxlength' => '3']) !!}
    {!! $errors->first('singkatan','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button> --}}
    {!! Form::submit('Simpan',['class' => 'btn btn-primary']) !!}
  </div>
</div>
