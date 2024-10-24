<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ 'dashboard' }}" class="text-nowrap logo-img">
          <img src="/assets/images/logos/jurnalistik_main.png" style="height: 45px" alt="" />
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
            <span class="hide-menu">Beranda</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"  aria-expanded="false">
                <iconify-icon icon="hugeicons:dashboard-square-03"></iconify-icon>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li>
            <span class="sidebar-divider lg"></span>
          <li class="nav-small-cap">
            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
            <span class="hide-menu">PENGATURAN</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
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
  <!--  Sidebar End -->