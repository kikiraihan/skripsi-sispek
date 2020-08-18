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
      <li class="nav-item ">
        <a class="nav-link" href="{{route('home')}}">
          {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>


      @role('Mahasiswa')
        {{-- <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Mahasiswa
        </div> --}}

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
          <a class="nav-link" href="{{ route('akademik.my') }}">
            {{-- <i class="fas fa-fw fa-tasks"></i> --}}
            <i class="fas fa-chart-pie"></i>
            <span>Akademik</span></a>
        </li>
      @endrole


      @role('Dosen')
        {{-- <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Dosen
        </div> --}}

        <li class="nav-item ">
          <a class="nav-link" href="{{ route('mahasiswa.pa') }}">
            <i class="fas fa-user"></i>
            <span>Mahasiswa BA</span></a>
        </li>
      @endrole


      @hasanyrole('Kajur|Kaprodi|Admin')
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('mahasiswa.all') }}">
          <i class="fas fa-users"></i>
          <span>Semua Mahasiswa</span></a>
      </li>

      @endrole


      @hasanyrole('Kajur|Kaprodi|Admin|Super Admin|Dosen')

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Rekomendasi
      </div>

      <li class="nav-item ">
        <a class="nav-link" href="{{route('masterkriteria')}}">
          {{-- <i class="fas fa-project-diagram"></i> --}}
          <i class="fas fa-th-large"></i>
          <span>Master Kriteria</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuPreferensi" aria-expanded="true" aria-controls="menuPreferensi">
          <i class="fas fa-th-large"></i>
          <span>Master Preferensi</span>
        </a>
        <div id="menuPreferensi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Preferensi :</h6>
            <a class="collapse-item" href="{{route('masterpreferensi.tambah')}}">Tambah preferensi</a>
            <a class="collapse-item" href="{{route('masterpreferensi')}}">List Preferensi</a>
          </div>
        </div>
      </li>

      @endrole

      @hasanyrole('Kajur|Kaprodi|Admin|Super Admin')

      @if (Auth::user()->hasRole('Kaprodi') OR Auth::user()->hasRole('Kajur'))
      <li class="nav-item ">
        <a class="nav-link" href="{{route('rekomendasi.otomatis')}}">
          {{-- <i class="fas fa-project-diagram"></i> --}}
          <i class="fab fa-searchengin"></i>
          <span>Rekomendasi Otomatis</span>
        </a>
      </li>
      @endif




      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kelola
      </div>

      @if (!Auth::user()->hasRole('Kaprodi'))
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('master.admindosen') }}">
          <i class="fas fa-users"></i>
          <span>User Management</span></a>
      </li>
      @endif

      <li class="nav-item ">
        <a class="nav-link"  href="{{route('import')}}">
          <i class="fas fa-fw fa-truck-loading"></i>
          {{-- <i class="fas fa-th"></i>
          <i class="fas fa-th-large"></i> --}}
          <span>Import</span></a>
      </li>
      @endrole


      {{-- <li class="nav-item ">
        <a class="nav-link" href="{{url('contoh')}}">
          <i class="fas fa-fw fa-tasks"></i>
          <span>contoh</span></a>
      </li> --}}




      <!-- Divider -->
      {{-- <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Belum selesai
      </div>

      <li class="nav-item ">
        <a class="nav-link"  href="#">
          <i class="fas fa-fw fa-truck-loading"></i>
          <span>CRUD ORMAWA</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link"  href="#">
          <i class="fas fa-fw fa-truck-loading"></i>
          <span>Matakuliah lihat/ Edit Kategori</span></a>
      </li> --}}







      <!-- Sidebar Toggler (Sidebar) -->
      <br>
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
<!-- End of Sidebar -->