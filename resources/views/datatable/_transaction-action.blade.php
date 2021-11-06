<a href="{{ $detail_url }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
@if (!$model->is_returned)
{!! Form::model($model,[
    'url' => $update_url,
    'method' => 'PUT',
    'class' => 'form-horizontal'
    ])
!!}
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