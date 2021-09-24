<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $nama_perpus }} | Log in</title>    
    @include('layouts._styles')
    <style>
        .logo {
            width: 82px;            
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">
                {!! Html::image(asset('img/logo/'.$logo),null,['class' => 'logo']) !!}                
            </a>
        </div>
        <!-- /.login-logo -->
        @if ($errors->any())
            <div class="alert alert-danger pesan-error">            
                Gagal! Username Atau Password Salah!
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Silahkan Gunakan Username dan Password Anda Untuk Masuk ke Aplikasi!</p>

            {{-- <form action="../../index2.html" method="post"> --}}
                {!! Form::open(['route' => 'login']) !!}                
                <div class="form-group has-feedback">                    
                    {!! Form::text('username',null,['class' => 'form-control', 'placeholder' => 'Username']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) !!}                    
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            {{-- </form> --}}
            {!! Form::close() !!}
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <script>  
        // (function() {
        //     setTimeout(function () {
        //         document.querySelector(".pesan-error").remove();
        //     }, 5000); 
        // })();
    </script>
</body>
</html>