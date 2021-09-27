<div class="callout callout-warning">
    <h4><i class="icon ion-speakerphone"></i> Pengumuman!</h4>
    <ul>
      @foreach($announcements as $announcement)
      <li>{{$announcement->text}}</li>
      @endforeach
    </ul>
  </div>
  {{-- <div class="alert alert-warning">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon ion-speakerphone"></i> Pengumuman!</h4>
                    <ul>
                        @foreach($announcements as $announcement)
                            <li>{{$announcement->text}}</li>
                            @endforeach
                    </ul>
                </div> --}}