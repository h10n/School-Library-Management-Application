@extends('layouts.app')
@section('content')
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
    <li class="active">Buku Tamu</li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="box">
    <div class="box-header-dashboard">
      <h3 class="box-title">Buku Tamu</h3>
    </div>
    <div class="box-body">
      <div class="callout callout-info">
        Selamat Datang di {{ $tentang }}, Silahkan Isi Form Kunjungan Terlebih Dahulu!
      </div>
      <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Anggota</a></li>
          <li><a href="#tab_2" data-toggle="tab">Non Anggota</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            {!! Form::open([
              'route' => 'visitors.guest-book-member.store',      
              'class' => 'form-horizontal'
              ])
              !!}
                <div class="form-group{{$errors->has('no_anggota') ? ' has-error' : ''}}">
                  {!! Form::label('no_anggota','No Anggota',['class' => 'col-md-2 control-label']) !!}
                  <div class="col-md-3">
                    {!! Form::text('no_anggota',null,['class' => 'form-control','maxlength' => '20', 'placeholder' =>
                    'No Anggota']) !!}
                    {!! $errors->first('no_anggota','<p class="help-block"><strong>:message</strong></p>') !!}
                  </div>
                </div>                
                
                <div class="form-group{{$errors->has('keperluan') ? ' has-error' : ''}}">
                  {!! Form::label('keperluan','Keperluan',['class' => 'col-md-2 control-label']) !!}
                  <div class="col-md-4">
                    {!! Form::textarea('keperluan',null,['class' => 'form-control', 'rows' => '4','maxlength' => '200', 'placeholder' =>
                    'Tulis Keperluan']) !!}
                    {!! $errors->first('keperluan','<p class="help-block"><strong>:message</strong></p>') !!}
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 col-md-offset-2">        
                    {!! Form::button('<i class="fa fa-save"></i> Save', ['type' => 'submit', 'name' => 'simpan', 'class' => 'btn btn-primary'] )  !!}
                  </div>
                </div>                
              {!! Form::close() !!}
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
            {!! Form::open([
            'route' => 'visitors.guest-book.store',      
            'class' => 'form-horizontal'
            ])
            !!}
              @include('visitors._form')
            {!! Form::close() !!}
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>
  </div>
</section>
@endsection