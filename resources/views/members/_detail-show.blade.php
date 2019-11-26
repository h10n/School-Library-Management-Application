<div class="row">
  <div class="col-md-4">
    Member Id
  </div>
  <div class="col-md-8">
    {{ $member->no_induk }}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    Name
  </div>
  <div class="col-md-8">
    {{ $member->name }}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    Member Type
  </div>
  <div class="col-md-8">
    {{ $member->member_type }}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    Grade
  </div>
  <div class="col-md-8">
    {{ $member->kelas }}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    Major
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
    Phone number
  </div>
  <div class="col-md-8">
    {{ $member->phone }}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    Address
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