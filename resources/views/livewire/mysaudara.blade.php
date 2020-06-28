<div>




    <div class="card shadow mb-4 overflow-hidden">
        <div class="card-header border-bottom-0 font-weight-bold text-primary ">Saudara</div>

        <div class="card-body px-0 py-0">
            @if ($saudara->isEmpty())
            <div class="text-center  mt-5 mb-5">
                <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/gaming_.svg')}}" alt="logout">
                <span class="text-secondary">data saudara belum di isi</span>
                <br><br>
            </div>
            @else
                <div class="">{{-- table-responsive --}}
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                          <tr>

                              <th>nama</th>
                              <th>pendidikan terakhir</th>
                              <th>bekerja</th>
                              <th>hubungan</th>
                              <th>aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($saudara as $s)
                          <tr>
                              <td>{{ $s->nama }}</td>
                              <td>{{ $s->pendidikan_terakhir }}</td>
                              <td>{{ $s->bekerjakah }}</td>
                              <td>{{ $s->hubungan }}</td>
                              <td>
                                <div class="dropdown no-arrow  dropleft">
                                  <span class="btn btn-sm btn-light" data-toggle="dropdown">
                                      ☰
                                  </span>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <a wire:click="bukaUpdate({{$s->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </a>
                                    {{--  <div class="dropdown-divider"></div>  --}}
                                    <a wire:click="delete({{$s->id}})"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
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
