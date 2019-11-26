{!! Form::open([
'url' => route('authors.store'),
'method' => 'POST',
'class' => 'form-horizontal'
])
!!}
@include('authors._form')
{!! Form::close() !!}