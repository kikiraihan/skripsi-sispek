<div>

    <h5 class="text-primary">Rekomendasi Otomatis</h5>
    {{-- <br> --}}

    <div class="card">
        <div class="card-body">

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
                        <h5>Mahasiswa</h5>
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
                            <button wire:click="setPreferensiToGenerate({{ $m->id }})" class="font-weight-bold p-2 btn btn-primary btn-sm btn-block">
                                Pilih
                            </button>
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
                #Step 2
            </label><br>

            Preferensi : <span class="text-capitalize">{{ $preferensiToGenerate['judul'] }}</span>
        </div>
    </div>
    @endif


</div>
