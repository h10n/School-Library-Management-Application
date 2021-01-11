<ul class="sidebar-menu" data-widget="tree">
  <li class="header">
    <i class="fa fa-calendar margin"></i> {{$waktu}}
  </li>
  @if (!auth()->check())
  @include('guest.visitor-form')
  <div class="user-panel ">
  <div class="box-body">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Todays Visit</span>
        <span class="info-box-number">{{ $todaysvisit }}</span>
      </div>    
    </div>
  </div>
  </div>
  @endif
  @role('admin')
  <li class="{{ (request()->is('home')) ? 'active' : '' }}">
    <a href="{{ url('/home') }}"><i class="ion-speedometer"></i> <span>Dashboard</span>
    </a>
  </li>
  <li class="{{ (request()->is('admin/transactions/*')) || (request()->is('admin/transactions')) ? 'active' : '' }}">
    <a href="{{url('/admin/transactions')}}"><i class="ion-ios-list"></i> <span>Peminjaman</span>
    </a>
  </li>
  <li class="treeview {{ (request()->is('admin/authors', 'admin/publishers','admin/members','admin/books','admin/categories','admin/announcements','admin/carousels','admin/authors/*', 'admin/publishers/*','admin/members/*','admin/books/*','admin/categories/*','admin/announcements/*','admin/carousels/*')) ? 'active' : '' }}">
    <a href="#"><i class="ion-filing"></i> <span>Master Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ (request()->is('admin/authors/*')) || (request()->is('admin/authors')) ? 'active' : '' }}">
        <a href="{{ url('/admin/authors') }}"><i class="fa {{ (request()->is('admin/authors/*')) || (request()->is('admin/authors')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Penulis</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/publishers/*')) || (request()->is('admin/publishers')) ? 'active' : '' }}">
        <a href="{{ url('/admin/publishers') }}"><i class="fa {{ (request()->is('admin/publishers/*')) || (request()->is('admin/publishers')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Penerbit</span>          
        </a>
      </li>
      <li class="{{ (request()->is('admin/members/*')) || (request()->is('admin/members')) ? 'active' : '' }}">
        <a href="{{url('/admin/members')}}"><i class="fa {{ (request()->is('admin/members/*')) || (request()->is('admin/members')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Anggota</span>          
        </a>
      </li>
      <li class="{{ (request()->is('admin/books/*')) || (request()->is('admin/books')) ? 'active' : '' }}">
        <a href="{{url('/admin/books')}}"><i class="fa {{ (request()->is('admin/books/*')) ||  (request()->is('admin/books')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Buku</span>    
        </a>
      </li>
      <li class="{{ (request()->is('admin/categories/*')) || (request()->is('admin/categories')) ? 'active' : '' }}">
        <a href="{{url('/admin/categories')}}"><i class="fa {{ (request()->is('admin/categories/*')) || (request()->is('admin/categories')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Kategori</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/carousels/*')) || (request()->is('admin/carousels')) ? 'active' : '' }}">
        <a href="{{url('/admin/carousels')}}"><i class="fa {{ (request()->is('admin/carousels/*')) || (request()->is('admin/carousels')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Slider</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/announcements/*')) || (request()->is('admin/announcements')) ? 'active' : '' }}">
        <a href="{{url('/admin/announcements')}}"><i class="fa {{ (request()->is('admin/announcements/*')) || (request()->is('admin/announcements')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Pengumuman</span>
        </a>
      </li>
    </ul>
  </li>
  <li class="treeview {{ (request()->is('admin/export/visitors','admin/export/transactions')) ? 'active' : '' }}">
    <a href="#"><i class="ion-ios-printer"></i> <span>Laporan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ (request()->is('admin/export/visitors')) ? 'active' : '' }}"><a href="{{route('admin.export.visitors')}}"><i class="fa {{ (request()->is('admin/export/visitors')) ? 'fa-circle' : 'fa-circle-o' }}"></i> Laporan Pengunjung</a></li>
      <li class="{{ (request()->is('admin/export/transactions')) ? 'active' : '' }}"><a href="{{route('admin.export.transactions')}}"><i class="fa {{ (request()->is('admin/export/transactions')) ? 'fa-circle' : 'fa-circle-o' }}"></i> Laporan Peminjaman Buku</a>
      </li>
    </ul>
  </li>
  @endrole
  @role('member')
  <li class="{{ (request()->is('home')) ? 'active' : '' }}">
    <a href="{{ url('/home') }}"><i class="ion-android-home"></i> <span>Dashboard</span>
    </a>
  </li>
  @endrole
</ul>