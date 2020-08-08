<div>





    <div class="card shadow mb-4 overflow-hidden">
        <div class="card-header border-bottom-0 font-weight-bold text-primary ">Organisasi</div>

        <div class="card-body px-0 py-0">
            @if ($ormawa->isEmpty())
            <div class="text-center  mt-5 mb-5">
              <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/startup_.svg')}}" alt="logout">
              <h5>Organisasi</h5>
              <span class="text-secondary">belum ada data ormawa yang di ikuti</span>
              <br><br>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Nama</th>
                            <th>Periode</th>
                            <th class="d-none d-md-table-cell">Website</th>
                            <th class="d-none d-md-table-cell">Jenis</th>
                            <th class="d-none d-md-table-cell">Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ormawa as $or)
                        <tr>
                            <td>{{ $or->nama }}</td>
                            <td>{{ $or->pivot->periode_dari }} - {{ $or->pivot->periode_sampai }}</td>
                            <td class="d-none d-md-table-cell">{{ $or->website }}</td>
                            <td class="d-none d-md-table-cell">{{ $or->jenis }}</td>
                            <td class="d-none d-md-table-cell">{{ $or->kategori }}</td>
                            <td>
                                <div class="dropdown no-arrow position-absolute dropleft">
                                    <a href="#" class="btn btn-sm btn-light" data-toggle="dropdown">
                                        ☰
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                      <a wire:click="bukaUpdate({{$or->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </a>
                                      {{--  <div class="dropdown-divider"></div>  --}}
                                      <a wire:click="$emit('swalAndaYakin','ormawaFixHapus',{{ $or->id }},'Anda akan menghapus data tersebut!')"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
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

        <button wire:click="bukaTambah()" type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Baru <i class="fas fa-plus "></i></button>
    </div>











</div>
