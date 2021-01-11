<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi Perpustakaan</title>
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body style="background:#ECF0F5;">
    <section>
        <div class="signinpanel">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="signin-info">
                        <div class="thumbnail">
                            <a href="http://localhost/sisfoatlet/public/home">
                                {!! Html::image(asset('img/logo/'.$logo),null,['class' => 'img-responsive']) !!}
                                <div class="caption text-center">
                                    <h5>
                                        <strong>
                                            Selamat Datang di Aplikasi Perpustakaan {{ $nama_perpus }}, Silahkan
                                            Gunakan Username dan Password Anda Untuk Masuk ke Aplikasi!
                                        </strong>
                                    </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="wrapper">
                        <div class="container">
                            {!! Form::open(['route' => 'login','class' => 'form-horizontal']) !!}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">                            
                                {!! Form::text('username',null,['class' => 'field-input']) !!}
                                {!! $errors->first('username','<span class="help-block"><strong>:message</strong></span>') !!}
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::password('password',['class' => 'field-input']) !!}
                                {!! $errors->first('password', '<span class="help-block"><strong>:message</strong></span>') !!}
                            </div>
                            <button type="submit" id="login-button" class="btn btn-primary">
                                Login
                            </button>
                            <div class="row">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="signup-footer">
                        <p>Copyright © 2018 Nur Hakim. All rights reserved.</p>
                        <p>Created By: <a href="#" target="_blank">Nur Hakim</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>