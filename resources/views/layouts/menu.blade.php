<ul class="sidebar-menu" data-widget="tree">
  <li class="header">
    <i class="fa fa-calendar margin"></i> {{$waktu}}    
  </li>
  @role(['admin','staff'])
  <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
    <a href="{{ route('dashboard.index') }}"><i class="ion-speedometer"></i> <span>Dashboard</span>
    </a>
  </li>
  <li class="{{ (request()->is('admin/transactions/*')) || (request()->is('admin/transactions')) ? 'active' : '' }}">
    <a href="{{url('/admin/transactions')}}"><i class="ion-ios-list"></i> <span>Transactions</span>
    </a>
  </li>
  <li class="treeview {{ (request()->is('admin/authors', 'admin/publishers','admin/members','admin/books','admin/categories','admin/announcements','admin/carousels','admin/authors/*', 'admin/publishers/*','admin/members/*','admin/books/*','admin/categories/*','admin/announcements/*','admin/carousels/*', 'admin/visitors', 'admin/visitors/*', 'admin/users', 'admin/users/*')) ? 'active' : '' }}">
    <a href="#"><i class="ion-filing"></i> <span>Master Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ (request()->is('admin/authors/*')) || (request()->is('admin/authors')) ? 'active' : '' }}">
        <a href="{{ url('/admin/authors') }}"><i class="fa {{ (request()->is('admin/authors/*')) || (request()->is('admin/authors')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Authors</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/publishers/*')) || (request()->is('admin/publishers')) ? 'active' : '' }}">
        <a href="{{ url('/admin/publishers') }}"><i class="fa {{ (request()->is('admin/publishers/*')) || (request()->is('admin/publishers')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Publishers</span>          
        </a>
      </li>
      <li class="{{ (request()->is('admin/members/*')) || (request()->is('admin/members')) ? 'active' : '' }}">
        <a href="{{url('/admin/members')}}"><i class="fa {{ (request()->is('admin/members/*')) || (request()->is('admin/members')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Members</span>          
        </a>
      </li>
      <li class="{{ (request()->is('admin/books/*')) || (request()->is('admin/books')) ? 'active' : '' }}">
        <a href="{{url('/admin/books')}}"><i class="fa {{ (request()->is('admin/books/*')) ||  (request()->is('admin/books')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Books</span>    
        </a>
      </li>
      <li class="{{ (request()->is('admin/categories/*')) || (request()->is('admin/categories')) ? 'active' : '' }}">
        <a href="{{url('/admin/categories')}}"><i class="fa {{ (request()->is('admin/categories/*')) || (request()->is('admin/categories')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Categories</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/carousels/*')) || (request()->is('admin/carousels')) ? 'active' : '' }}">
        <a href="{{url('/admin/carousels')}}"><i class="fa {{ (request()->is('admin/carousels/*')) || (request()->is('admin/carousels')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Sliders</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/announcements/*')) || (request()->is('admin/announcements')) ? 'active' : '' }}">
        <a href="{{url('/admin/announcements')}}"><i class="fa {{ (request()->is('admin/announcements/*')) || (request()->is('admin/announcements')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Announcements</span>
        </a>
      </li>
      <li class="{{ (request()->is('admin/visitors/*')) || (request()->is('admin/visitors')) ? 'active' : '' }}">
        <a href="{{url('/admin/visitors')}}"><i class="fa {{ (request()->is('admin/visitors/*')) || (request()->is('admin/visitors')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Visitors</span>
        </a>
      </li>
      @role('admin')
      <li class="{{ (request()->is('admin/users/*')) || (request()->is('admin/users')) ? 'active' : '' }}">
        <a href="{{url('/admin/users')}}"><i class="fa {{ (request()->is('admin/users/*')) || (request()->is('admin/users')) ? 'fa-circle' : 'fa-circle-o' }}"></i> <span>Users</span>
        </a>
      </li>
      @endrole
    </ul>
  </li>
  @role('admin')
  <li class="treeview {{ (request()->is('admin/export','admin/export/visitors','admin/export/transactions')) ? 'active' : '' }}">
    <a href="#"><i class="ion-ios-printer"></i> <span>Report</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ (request()->is('admin/export/visitors')) ? 'active' : '' }}"><a href="{{route('admin.export.visitors')}}"><i class="fa {{ (request()->is('admin/export/visitors')) ? 'fa-circle' : 'fa-circle-o' }}"></i> Visitor Report</a></li>
      <li class="{{ (request()->is('admin/export/transactions')) ? 'active' : '' }}"><a href="{{route('admin.export.transactions')}}"><i class="fa {{ (request()->is('admin/export/transactions')) ? 'fa-circle' : 'fa-circle-o' }}"></i> Book Borrowing Report</a>
        <li class="{{ (request()->is('admin/export')) ? 'active' : '' }}"><a href="{{route('admin.export')}}"><i class="fa {{ (request()->is('admin/export')) ? 'fa-circle' : 'fa-circle-o' }}"></i> Data Export</a>
      </li>
    </ul>
  </li>  
  <li class="{{ (request()->is('admin/settings/general/*')) || (request()->is('admin/settings/general')) ? 'active' : '' }}">
    <a href="{{ url('admin/settings/general') }}"><i class="ion-settings"></i> <span>Settings</span>
    </a>
  </li>
  @endrole
  
  @endrole
  @role('visitor')
  <li class="{{ (request()->is('visitor/guest-book')) ? 'active' : '' }}">
    <a href="{{ route('visitors.guest-book') }}"><i class="ion-person-add"></i> <span>Buku Tamu</span>
    </a>
  </li>
  @endrole
  @role('member')
  <li class="{{ (request()->is('member/status-history')) ? 'active' : '' }}">
    <a href="{{  route('members.status-history') }}"><i class="ion-document-text"></i> <span>Status & Riwayat</span>
    </a>
  </li>
  @endrole
</ul>