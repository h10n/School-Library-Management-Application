{!! Form::model($model,[
'url' => $form_url,
'method' => 'delete',
'class' => 'form-inline js-confirm'
]) !!}
<a href="{{ $edit_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['name' => 'hapus', 'class' => 'btn btn-xs btn-danger
btn-confirm'] ) !!}
{!! Form::close() !!}