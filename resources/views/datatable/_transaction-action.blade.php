{{-- {!! Form::model($model,[
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

{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'name' => 'hapus', 'class' => 'btn btn-xs btn-danger'] ) !!}
@endif
{!! Form::close() !!} --}}

<a href="{{ $detail_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
@if (!$model->is_returned)
{{-- <a onclick="edit('{{$edit_url}}','{{$title}}')" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-retweet"></span></a> --}}
{!! Form::model($model,[
    'url' => $update_url,
    'method' => 'PUT',
    'class' => 'form-horizontal'
    ])
!!}
{{-- {!! Form::submit('Proses',['class'=> 'btn btn-primary']) !!} --}}
{!! Form::button('<i class="glyphicon glyphicon-retweet"></i>', ['name' => 'proses', 'class' => 'btn btn-xs btn-primary btn-confirm'] )  !!}
{!! Form::close() !!}

@else
{!! Form::model($model,[
    'url' => $form_url,
    'method' => 'delete',
    'class' => 'form-inline js-confirm',
    // 'data-confirm' => $confirm_message
]) !!}
{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['name' => 'hapus', 'class' => 'btn btn-xs btn-danger btn-confirm'] ) !!}
{!! Form::close() !!}
@endif