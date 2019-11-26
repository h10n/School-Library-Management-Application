
            {!! Form::model($publisher,[
              'url' => route('publishers.update', $publisher->id),
              'method' => 'PUT',
              'class' => 'form-horizontal'
              ])
            !!}
            @include('publishers._form')
            {!! Form::close() !!}
