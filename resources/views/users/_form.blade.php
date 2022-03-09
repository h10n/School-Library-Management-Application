@push('req-css')
<link href="{{ asset('css/avatar.css') }}" rel="stylesheet" media="screen">
@endpush
<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
  {!! Form::label('name','Nama',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name',null,['class' => 'form-control','maxlength' => '50']) !!}
    {!! $errors->first('name','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group{{$errors->has('role') ? ' has-error' : ''}}">
  {!! Form::label('role','Role',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-2">
    {!! Form::select('role',\DB::table('roles')->where('name','!=','member')->get()->pluck('name', 'name'),isset($item)
    ? $item->role_name : '',['class' =>
    'js-selectize','placeholder' => 'Pilih Role']) !!}
    {!! $errors->first('role','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
  {!! Form::label('username','Username',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('username',null,['class' => 'form-control','maxlength' => '30']) !!}
    {!! $errors->first('username','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
<div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
  {!! Form::label('password','Password',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::password('password',['class' => 'form-control']) !!}
    {!! $errors->first('password','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>
@include('layouts._image-uploader', ['name' => 'photo_file', 'dir' => 'user','label' => 'Foto', 'data' => $item->photo
?? null])
<div class="form-group">
  <div class="col-md-4 col-md-offset-2">
    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn
    btn-primary'] ) !!}
  </div>
</div>
@push('req-scripts')
<script src="{{ asset('js/avatar.js') }}"></script>
@endpush

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

  function disableKelas(arg = true) {
    if (arg) {
      $('.kelas-el').hide();
      $('#kelas').prop('disabled', true);
    } else {
      $('.kelas-el').show();
      $('#kelas').prop('disabled', false);
    }
  }
</script>
@endpush