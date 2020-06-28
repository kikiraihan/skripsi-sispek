<div>




    <div class="card shadow mb-4 overflow-hidden">
        <div class="card-header border-bottom-0 font-weight-bold text-primary ">Prestasi</div>

        <div class="card-body px-0 py-0">
            @if ($prestasi->isEmpty())
            <div class="text-center  mt-5 mb-5">
              <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/achievement_.svg')}}" alt="logout">
              <h5>Prestasi</h5>
              <span class="text-secondary">belum ada data prestasi</span>
              <br><br>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                          <tr>
                              <th>judul</th>
                              <th>tanggal</th>
                              <th class="d-none d-md-table-cell">tingkat</th>
                              <th>peringkat</th>
                              <th class="d-none d-md-table-cell">lokasi</th>
                              <th class="d-none d-md-table-cell">kategori</th>
                              <th class="d-none d-md-table-cell">Sertifikat</th>
                              <th class="d-none d-md-table-cell">status</th>
                              <th>aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($prestasi as $p)
                          <tr>
                              <td>{{ $p->judul }}</td>
                              <td>{{ $p->tanggal->formatLocalized("%d %B %Y")  }}, <span class="small">{{ $p->tanggal->diffForHumans() }}</span></td>
                              <td class="d-none d-md-table-cell">{{ $p->tingkat }}</td>
                              <td>{{ $p->peringkat }}</td>
                              <td class="d-none d-md-table-cell">{{ $p->lokasi }}</td>
                              <td class="d-none d-md-table-cell">{{ $p->kategori }}</td>
                              <td class="d-none d-md-table-cell">{{ $p->sertifikat }}</td>
                              <td class="d-none d-md-table-cell">{{ $p->status }}</td>
                              <td>
                                <div class="dropdown no-arrow position-absolute dropleft">
                                  <span class="btn btn-sm btn-light" data-toggle="dropdown">
                                      ☰
                                  </span>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <a wire:click="bukaUpdate({{$p->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </a>
                                    {{--  <div class="dropdown-divider"></div>  --}}
                                    <a wire:click="delete({{$p->id}})"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
                                  </div>
                                </div>
                              </td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif


        </div>

        <button wire:click="bukaTambah()" type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Prestasi baru <i class="fas fa-plus "></i></button>
    </div>




</div>
