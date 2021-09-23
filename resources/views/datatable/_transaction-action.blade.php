{!! Form::model($model,[
'url' => $form_url,
'method' => 'delete',
'class' => 'form-inline js-confirm',
'data-confirm' => $confirm_message
]) !!}
<a href="{{ $detail_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
@if (!$model->is_returned)
<a onclick="edit('{{$edit_url}}','{{$title}}')" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-retweet"></span></a>
@endif
@if ($model->is_returned)
{{-- {!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger']) !!} --}}
{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'name' => 'hapus', 'class' => 'btn btn-xs btn-danger'] ) !!}
@endif
{!! Form::close() !!}