<div>

    <h5 class="text-primary">Preferensi Baru +</h5><br>


    <div class="card shadow-sm mb-4 ">


        <div class="card-body ">

            <div class="row no-gutters">
                <div class="col-md-6 p-2">
                    <label for="" >
                        Judul
                    </label>
                    <input wire:model.debounce.500ms="judul" type="text" class="form-control" placeholder="rekomendasi beasiswa, rekomendasi utusan lomba programming, dll">
                </div>

                <div class="col-md-6 p-2">
                    <label for="" >
                        Alternatif
                    </label>
                    <div class="form-group">
                        <select wire:model.lazy="model_type" class="form-control @error('model_type') is-invalid @enderror">
                            {{-- <option value="">-Pilih-</option> --}}
                            <option value="App\Models\Mahasiswa">Mahasiswa</option>

                        </select>
                        @error('model_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
            </div>

            @if ($judul AND $model_type)
            <br>
            <hr>
            <h5 class="text-primary">#1 Pilih Kriteria</h5><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend ">
                          <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                            <i class="fas fa-search text-primary"></i>
                          </div>
                        </div>
                        <input wire:model.debounce.500ms="searchKriteria" type="text" class="form-control" placeholder="cari kriteria">
                    </div>
                    @if ($kriteria!=null)
                        <ul class="list-group my-3">
                            @foreach ($kriteria as $kri)
                            <li class="list-group-item  rounded-top-0">
                                {{ $kri->title }} <span class="badge badge-info">{{ $kri->jenis }}</span>
                                <button wire:click="addKriteria({{ $kri->id }})" class="float-right btn btn-primary btn-sm px-3">
                                    +
                                </button>
                            </li>
                            @endforeach
                        </ul>
                        {{ $kriteria->links() }}
                        <label class="small" >Ditemukan : {{ $searchKriteriaCount }}</label>
                    @endif
                </div>
                <div class="col-md-6">

                    @if ($this->KriteriaTerpilihInModel!=null)

                    {{-- <div class="table-responsive">
                        <table class="table table-striped table-bordered rounded">
                            <thead class="text-capitalize">
                              <tr>
                                  <th class="p-1">Title</th>
                                  <th class="text-center p-1">Rasio</th>
                                  <th class="text-center p-1">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($kriteriaTerpilih as $kt)
                              <tr>
                                  <td>{{ $kt->title }}</td>
                                  <td class="text-right">
                                      @if ($kt->rasio!=null)
                                      @foreach ($kt->rasioRenderArray as $path=>$isi)
                                      <div class="badge badge-primary">
                                          "{{ $path}}" - <span class="font-weight-bold">{{  $isi }}</span>
                                      </div>
                                      @endforeach
                                      @else
                                      -
                                      @endif
                                  </td>
                                  <td class="text-center">
                                    <a wire:click="deleteAddedKriteria({{ $kt->id }})"  class="btn btn-sm btn-danger px-3"  href="#">
                                        X
                                    </a>
                                  </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> --}}

                    <span class="d-block text-center mb-2 text-primary font-weight-bold">Penentuan Orientasi Kriteria (Benefit/Cost)</span>
                    {{-- {{ json_encode($addedKriteria) }} --}}
                    {{-- {{ json_encode($this->KriteriaTerpilihInNama) }} --}}
                    {{-- {{ json_encode($orientasi) }} --}}

                    <ul class="list-group mb-3">
                        @foreach ($this->KriteriaTerpilihInModel as $kt)


                        <li class="list-group-item">
                            <div class="row">

                                <div class="col-md-8">
                                    <span class="small">
                                        {{ $kt->title }}
                                    </span>
                                    <span class="bg-gray-200 px-1 rounded border border-secondary">{{ $kt->id }}</span>
                                </div>

                                <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <select wire:model.lazy="orientasi.{{ $kt->id }}" class="form-control @error('orientasi[{{ $kt->id }}]') is-invalid @enderror">
                                            {{-- <option value="">-Pilih-</option> --}}
                                            <option value="benefit">Benefit</option>
                                            <option value="cost">Cost</option>
                                        </select>
                                        @error('orientasi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>

                                <div class="col-6 col-md-1">
                                    <button wire:click="deleteAddedKriteria({{ $kt->id }})"  class="float-right btn btn-sm btn-danger px-3"  >
                                        X
                                    </button>
                                </div>


                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <button wire:click="prosesKriteria()" class="btn btn-primary btn-block float-right " >Proses &rarr;</button>
                    @endif


                </div>
            </div>
            @endif


            @if ($matriksKriteria!=null)
            <br><hr>

                <h5 class="text-primary">#2 Perbandingan Berpasangan</h5><br>

                <div class="row p-2 text-center">
                    <div class="col px-0 mx-0 text-center font-weight-bold text-uppercase">
                        M
                    </div>
                    @foreach ($addedKriteria as $item)
                    <div class="col px-0 mx-0 ">
                        <span class="bg-gray-200 px-1 rounded border border-secondary">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>

                @foreach ($matriksKriteria as $a=>$baris)
                <div class="row p-2 text-center">
                    <div class="col px-0 mx-0 ">
                        <span class="bg-gray-200 px-1 rounded border border-secondary">
                            {{ $addedKriteria[$a] }}
                        </span>
                    </div>
                    @foreach ($baris as $b=>$kolom)
                    <div class="col px-0 mx-0">
                        {{-- <span class="badge badge-secondary">[{{ $a }}][{{ $b }}]</span>  --}}
                        <button wire:click="openInputMatriks({{ $a }},{{ $b }},{{ $addedKriteria[$a] }},{{ $addedKriteria[$b] }},{{ $kolom }})"
                            class="
                            btn btn-link font-weight-bold
                            @if ($kolom==0)
                            text-danger
                            @endif
                            "
                        >
                            {{ $kolom }}
                        </button>
                    </div>
                    @endforeach
                </div>
                @endforeach

                {{-- <div class="card mt-3">
                    <div class="card-body">
                        Keterangan : <br>
                        @foreach ($addedKriteria as $item)
                        <span class="small">{{ $item }} - {{ $this->getTitleOfKriteria($item) }} </span><br>
                        @endforeach
                    </div>
                </div> --}}

                <div class="mt-4">
                    <button wire:click="prosesNormalisasi()" class="btn btn-primary" >Uji konsistensi &rarr;</button>
                </div>
            @endif



            @if ($cr<0.10 AND $matriksNormalised)
            <br><hr>

            <h5 class="text-primary">#3 Hasil</h5><br>

            <div class="row align-items-center">

                <div class="col-md-6">
                    <label>Bobot Kriteria</label>
                    <ul class="list-group">
                        @for ($i = 0; $i < count($this->KriteriaTerpilihInModel); $i++)
                            <li class="list-group-item">
                                <span class="small">
                                    {{ $this->KriteriaTerpilihInModel[$i]->title }}
                                </span>
                                <span class="bg-gray-200 px-1 rounded border border-secondary">
                                    {{ $this->KriteriaTerpilihInModel[$i]->id }}
                                </span>
                                 <span class="float-right font-weight-bold">
                                    : {{ round($bobotKriteria[$i],2) }}
                                 </span>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="rounded bg-light h5 d-inline p-3 text-primary font-weight-bold">
                            Rasio Konsistensi = {{ round($cr,2) }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-4">
                <button wire:click="prosesSimpan()" class="btn btn-primary" @if($cr>0.1) disabled @endif >Simpan</button>
            </div>

            @endif

        </div>


    </div>

</div>
