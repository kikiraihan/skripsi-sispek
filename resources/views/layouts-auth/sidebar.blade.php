<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
         <div class="sidebar-brand-icon ">
          {{-- <i class="fas fa-brain rotate-n-15"></i> --}}
          <i class="fas fa-user-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
        {{ config('app.name', 'Laravel') }} <sup>#1</sup>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-table"></i>
          <span>Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Activity:</h6>
            <a class="collapse-item" href="{{route('kegiatan.my')}}">Non Akademik</a>
            <a class="collapse-item" href="{{route('ormawa.my')}}">Organisasi</a>
            <a class="collapse-item" href="{{route('prestasi.my')}}">Prestasi</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tentang saya:</h6>
            <a class="collapse-item" href="{{route('biodata.my')}}">Biodata</a>
            <a class="collapse-item" href="{{route('orangtua.my')}}">Orang Tua</a>
            <a class="collapse-item" href="{{route('saudara.my')}}">Saudara</a>
          </div>
        </div>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Akademik</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pimpinan
      </div>

      <li class="nav-item ">
        <a class="nav-link" href="{{url('contoh')}}">
          <i class="fas fa-fw fa-tasks"></i>
          <span>contoh</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link"  href="{{route('import')}}">
          <i class="fas fa-fw fa-brain"></i>
          <span>Import</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
<!-- End of Sidebar -->