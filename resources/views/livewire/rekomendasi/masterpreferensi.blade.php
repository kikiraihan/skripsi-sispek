<div>

  <h5 class="text-primary">Master Preferensi</h5>
  {{-- <br> --}}







    <div class="row no-gutters mb-3">
        <div class="col-md-6 p-1">
            <div class="input-group">
                <div class="input-group-prepend ">
                  <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                    <i class="fas fa-search text-primary"></i>
                  </div>
                </div>
                <input type="text" wire:model.debounce.750ms="search" class="form-control border-left-0" placeholder="Cari judul preferensi">
            </div>
        </div>
        <div class="col-md-6 p-1">
            <span class="float-md-right">
                {{ $jlh_preferensi }}
                ditemukan
            </span>
        </div>
    </div>




    <div class="card shadow-sm mb-4 overflow-hidden">


        <div class="card-body px-0 py-0">
            @if ($preferensi->isEmpty())
            <div class="text-center  mt-5 mb-5">
              <img class="d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/fishing.svg')}}" alt="logout" width="35%">
              <h5>Preferensi</h5>
              <span class="text-secondary">tidak ditemukan</span>
              <br><br>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                          <tr>
                              {{-- <th>No</th> --}}
                              <th>Judul</th>
                              <th>Matriks</th>
                              <th>Ordo</th>
                              <th>Kriteria</th>
                              <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($preferensi as $key=>$pre)
                          <tr>
                              <td>{{ $pre->judul }}</td>
                              <td>
                                @php $matriks=json_decode($pre->matriks) @endphp
                                @for ($i = 0; $i < count($matriks); $i++)
                                    @for ($z = 0; $z < count($matriks[$i]); $z++)
                                        <h6 class="badge badge-secondary badge-pill p-2" style="width: 30px">{{$matriks[$i][$z]}}</h6>
                                    @endfor
                                    <br>
                                @endfor
                              </td>
                              <td>{{ $pre->ordo }}</td>
                              <td>
                                @foreach (json_decode($pre->kriteria) as $id=>$kriteria)
                                {{ $this->getTitleOfKriteria($id) }} <span class="badge badge-info">{{$kriteria->jenis}} : {{round($kriteria->bobot,3)}}</span>  <br>
                                @endforeach
                              </td>
                              <td>
                                <div class="dropdown no-arrow position-absolute dropleft">
                                  <button class="btn btn-sm btn-light" data-toggle="dropdown">
                                      ☰
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <a wire:click="$emit('swalDeleted','preferensiFixHapus',{{ $pre->id }})"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
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



        <a href="{{ route('masterpreferensi.tambah') }}" class="btn btn-block btn-light rounded-0 ">Preferensi baru <i class="fas fa-plus "></i></a>

    </div>

    {{ $preferensi->links() }}



</div>
