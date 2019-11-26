{!! Form::open([
'url' => route('publishers.store'),
'method' => 'POST',
'class' => 'form-horizontal'
])
!!}
@include('publishers._form')
{!! Form::close() !!}