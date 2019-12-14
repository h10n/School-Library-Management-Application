<div class="form-group{{$errors->has('nis') ? ' has-error' : ''}}">
  {!! Form::label('nis','NIS',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('nis',null,['class' => 'form-control','maxlength' => '15']) !!}
    {!! $errors->first('nis','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
  {!! Form::label('name','Nama',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('name',null,['class' => 'form-control','maxlength' => '45']) !!}
    {!! $errors->first('name','<p class="help-block"><strong>:message</strong></p>') !!}

  </div>
</div>
<div class="form-group{{$errors->has('kelas') ? ' has-error' : ''}}">
  {!! Form::label('kelas','Kelas',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::select('kelas',['10' => '10','11' => '11', '12' => '12'],null,['placeholder' => 'Pilih Kelas','class' =>
    'form-control']) !!}
    {!! $errors->first('kelas','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>

</div>

<div class="form-group{{$errors->has('jurusan') ? ' has-error' : ''}}">
  {!! Form::label('jurusan','Jurusan',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('jurusan',null,['class' => 'form-control','maxlength' => '10']) !!}
    {!! $errors->first('jurusan','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>

</div>

<div class="form-group{{$errors->has('address') ? ' has-error' : ''}}">
  {!! Form::label('address','Alamat',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('address',null,['class' => 'form-control','maxlength' => '100']) !!}
    {!! $errors->first('address','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>

</div>

<div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
  {!! Form::label('email','E-mail',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::email('email',null,['class' => 'form-control','maxlength' => '70']); !!}
    {!! $errors->first('email','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('phone') ? ' has-error' : ''}}">
  {!! Form::label('phone','No Telepon',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('phone',null,['class' => 'form-control','maxlength' => '15']) !!}
    {!! $errors->first('phone','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('photo') ? ' has-error' : ''}}">
  {!! Form::label('photo','Foto',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('photo') !!}
    @if (isset($member) && $member->photo)
    <p>{!! Html::image(asset('img/members_photo/'.$member->photo),null,['class' => 'img-rounded cover-buku']) !!}</p>
    @endif
    {!! $errors->first('photo','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-2">
    <a class="btn bg-red" href="{{ route('members.index') }}"><span class="ion-android-arrow-back"> Kembali ke Daftar
        Anggota</span></a>
    {{ Form::reset('Reset',['class' => 'btn bg-yellow']) }}
    {!! Form::submit('Simpan',['class' => 'btn btn-primary']) !!}

  </div>
</div>