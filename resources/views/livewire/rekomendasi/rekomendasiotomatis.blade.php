<div>

    <h5 class="text-primary">Rekomendasi Otomatis</h5>



    <div class="card">
        <div class="card-body">
            {{-- <label class="font-weight-bold text-primary">
                #Step 1
            </label><br> --}}

            <div>
                <div class="input-group">
                    <div class="input-group-prepend ">
                      <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                        <i class="fas fa-search text-primary"></i>
                      </div>
                    </div>
                    <input wire:model.debounce.500ms="searchPreferensi" type="text" class="form-control" placeholder="cari preferensi">
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
                                <i class="fab fa-searchengin fa-3x"></i>
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
    <div class="card mt-3">

        <div class="card-body">
            <label class="font-weight-bold text-primary">
                #Generate
            </label>

            <button wire:loading.attr="disabled" class="btn btn-primary float-right" wire:click="generate">
                <div wire:loading.remove wire:target="generate">
                    Generate
                </div>
                <div wire:loading wire:target="generate">
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    Tunggu sebentar..
                </div>
            </button>
            <br>
            <br>


            <div class="row">
                <div class="col-md-6">
                    <span class="font-weight-bold">Judul Preferensi :</span> <span class="text-capitalize">{{ $preferensiToGenerate['judul'] }}</span>
                    <br>
                    <br>
                    <span class="font-weight-bold">Kriteria :</span><br>
                    @foreach (json_decode($preferensiToGenerate['kriteria']) as $id=>$kriteria)
                        - {{ $this->getTitleOfKriteria($id) }} <span class="badge badge-info">{{$kriteria->jenis}} : {{round($kriteria->bobot,3)}}</span>  <br>
                    @endforeach
                    <br>
                    <span class="font-weight-bold">Alternatif :</span><br>
                    {{ str_replace("App\Models","",$preferensiToGenerate['model_type']) }}
                </div>
                <div class="col-md-6">
                    <span class="font-weight-bold">Matriks :</span><br>
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



        @if ($modelRanked)
        <hr>
        <div class="card-body">

            <label class="text-primary font-weight-bold">Ranked </label>
            <label class="float-right"> Diperoleh : {{ count($modelRanked) }} Mahasiswa</label>
            @php
                $no=1;
            @endphp
            @if ($modelRanked!="setara")
                <ul class="list-group">
                    @foreach ($modelRanked as $id_model => $value)
                    <li class="list-group-item">

                        <a class="@if($no<4) text-success @else text-secondary @endif font-weight-bold" href="{{ route('mahasiswa.profil', ['id'=>$id_model]) }}">
                            {{ $no++ }}. {{ $value['model']->nama }}
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
                setara
            @endif



        </div>
        @endif

    </div>
    @endif


    @if ($modelRanked)
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
                                    {{ $value }}
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


</div>
