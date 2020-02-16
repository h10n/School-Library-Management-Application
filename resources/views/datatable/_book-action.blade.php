{!! Form::model($model,[
  'url' => $form_url,
  'method' => 'delete',
  'class' => 'form-inline js-confirm',
  'data-confirm' => $confirm_message
  ]) !!}
  <a href="{{ $detail_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
  <a href="{{ $edit_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
{!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger']) !!}
{!! Form::close() !!}
