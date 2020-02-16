<div class="login">


                    <div class="wrapper">
                        <div class="container">

                      {!! Form::open(['route' => 'login','class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <!--    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->
                                {!! Form::email('email',null,['class' => 'field-input']) !!}
                                <!--
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                              -->
                              {!! $errors->first('email','<span class="help-block"><strong>:message</strong></span>') !!}

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <!-- <input id="password" type="password" class="form-control" name="password" required> -->
                                {!! Form::password('password',['class' => 'field-input']) !!}

                                <!--
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              -->
                              {!! $errors->first('password', '<span class="help-block"><strong>:message</strong></span>') !!}

                        </div>
                                <button type="submit" id="login-button">
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
