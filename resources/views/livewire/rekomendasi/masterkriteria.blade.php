

<div>

    <h5 class="text-primary">Master Kriteria</h5>
    {{-- <br> --}}






    <div class="row no-gutters mb-3">
        <div class="col-md-6 p-1">
            <div class="input-group">
                <div class="input-group-prepend ">
                  <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                    <i class="fas fa-search text-primary"></i>
                  </div>
                </div>
                <input type="text" wire:model.debounce.750ms="search" class="form-control border-left-0" placeholder="Cari title">
            </div>
        </div>
        <div class="col-md-3 p-1">

            @if (Auth::user()->hasRole('Admin|Super Admin'))
            <a href="#" wire:loading.attr="disabled" wire:click="ImportNilaiMK" class="btn btn-primary">
                <div wire:loading.remove wire:target="ImportNilaiMK">
                    {{-- gunakan wire target untuk membatasi akan dirender pada fungsi mana--}}
                    <span class="font-weight-bold">Import dari Nilai MK</span>
                    <i class="fas fa-plus fa-md"></i>
                </div>
                <div wire:loading wire:target="ImportNilaiMK" >
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Mengimport..
                </div>
            </a>
            @endif

        </div>

        <div class="col-md-3 p-1">
            <span class="float-md-right">
                {{ $jlh_kriteria }}
                ditemukan
                @if ($kriteria_nilai_mk!=0)
                (
                <span class="small font-weight-bold">{{ $kriteria_nilai_mk }}</span>
                nilai mk
                )
                @endif
            </span>
        </div>

        <div class="custom-control custom-checkbox mt-3 ml-2">
            <input wire:model="tampilnilai" type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Tampilkan kriteria nilai matakuliah</label>
        </div>

    </div>











    <div class="card shadow-sm mb-4 overflow-hidden">


        <div class="card-body px-0 py-0">
            @if ($kriteria->isEmpty())
            <div class="text-center  mt-5 mb-5">
              <img class="d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/fishing.svg')}}" alt="logout" width="35%">
              <h5>Kriteria</h5>
              <span class="text-secondary">tidak ditemukan</span>
              <br><br>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                          <tr>
                              {{-- <th>No</th> --}}
                              <th>Title</th>
                              <th>Model Type</th>
                              @if (Auth::user()->hasRole('Admin|Super Admin'))
                              <th class="d-none d-md-table-cell">Path To</th>
                              @endif
                              <th class="d-none d-md-table-cell">Jenis</th>
                              <th class="d-none d-md-table-cell">Rasio</th>
                              <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($kriteria as $key=>$p)
                          <tr>
                              <td>{{ $p->title }}</td>
                              <td>{{ str_replace('App\Models','',$p->model_type) }}</td>
                              @if (Auth::user()->hasRole('Admin|Super Admin'))
                              <td class="d-none d-md-table-cell">
                                  @foreach ($p->PathToRenderArray as $path=>$isi)
                                  <div class="badge badge-info">
                                    {{ $path }}
                                    @if ($isi!=null)
                                    (@foreach ($isi as $i) {{ $i }}, @endforeach)
                                    @endif
                                  </div>
                                  @endforeach
                                </td>
                                @endif
                              <td class="d-none d-md-table-cell">{{ $p->jenis }}</td>
                              <td class="d-none d-md-table-cell">
                                  @if ($p->rasio!=null)
                                  @foreach ($p->rasioRenderArray as $path=>$isi)
                                  <div class="badge badge-primary">
                                      "{{ $path}}" - <span class="font-weight-bold">{{  $isi }}</span>
                                  </div>
                                  @endforeach
                                  @else
                                  kosong
                                  @endif
                                </td>
                              <td>
                                <div class="dropdown no-arrow position-absolute dropleft">
                                  <span class="btn btn-sm btn-light" data-toggle="dropdown">
                                      ☰
                                  </span>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">

                                    @if (Auth::user()->hasRole('Admin|Super Admin'))
                                    <a wire:click="bukaUpdate({{$p->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </a>
                                    {{--  <div class="dropdown-divider"></div>  --}}
                                    <a wire:click="$emit('swalDeleted','kriteriaFixHapus',{{ $p->id }})"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </a>
                                    @else
                                    <span class="dropdown-item">-Tidak Tersedia-</span>
                                    @endif

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

        @if (Auth::user()->hasRole('Admin|Super Admin'))
        <button wire:click="bukaTambah()" type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Kriteria baru <i class="fas fa-plus "></i></button>
        @endif
    </div>

    {{ $kriteria->links() }}










</div>

















































{{-- ini pathTo kalo pake interface --}}
    {{-- @foreach ($path as $key=>$item)
    <div class="row p-2 pb-4">
        <div class="col-md-3">
            <span class="small text-primary font-weight-bold">Path {{ $key }}</span>
            <label>kode</label>
            <select wire:model.lazy="path.{{ $key }}.kode" class="form-control @error('path.{{ $key }}.kode') is-invalid @enderror">
                <option value="" hidden>- path.{{ $key }}.kode -</option>
                <option value="1">1 : Kolom/Tabel</option>
                <option value="2">2 : Kolom/Tabel with fungsi</option>
                <option value="3">3 : Fungsi 0 Parameter</option>
                <option value="31">31 : Fungsi 1 Parameter</option>
                <option value="32">32 : Fungsi 2 Parameter</option>
                <option value="33">33 : Fungsi 3 Parameter</option>
                <option value="4">4 : Pivot</option>
            </select>
            @error('path.{{ $key }}.kode')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

        </div>

        <div class="col-md-3">
            <label>Title</label>
            <input wire:model.lazy="path.{{ $key }}.title" type="text" class="form-control @error('path.{{ $key }}.title') is-invalid @enderror"  placeholder="Array" >
            @error('path.{{ $key }}.title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="col-md-6">
            <label>parameter</label> <br>
            @if ($path[$key]['kondisi']!=null)
                @foreach ($path[$key]['kondisi'] as $keyK=>$ini)
                <div class="p-1">
                    <input wire:model.lazy="path.{{ $key }}.kondisi.{{ $keyK }}.nilai" type="text" class="form-control @error('path.{{ $key }}.kondisi.{{ $keyK }}.nilai') is-invalid @enderror"  placeholder="Array" >
                    @error('path.{{ $key }}.kondisi.{{ $keyK }}.nilai')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                @endforeach
            @else
            null
            @endif
        </div>
    </div>

    @endforeach

    <button wire:click="pathBaru" type="button">Path Baru</button> --}}