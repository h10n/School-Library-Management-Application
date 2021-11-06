<div class="callout callout-warning">
    <h4><i class="icon ion-speakerphone"></i> Pengumuman!</h4>
    <ul>
      @foreach($announcements as $announcement)
      <li>{{$announcement->text}}</li>
      @endforeach
    </ul>
  </div>