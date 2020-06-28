<div>





  <div class="card shadow mb-4 overflow-hidden">
    <div class="card-header border-bottom-0 font-weight-bold text-primary ">Non Akademik</div>

    <div class="card-body px-0 py-0">
      @if ($kegiatan->isEmpty())
      <div class="text-center  mt-5 mb-5">
        <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/adventure_.svg')}}" alt="logout">
        <span class="text-secondary">belum ada data kegiatan non akademik</span>
        <br><br>
      </div>
      @else
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead class="text-capitalize">
            <tr>
              <th>Judul</th>
              <th>Tanggal</th>
              <th class="d-none d-md-table-cell">Lokasi</th>
              <th class="d-none d-md-table-cell">Penyelenggara</th>
              <th class="d-none d-md-table-cell">Sertifikat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kegiatan as $keg)
            <tr>
              <td>{{ $keg->judul }}</td>
              <td>{{ $keg->tanggal->formatLocalized("%d %B %Y") }}, <span class="small">{{ $keg->tanggal->diffForHumans() }}</span></td>
              <td class="d-none d-md-table-cell">{{ $keg->lokasi }}</td>
              <td class="d-none d-md-table-cell">{{ $keg->penyelenggara }}</td>
              <td class="d-none d-md-table-cell">{{ $keg->sertifikat }}</td>
              {{--  <td class="text-center dropdown dropleft">
                  <span class="btn btn-sm btn-light" data-toggle="dropdown">
                      ☰
                  </span>
                  <div class="dropdown-menu">
                    <form style="display: inline;" method="post" action="https://spk.dev/mahasiswa/delete/1">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="J9SFox6o0cfU6zugEcZOfyIVTqhfOzYK6E1KI0zw">
                        <button class="dropdown-item small text-danger">Hapus</button>
                    </form>
                  </div>
              </td>  --}}

              <td>
                <div class="dropdown no-arrow position-absolute dropleft">
                  <span class="btn btn-sm btn-light" data-toggle="dropdown">
                      ☰
                  </span>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <a wire:click="bukaUpdate({{$keg->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </a>
                    {{--  <div class="dropdown-divider"></div>  --}}
                    <a wire:click="delete({{$keg->id}})"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
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

    <button wire:click="bukaTambah()" type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Kegiatan baru <i class="fas fa-plus "></i></button>

  </div>








</div>