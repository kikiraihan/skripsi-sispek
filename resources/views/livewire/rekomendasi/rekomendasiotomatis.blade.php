<div>

    <h5 class="text-primary">Rekomendasi Otomatis</h5>



    <div class="card">
        <div class="card-body">
            <label class="font-weight-bold text-primary">
                #1 Pilih Preferensi
            </label>

            <div>
                <div class="input-group">
                    <div class="input-group-prepend ">
                      <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                        <i class="fas fa-search text-primary"></i>
                      </div>
                    </div>
                    <input wire:model.debounce.500ms="searchPreferensi" type="text" class="form-control" placeholder="Judul">
                </div>

                {{-- @if ($preferensi!=null)
                    <ul class="list-group my-3">
                        @foreach ($preferensi as $kri)
                        <li class="list-group-item  rounded-top-0">
                            {{ $kri->judul }}
                            <button wire:click="setPreferensiToGenerate({{ $kri->id }})" class="float-right btn btn-primary btn-sm px-3">
                                Pilih
                            </button>
                        </li>
                        @endforeach
                    </ul>
                    {{ $preferensi->links() }}
                @endif --}}

                @if ($preferensi->isEmpty())
                    <div class="text-center  mt-5 mb-5">
                        <img class="d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/fishing.svg')}}" alt="logout" width="35%">
                        <h5>Preferensi</h5>
                        <span class="text-secondary">tidak ditemukan</span>
                        <br><br>
                    </div>
                @else

                <div class="row no-gutters">

                    @foreach ($preferensi as $m)

                    <div class="col-lg-3 col-sm-6 p-2 py-3">

                        <div class="p-2 rounded bg-white border border-ligh">
                            <div class="p-1 text-center mb-3">
                                {{-- <i class="far fa-dot-circle fa-3x"></i> --}}
                                <i class="fas fa-th-large fa-3x"></i>
                                <br><br>
                                <span class="card-title h5 text-capitalize">{{ $m->judul }}</span>
                            </div>

                            {{-- <div class="row no-gutters">
                                <div class="col-md-6 p-1">
                                    <button wire:click="lihatPreferensi({{ $m->id }})" class="font-weight-bold p-2 btn btn-secondary btn-sm btn-block">
                                        Lihat
                                    </button>
                                </div>
                                <div class="col-md-6 p-1"> --}}
                                    <button wire:click="setPreferensiToGenerate({{ $m->id }})" class="font-weight-bold p-2 btn btn-primary btn-sm btn-block">
                                        Pilih
                                    </button>
                                {{-- </div>
                            </div> --}}

                        </div>


                    </div>

                    @endforeach

                </div>

                {{ $preferensi->links() }}
                <label class="small" >Ditemukan : {{ $searchPreferensiCount }}</label>

                @endif

            </div>









        </div>
    </div>



    @if ($preferensiToGenerate)
    {{-- <h5 class="text-primary mt-4">Generate</h5> --}}

    <div class="card mt-4">

        <div class="card-body">
            <label class="text-capitalize  font-weight-bold">
                Preferensi
            </label>

            <span class="float-right text-capitalize font-weight-bold">
                id : {{ $preferensiToGenerate['id'] }}
            </span>
            <br><br>


            <div class="row">
                <div class="col-md-6">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="justify-content-md-between d-md-flex">
                                <span class="font-weight-bold">Judul :</span>
                                <br class="d-md-none">
                                <span class="text-capitalize">{{ $preferensiToGenerate['judul'] }}</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="justify-content-md-between d-md-flex">
                                <span class="font-weight-bold">Kriteria :</span>
                                <br class="d-md-none">
                                <span class="text-right text-capitalize">
                                    @foreach (json_decode($preferensiToGenerate['kriteria']) as $id=>$kriteria)
                                    {{ $this->getTitleOfKriteria($id) }} <span class="badge badge-info">{{$kriteria->jenis}} : {{round($kriteria->bobot,3)}}</span>  <br>
                                    @endforeach
                                </span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="justify-content-md-between d-md-flex">
                                <span class="font-weight-bold">Alternatif :</span>
                                <br class="d-md-none">
                                <span>{{ str_replace("App\Models","",$preferensiToGenerate['model_type']) }}</span>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <br class="d-md-none">
                            <span class="font-weight-bold">Matriks :</span><br><br>
                            @php $matriks=json_decode($preferensiToGenerate['matriks']) @endphp
                            @for ($i = 0; $i < count($matriks); $i++)
                                @for ($z = 0; $z < count($matriks[$i]); $z++)
                                    <h6 class="badge badge-secondary badge-pill p-2" style="width: 30px">{{$matriks[$i][$z]}}</h6>
                                @endfor
                                <br>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>




        </div>


        <div class="card-body">
            <span class="font-weight-bold text-primary">
                #2 Filter
            </span>
            <br><br>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model.lazy="filter_angkatan" class="form-control @error('filter_angkatan') is-invalid @enderror">
                            <option value="">-Semua Angkatan-</option>
                            @php
                                $carbon=\Carbon\Carbon::now()->year;
                            @endphp
                            @for ($i = 0; $i < 8; $i++)
                            <option value="{{ $carbon-$i }}">{{ $carbon-$i }}</option>
                            @endfor

                        </select>
                        @error('filter_angkatan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model.lazy="filter_prodi" class="form-control @error('filter_prodi') is-invalid @enderror">
                            <option value="">-Filter Prodi-</option>
                            <option value='S1 - Sistem Informasi'>Sistem Informasi</option>
                            <option value='S1 - Pendidikan Teknologi Informasi'>Pendidikan Teknologi Informasi</option>
                        </select>
                        @error('filter_prodi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model.lazy="filter_dosenpa" class="form-control @error('filter_dosenpa') is-invalid @enderror">
                            <option value="">-Filter Dosen PA-</option>
                            @foreach (App\Models\Dosen::all() as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('filter_dosenpa')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>



            </div>

            {{-- <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model.lazy="filter_ipk" class="form-control @error('filter_ipk') is-invalid @enderror">
                            <option value="">-Filter IPK-</option>
                            <option value=">:3,5">IPK  > 3,5</option>
                            <option value=">:3">IPK  > 3</option>
                            <option value=">:2,5">IPK  > 2,5</option>
                            <option value=">:2">IPK  > 2</option>
                            <option value="<:3,5">IPK  < 3,5</option>
                            <option value="<:3">IPK  < 3</option>
                            <option value="<:2,5">IPK  < 2,5</option>
                            <option value="<:2">IPK  < 2</option>
                        </select>
                        @error('filter_ipk')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <select wire:model.lazy="filter_status" class="form-control @error('filter_status') is-invalid @enderror">
                            <option value="">-Filter Status-</option>
                            <option value="aktif">Aktif</option>
                            <option value="cuti">Cuti</option>
                            <option value="pindah">Pindah</option>
                            <option value="<Dropout">Drop Out</option>
                        </select>
                        @error('filter_status')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

            </div> --}}




            <button wire:loading.attr="disabled" class="btn btn-primary " wire:click="generate">
                <div wire:loading.remove wire:target="generate">
                    Generate
                </div>
                <div wire:loading wire:target="generate">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Tunggu sebentar..
                </div>
            </button>

        </div>



        @if ($modelRanked)
        <hr>
        <div class="card-body">

            <label class="text-primary font-weight-bold">Ranked </label>
            <label class="float-right small"> Diperoleh : {{ is_array($modelRanked)?count($modelRanked):0 }} Mahasiswa</label>
            @php
                $no=1;
            @endphp
            @if ($modelRanked!="setara")
                <ul class="list-group">
                    @foreach ($modelRanked as $id_model => $value)
                    <li class="list-group-item">

                        <a class="@if($no<4) text-success @else text-secondary @endif font-weight-bold" href="{{ route('mahasiswa.profil', ['id'=>$id_model]) }}">
                            {{ $no++ }}. {{ $value['model']->nama }} - <small>{{ $value['model']->angkatan }}</small>
                        </a>

                        <span class="badge badge-primary float-right p-2 ">Nilai : {{ round($value['rank'],5) }}</span>
                        {{-- <br>
                        @foreach (json_decode($preferensiToGenerate->kriteria) as $id_kriteria=>$kriteria)
                        {{ $matriks[$id_model][$id_kriteria] }},
                        @endforeach --}}
                    </li>
                    @endforeach
                </ul>
            @elseif ($modelRanked=="setara")
                <h5 class="text-center">Setara</h5>
            @endif



        </div>
        @endif

    </div>
    @endif


    @if ($modelRanked AND $rank!="setara")
    <div x-data="{ open: false }" class="card mt-3">

        <button @click="open=!open" class="btn btn-link font-weight-bold">Lihat matriks</button>


        <div class="card-body" x-show="open">
            <div class="table-responsive">
                <table class="table table-striped mb-0 table-bordered text-center">
                    {{-- <thead>
                        <tr>
                            <td>id</td>
                            @foreach ($this->getKriteriaTitleRender() as $id_kriteria=>$kriteria)
                            <td>{{ $id_kriteria }}</td>
                            @endforeach
                        </tr>
                    </thead> --}}
                    <tbody>
                        @foreach ($this->getMatriksTitleRender() as $id_model=>$perModel)
                            <tr>
                                <td>{{ $id_model }}</td>
                                @foreach ($perModel as $id_kriteria=>$value)
                                <td class="text-primary">
                                    {{ $value }} - {{$id_kriteria}}
                                </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    @endif



    <br><br>

</div>
