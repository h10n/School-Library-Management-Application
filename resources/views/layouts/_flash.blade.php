@if (session()->has('flash_notification.message'))
  <div class="content-header">
    <div class="alert alert-{{ session()->get('flash_notification.level') }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="ion-ios-bell"></i> {!! session()->get('flash_notification.message') !!}
    </div>
  </div>
@endif
