<ul class="sidebar-menu" data-widget="tree">
  <li class="header"><i class="fa fa-calendar margin"></i> {{$waktu}}</li>
  <!-- Optionally, you can add icons to the links -->
  <!-- li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li -->
@if (!auth()->check())
  @include('guest.visitor-form')
<div class="box-body">
  <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Todays Visit</span>
          <span class="info-box-number">{{ $todaysvisit }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
          </div>
@endif
        @role('admin')
        <li class="">
          <a href="{{ url('/home') }}"><i class="ion-android-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        </li>
  <li class="">
    <a href="{{ url('/admin/authors') }}"><i class="ion-compose"></i> <span>Penulis</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  <li class="">
    <a href="{{ url('/admin/publishers') }}"><i class="ion-star"></i> <span>Penerbit</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  <li class="">
    <a href="{{url('/admin/members')}}"><i class="ion-trophy"></i> <span>Anggota</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  <li class="">
    <a href="{{url('/admin/books')}}"><i class="ion-stats-bars"></i> <span>Buku</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  <li class="">
    <a href="{{url('/admin/categories')}}"><i class="ion-pricetags"></i> <span>Kategori</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  <li class="">
    <a href="{{url('/admin/transactions')}}"><i class="ion-ios-list"></i> <span>Peminjaman</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
      <li class="treeview">
    <a href="#"><i class="ion-ios-printer"></i> <span>Laporan</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.export.visitors')}}"><i class="fa fa-circle-o"></i> Laporan Pengunjung</a></li>
            <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
          </ul>
  </li>
  <li class="">
    <a href="{{url('/admin/carousels')}}"><i class="ion-images"></i> <span>Slider</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
    <li class="">
    <a href="{{url('/admin/announcements')}}"><i class="ion-speakerphone"></i> <span>Pengumuman</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  @endrole
  @role('member')
  <li class="">
    <a href="{{ url('/home') }}"><i class="ion-android-home"></i> <span>Dashboard</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
  </li>
  @endrole
</ul>
