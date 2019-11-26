<div class="form-group{{$errors->has('no_induk') ? ' has-error' : ''}}">
  {!! Form::label('no_induk','Identity Number',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::text('no_induk',null,['class' => 'form-control','maxlength' => '20', 'placeholder' =>
    'Employee/Student/National Id']) !!}
    {!! $errors->first('no_induk','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
  {!! Form::label('name','Name',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name',null,['class' => 'form-control','maxlength' => '50','placeholder' =>
    'Full name']) !!}
    {!! $errors->first('name','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('jenis') ? ' has-error' : ''}}">
  {!! Form::label('jenis','Visitor Type',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::select('jenis',['guru/staff' => 'Teacher/Staff', 'siswa/i' => 'Student', 'umum' => 'General Public'],null,['class' =>
    'js-selectize','placeholder' => 'Visitor Type']) !!}
    {!! $errors->first('jenis','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="kelas-el form-group{{$errors->has('kelas') ? ' has-error' : ''}}">
  {!! Form::label('kelas','Grade',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::select('kelas',['X' => 'X','XI' => 'XI','XII' => 'XII'],null,['class' => 'js-selectize','placeholder' =>
    'Grade']) !!}
    {!! $errors->first('kelas','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('keperluan') ? ' has-error' : ''}}">
  {!! Form::label('keperluan','Purpose',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::textarea('keperluan',null,['class' => 'form-control', 'rows' => '4','maxlength' => '200', 'placeholder' =>
    'Write Your Purpose']) !!}
    {!! $errors->first('keperluan','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 col-md-offset-2">        
    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
  </div>
</div>

@push('custom-scripts')
<script>
  $(document).ready(function () {
    $('#jenis').change();    
  });

  $('#jenis').change(function () {
    let val = this.value;
    if (val == 'siswa/i') {
      disableKelas(false);
    } else {
      disableKelas();
    }
  });

  function disableKelas(arg = true){
    if(arg){
    $('.kelas-el').hide();
    $('#kelas').prop('disabled', true);
    }else{
    $('.kelas-el').show();
    $('#kelas').prop('disabled', false);
    }
  }
</script>
@endpush