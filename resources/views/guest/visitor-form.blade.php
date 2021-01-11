<div class="user-panel ">
<div class="visitor-form">
    <div class="wrapper">
        <div class="container">
            <h4>Form Pengunjung</h4>
            {!! Form::open(['route' => 'visitor.store','class' => 'form-horizontal']) !!}
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::text('no_induk',null,['class' => 'field-input','placeholder' => 'NIS/NIP']) !!}
                {!! $errors->first('email','<span class="help-block"><strong>:message</strong></span>') !!}
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::text('name',null,['class' => 'field-input','placeholder' => 'Nama']) !!}
                {!! $errors->first('password', '<span class="help-block"><strong>:message</strong></span>') !!}
            </div>
            <div class="form-group{{ $errors->has('jenis_anggota') ? ' has-error' : '' }}">
                <div class="dd-style">
                    {!! Form::select('jenis_anggota',['guru/staff' => 'Guru/Staff','siswa/i' => 'Siswa/i'],null,['class' => 'form-control','placeholder' => 'Jenis Anggota','id'=>'jenis_anggota','required']) !!}
                </div>
                {!! $errors->first('jenis_anggota','<p class="help-block"><strong>:message</strong></p>') !!}
            </div>
            <div class="kelas form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
                <div class="dd-style kelas">
                    {!! Form::select('kelas',['X' => 'X','XI' => 'XI','XII' => 'XII'],null,['class' => 'kelas form-control','placeholder' => 'Kelas','id'=>'kelas']) !!}
                </div>
                {!! $errors->first('kelas','<p class="kelas help-block"><strong>:message</strong></p>') !!}
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::textarea('keperluan',null,['class' => 'field-input','placeholder' => 'Keperluan']) !!}
                {!! $errors->first('password', '<span class="help-block"><strong>:message</strong></span>') !!}
            </div>
            <button type="submit" id="login-button">
                Input
            </button>
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