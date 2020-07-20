<div class="container">
    {{-- The best athlete wants his opponent at his best. --}}




    <div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                {{ session('message') }}
            </div>
        @endif
    </div>





    <div class="row no-gutters mb-3 align-items-center">
        <div class="col-md-6 p-1">
            <div class="input-group">
                <div class="input-group-prepend ">
                  <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                    <i class="fas fa-search text-primary"></i>
                  </div>
                </div>
                <input type="text" wire:model.debounce.750ms="search" class="form-control border-left-0" placeholder="Cari nama atau nim">
            </div>
        </div>
        <div class="col-md-3 p-1">
            {{-- <a href="#" class=" btn btn-primary font-weight-bold w-100">Tambahkan Mahasiswa PA</a> --}}
        </div>

        <div class="col-md-3 p-1">
            <span class="float-md-right">
                {{-- Ditemukan : --}}
                <span class="small font-weight-bold"><i class="fas fa-users  fa-sm"></i> {{ $jumlah_mahasiswa }}</span>
                mahasiswa ditemukan
            </span>
        </div>
    </div>














    @if ($mahasiswa->isEmpty())
        <div class="text-center  mt-5 mb-5">
            <img class="d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/fishing.svg')}}" alt="logout" width="35%">
            <h5>Mahasiswa</h5>
            <span class="text-secondary">tidak ditemukan</span>
            <br><br>
        </div>
    @else

    <div class="row">

        @foreach ($mahasiswa as $m)

        <div class="col-lg-4 p-3" >
            <div class="card mb-4 h-100">

                <div class="card-body p-0 p-lg-3 text-lg-center row align-items-center no-gutters ">
                    <div class="col-lg-12 col-4">
                        <p><img class="rounded img-fluid " src="{{ $m->user->gravatar }}" alt="card image"></p>
                    </div>
                    <div class="col-lg-12 col-8">
                        <h5 class="card-title">{{ $m->nama }}</h5>
                        {{-- <p class="badge badge-success p-2">IP : {{ $m->ipksekarang }}</p> --}}
                        <p class="card-text d-md-block d-none">
                            {{ $m->prodi }}, angkatan {{ $m->angkatan }}
                            {{-- This is basic card with image on top, title, description and button. --}}
                        </p>
                    </div>
                </div>



                <div class="card-footer p-0 border-top-0 bg-white row no-gutters justify-content-center">
                    <div class="col-lg-6 p-2">
                        <a href="{{ route('mahasiswa.profil', ['id'=>$m->id]) }}" class="font-weight-bold p-2 btn btn-primary btn-sm btn-block">Profil</a>
                    </div>
                    {{-- <div class="col-lg-6 p-2">
                        <a href="{{ route('akademik.lihat', ['id'=>$m->id]) }}" class="font-weight-bold p-2 btn btn-primary btn-sm btn-block">Akademik</a>
                    </div> --}}
                </div>

            </div>
        </div>

        @endforeach

    </div>

    {{ $mahasiswa->links() }}

    @endif




</div>
