<ul class="navbar-nav bg-navbar-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }} <sup>pro</sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('home*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
  </li>

  @if (Auth::user()->level == "admin")
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
      Category Menu
  </div>
  <!-- Nav Item - Pages Menu Navigation -->
  <li class="nav-item {{ Request::is('category*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('category.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Category</span>
      </a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
      Main Navigation
  </div>
  <li class="nav-item {{ Request::is('portofolio*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('portofolio.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Portofolio</span>
      </a>
  </li>
  <li class="nav-item {{ Request::is('jasa*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('jasa.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Jasa</span>
      </a>
  </li>
  <li class="nav-item {{ Request::is('order*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('order.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Order</span>
      </a>
  </li>
  <li class="nav-item {{ Request::is('review*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('review.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Review</span>
      </a>
  </li>
  @if (Auth::user()->level == "freelancer")
  <li class="nav-item {{ Request::is('jadwal*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('jadwal.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Jadwal</span>
      </a>
  </li>
  <li class="nav-item {{ Request::is('inbox*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('inbox.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Inbox</span>
      </a>
  </li>
  @endif

  @if (Auth::user()->level == "admin")
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
      Admin Menu
  </div>
  <!-- Nav Item - Pages Admin Menu -->
  <li class="nav-item {{ Request::is('client*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('client.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Klien</span>
      </a>
  </li>
  <li class="nav-item {{ Request::is('freelancer*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('freelancer.index') }}">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Data Freelancer </span>
      </a>
  </li>
  <!-- Nav Item - Pages Admin Setting -->
  <li class="nav-item {{ Request::is('acc-setting*') ? 'active' : ''}}">
      <a class="nav-link" href="{{ route('acc-setting.index') }}">
          <i class="fas fa-fw fa-cog"></i>
          <span>Account Settings</span>
      </a>
  </li>
  @endif

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>