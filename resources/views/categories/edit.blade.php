
            {!! Form::model($category,[
              'url' => route('categories.update', $category->classification_code),
              'method' => 'PUT',
              'class' => 'form-horizontal'
              ])
            !!}
            @include('categories._form')
            {!! Form::close() !!}
