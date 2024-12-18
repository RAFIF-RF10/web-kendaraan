<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
                <iconify-icon icon="hugeicons:dashboard-square-03"></iconify-icon>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li>
            <span class="sidebar-divider lg"></span>
          </li>
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">Vehicle Management</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/vehicle') ? 'active' : '' }}" href="{{ route('vehicle.index') }}" aria-expanded="false">
                <iconify-icon icon="hugeicons:dashboard-square-03"></iconify-icon>
              <span class="hide-menu">Vehicle</span>
            </a>
          </li>
          <li class="sidebar-item">
            {{-- <a class="sidebar-link {{ request()->is('admin/service') ? 'active' : '' }}" href="{{ route('service.index') }}" aria-expanded="false"> --}}
                <iconify-icon icon="hugeicons:dashboard-square-03"></iconify-icon>
              <span class="hide-menu">Service</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/bookings') ? 'active' : '' }}" href="{{ route('bookings.index') }}" aria-expanded="false">
                <iconify-icon icon="hugeicons:dashboard-square-03"></iconify-icon>
              <span class="hide-menu">Booking</span>
            </a>
          </li>
          <li>
            <span class="sidebar-divider lg"></span>
          </li>
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">Pengaturan</span>
          </li>
          <li class="sidebar-item">
            {{-- <a class="sidebar-link" href="{{ route('settings') }}" aria-expanded="false"> --}}
              <iconify-icon icon="uil:setting"></iconify-icon>
              <span class="hide-menu">Pengaturan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar End -->
