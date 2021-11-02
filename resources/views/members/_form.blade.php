
@push('req-css')
<link href="{{ asset('css/avatar.css') }}" rel="stylesheet" media="screen">
@endpush
<div class="col-md-12">
  <div class="form-group{{$errors->has('no_induk') ? ' has-error' : ''}}">
    {!! Form::label('no_induk','NIS/NIP',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-3">
      {!! Form::text('no_induk',null,['class' => 'form-control','maxlength' => '20']) !!}
      {!! $errors->first('no_induk','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  <div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name','Nama',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
      {!! Form::text('name',null,['class' => 'form-control','maxlength' => '50']) !!}
      {!! $errors->first('name','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  <div class="form-group{{$errors->has('jenis_anggota') ? ' has-error' : ''}}">
    {!! Form::label('jenis_anggota','Jenis Anggota',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {!! Form::select('jenis_anggota',['guru/staff' => 'Guru/Staff', 'siswa/i' => 'Siswa/i'],null,['class' =>
      'js-selectize','placeholder' => 'Jenis Anggota']) !!}
      {!! $errors->first('jenis_anggota','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  <div class="kelas-el form-group{{$errors->has('kelas') ? ' has-error' : ''}}">
    {!! Form::label('kelas','Kelas',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {!! Form::select('kelas',['10' => '10','11' => '11', '12' => '12'],null,['placeholder' => 'Kelas','class' =>
      'form-control']) !!}
      {!! $errors->first('kelas','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  <div class="jurusan-el form-group{{$errors->has('jurusan') ? ' has-error' : ''}}">
    {!! Form::label('jurusan','Jurusan',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-2">
      {!! Form::text('jurusan',null,['class' => 'form-control','maxlength' => '10']) !!}
      {!! $errors->first('jurusan','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  
  <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email','E-mail',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
      {!! Form::email('email',null,['class' => 'form-control','maxlength' => '60']); !!}
      {!! $errors->first('email','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  
  <div class="form-group{{$errors->has('phone') ? ' has-error' : ''}}">
    {!! Form::label('phone','No Telepon',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
      {!! Form::text('phone',null,['class' => 'form-control','maxlength' => '20']) !!}
      {!! $errors->first('phone','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>
  </div>
  <div class="form-group{{$errors->has('address') ? ' has-error' : ''}}">
    {!! Form::label('address','Alamat',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">    
      {!! Form::textarea('address',null,['class' => 'form-control','maxlength' => '100', 'rows' => '4']) !!}
      {!! $errors->first('address','<p class="help-block"><strong>:message</strong></p>') !!}
    </div>  
  </div>
  <div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
    {!! Form::label('username','Username',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
      {!! Form::text('username',old('username', $member->user->username ?? ''),['class' => 'form-control','maxlength' => '30']) !!}
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
  <div class="form-group{{$errors->has('photo') ? ' has-error' : ''}}">
    {!! Form::label('photo','Foto',['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
       <div class="avatar-upload">
        <div class="avatar-edit">        
            {!! Form::file('photo',['id' => 'photo', 'onchange' => 'changeAvatar(event, this)']) !!}
            <label for="photo"></label>
        </div>
    
        <div class="avatar-delete">                    
            <a href="javascript:void(0)" class="imageDelete"></a>            
        </div>
        <div class="avatar-preview">            
            @if(isset($member->photo))
                <div class="imagePreview" style="background-image: url({!! asset('img/members_photo/'.$member->photo) !!});">
                </div>
            @else
                <div class="imagePreview" style="background-image: url('{!! asset('img/icons8-no-camera.svg') !!}'); background-size: initial;">
                </div>
            @endif                
        </div>
    </div>
    {!! $errors->first('photo','<p class="help-block"><strong>:message</strong></p>') !!}    
    </div>
   
  </div> 
  <div class="form-group">
    <div class="col-md-6 col-md-offset-2">            
      {!! Form::submit('Simpan',['class' => 'btn btn-primary']) !!}

    </div>
  </div>
</div>
@push('req-scripts')
<script>
  const imgUrl = "{{ isset($member->photo) ? asset('img/members_photo/'.$member->photo) : '' }}", 
        noImgUrl = "{{ asset('img/icons8-no-camera.svg') }}"; 
</script>
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

  function disableKelas(arg = true){
    if(arg){
    $('.kelas-el').hide();
    $('#kelas').prop('disabled', true);
    $('.jurusan-el').hide();
    $('#jurusan').prop('disabled', true);
    }else{
    $('.kelas-el').show();
    $('#kelas').prop('disabled', false);
    $('.jurusan-el').show();
    $('#jurusan').prop('disabled', false);
    }
  }
</script>
@endpush