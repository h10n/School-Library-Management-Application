{{ Form::model($announcement, array('route' => array('announcements.update', $announcement->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@include('announcements._form')
{{Form::close()}}