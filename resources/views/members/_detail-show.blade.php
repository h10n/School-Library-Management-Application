<div class="row">
    <div class="col-md-4">
      NIS/NIP
    </div>
    <div class="col-md-8">
      {{ $member->no_induk }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      Nama
    </div>
    <div class="col-md-8">
      {{ $member->name }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      Jenis Anggota
    </div>
    <div class="col-md-8">
      {{ $member->jenis_anggota }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      Kelas
    </div>
    <div class="col-md-8">
      {{ $member->kelas }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      Jurusan
    </div>
    <div class="col-md-8">
      {{ $member->jurusan }}
    </div>
  </div>      
  <div class="row">
    <div class="col-md-4">
      E-mail
    </div>
    <div class="col-md-8">
      {{ $member->email }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      No Telepon
    </div>
    <div class="col-md-8">
      {{ $member->phone }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      Alamat
    </div>
    <div class="col-md-8">
      {{ $member->address }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      Username
    </div>
    <div class="col-md-8">
      {{ $member->user->username ?? '' }}
    </div>
  </div>
  