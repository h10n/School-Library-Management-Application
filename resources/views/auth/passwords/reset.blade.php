@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                      {!! Form::open(['route' => 'password.request','class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            {!! Form::label('email','Alamat Email',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                              <!--
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              -->
                              {!! Form::text('email',isset($email) ? $email : null,['class' => 'form-control']) !!}
                              {!! $errors->first('email','<span class="help-block"><strong>:message</strong></span>') !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password','Password',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                              <!--
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              -->
                              {!! Form::password('password',['class' => 'form-control']) !!}
                              {!! $errors->first('password','<span class="help-block"><strong>:message</strong></span>') !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation','Konfirmasi Password',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                              <!--
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                              -->
                              {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                              {!! $errors->first('password_confirmation','<span class="help-block"><strong>:message</strong></span>') !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
