<div>




    <div class="card shadow mb-4 overflow-hidden">
        <div class="card-header border-bottom-0 font-weight-bold text-primary ">Orang Tua</div>

        <div class="card-body px-0 py-0">
            @if ($orangtua->isEmpty())
            <div class="text-center  mt-5 mb-5">
                  <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/family_.svg')}}" alt="logout">
                  <span class="text-secondary">data orangtua belum di isi</span>
                <br><br>
            </div>
            @else
                <div class="">{{-- table-responsive --}}
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                          <tr>
                              <th>hubungan</th>
                              <th>nama</th>
                              <th class="d-none d-md-table-cell">pekerjaan</th>
                              <th class="d-none d-md-table-cell">kategori pekerjaan</th>
                              <th class="d-none d-md-table-cell">no HP</th>
                              <th class="d-none d-md-table-cell">pendidikan Terakhir</th>
                              <th class="d-none d-md-table-cell">kategori Penghasilan</th>
                              <th class="d-none d-md-table-cell">nominal Penghasilan</th>
                              <th>aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($orangtua as $o)
                          <tr>
                              <td>{{ $o->hubungan }}</td>
                              <td>{{ $o->nama }}</td>
                              <td class="d-none d-md-table-cell">{{ $o->pekerjaan }}</td>
                              <td class="d-none d-md-table-cell">{{ $o->kategori_pekerjaan }}</td>
                              <td class="d-none d-md-table-cell">{{ $o->no_hp }}</td>
                              <td class="d-none d-md-table-cell">{{ $o->pendidikan_terakhir }}</td>
                              <td class="d-none d-md-table-cell">{{ $o->kategori_penghasilan }}</td>
                              <td class="d-none d-md-table-cell">Rp. {{ number_format($o->nominal_penghasilan) }}</td>
                              <td>
                                <div class="dropdown no-arrow  dropleft">
                                  <span class="btn btn-sm btn-light" data-toggle="dropdown">
                                      ☰
                                  </span>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <a wire:click="bukaUpdate({{$o->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </a>
                                    {{--  <div class="dropdown-divider"></div>  --}}
                                    <a wire:click="$emit('swalAndaYakin','orangtuaFixHapus',{{ $o->id }},'Anda akan menghapus data tersebut!')"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
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

        <button wire:click="bukaTambah()" type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Tambah data <i class="fas fa-plus "></i></button>

    </div>




</div>
