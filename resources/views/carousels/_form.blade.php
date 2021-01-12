<div class="form-group{{$errors->has('title') ? ' has-error' : ''}}">
  {!! Form::label('title','Title',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::text('title',null,['class' => 'form-control','maxlength' => '40']) !!}
    {!! $errors->first('title','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group{{$errors->has('text') ? ' has-error' : ''}}">
  {!! Form::label('text','Isi',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::textarea('text',null,['class' => 'form-control','maxlength' => '329']) !!}
    {!! $errors->first('text','<p class="help-block"><strong>:message</strong></p>') !!}

  </div>
</div>

<div class="form-group{{$errors->has('img') ? ' has-error' : ''}}">
  {!! Form::label('img','Foto',['class' => 'col-md-2 control-label']) !!}
  <div class="col-md-4">
    {!! Form::file('img') !!}
    @if (isset($member) && $member->photo)
    <p>{!! Html::image(asset('img/members_photo/'.$member->photo),null,['class' => 'img-rounded cover-buku']) !!}</p>
    @endif
    {!! $errors->first('img','<p class="help-block"><strong>:message</strong></p>') !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-2">
    <a class="btn bg-red" href="{{ route('carousels.index') }}"><span class="ion-android-arrow-back"> Kembali ke Daftar
        Slider</span></a>
    {!! Form::submit('Simpan',['class' => 'btn btn-primary']) !!}

  </div>
</div>