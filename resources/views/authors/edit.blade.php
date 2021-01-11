
            {!! Form::model($author,[
              'url' => route('authors.update', $author->id),
              'method' => 'PUT',
              'class' => 'form-horizontal'
              ])
            !!}
            @include('authors._form')
            {!! Form::close() !!}        
