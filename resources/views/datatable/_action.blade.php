{!! Form::model($model,[
  'url' => $form_url,
  'method' => 'delete',
  'class' => 'form-inline js-confirm',
  'data-confirm' => $confirm_message
  ]) !!}
  <a onclick="edit('{{$edit_url}}','{{$title}}')" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
{{-- {!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger']) !!} --}}
{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'name' => 'hapus', 'class' => 'btn btn-xs btn-danger'] )  !!}
{!! Form::close() !!}
