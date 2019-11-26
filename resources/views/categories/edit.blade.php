{!! Form::model($category,[
'url' => route('categories.update', $category->id),
'method' => 'PUT',
'class' => 'form-horizontal'
])
!!}
@include('categories._form')
{!! Form::close() !!}