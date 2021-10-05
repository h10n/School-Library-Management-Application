<div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
  {!! Form::label('username','Username',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('username',old('username', $member->user->username ?? ''),['class' => 'form-control','maxlength' => '15']) !!}
    {!! $errors->first('username','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
  {!! Form::label('password','Password',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::password('password',['class' => 'form-control','maxlength' => '15']) !!}
    {!! $errors->first('password','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group{{$errors->has('role') ? ' has-error' : ''}}">
  {!! Form::label('role','Role',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-3">
    {!! Form::select('role',\DB::table('roles')->get()->pluck('name', 'name'),null,['class' =>
    'js-selectize','placeholder' => 'Pilih Role Pengguna']) !!}
    {!! $errors->first('role','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group">
  <div class="col-md-4 col-md-offset-2">        
    {!! Form::button('<i class="fa fa-save"></i> Simpan', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
  </div>
</div>

@push('custom-scripts')
<script>
  $(document).ready(function () {
    $('#jenis_anggota').change();    
  });

  $('#jenis_anggota').change(function () {
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