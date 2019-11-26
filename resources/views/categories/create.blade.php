{!! Form::open([
'url' => route('categories.store'),
'method' => 'POST',
'class' => 'form-horizontal'
])
!!}
@include('categories._form')
{!! Form::close() !!}