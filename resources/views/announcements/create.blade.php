{{ Form::open(array('route' => 'announcements.store', 'files' => true, 'class' => 'form-horizontal')) }}
@include('announcements._form')
{{ Form::close() }}