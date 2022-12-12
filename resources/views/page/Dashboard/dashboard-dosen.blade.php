@extends('layouts-auth.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <span class="h4 mb-0 text-gray-800">
            <span class="d-none d-md-inline">Selamat datang, {{ $user->dosen->nama }}!</span>
            <span class="d-md-none">Hi, Welcome!</span>
        </span>

        <div class="dropdown no-arrow dropleft float-right mr-1 mr-md-2">
            <a href="#" class="btn btn-sm btn-light d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="dropdown">
                {{-- ☰  --}}
                <i class="fas fa-cogs fa-sm"></i>
                Pengaturan
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <a onclick="window.livewire.emit('bukaGantiPassword')" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-redo-alt fa-sm"></i> Ganti Password</a>
                {{--  <div class="dropdown-divider"></div>  --}}
                <a onclick="window.livewire.emit('bukaEditProfil')" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-user-edit fa-sm"></i> Edit Profil</a>
            </div>
        </div>

        {{-- <div>
            <a onclick="window.livewire.emit('bukaGantiPassword')"  data-toggle="modal" data-target="#modalInput" href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-redo-alt fa-sm text-white-50"></i> Ganti Password</a>
            <a onclick="window.livewire.emit('bukaEditProfil')"  data-toggle="modal" data-target="#modalInput" href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-edit fa-sm text-white-50"></i> Edit Profil</a>
        </div> --}}
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl"  id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <livewire:editkredensialuser/>
            </div>


        </div>
    </div>





    <div class="row align-items-end">

        <div class="col-md-6 mb-4">
            <div class="row no-gutters my-3 align-items-center justify-content-center">
                <div class="col-5 px-1">
                    <div class="card shadow-sm overflow-hidden mx-auto" style="max-height:14em;max-width:14em">
                        <img src="{{ $user->gravatar }}" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-7 px-1 ">
                    <div class="card border-light shadow-sm">
                        <ul class="list-group list-group-flush small ">
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Nama : </span>{{ $user->dosen->nama }}</li>
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">NIP : </span> {{ $user->dosen->nip }}</li>
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Email : </span>{{ $user->email }}</li>
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Username : </span>{{ $user->username }}</li>
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Role : </span>
                                @foreach (json_decode($user->roles->pluck('name')) as $item)
                                <span class="bg-light text-secondary px-2 rounded font-weight-bold border">{{ $item }}</span>
                                @endforeach
                                {{-- {{ str_replace(['[','"',']'],'',)}} --}}
                            </li>
                            @if ($user->isDosenKaprodi())
                                <li class="list-group-item text-right align-items-center "><span class="float-left small">Prodi : </span>{{ $user->dosen->kaprodi->prodi }}</li>
                            @elseif ($user->isDosenKajur())
                                <li class="list-group-item text-right align-items-center "><span class="float-left small">Jurusan : </span>{{ $user->dosen->kajur->jurusan }}</li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>


            <div class="row no-gutters">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-md-4 mb-4 px-md-2">
                    <div class="card border-left-primary shadow-sm  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mahasiswa PA </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->dosen->mahasiswapa->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-md-4 mb-4 px-md-2">
                    <div class="card border-left-success shadow-sm  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Mahasiswa PA ipk > 3</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa_ipkbaik->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-md-4 mb-4 px-md-2">
                    <div class="card border-left-warning shadow-sm  py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mahasiswa PA ipk < 2.5</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa_ipkkurang->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>


            </div>



        </div>










        <div class="col-md-6 mb-4">

            <div class="card mb-4 mx-md-2">
                {{--  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Mahasiswa menurun ipk</h6>
                </div>  --}}
                <div class="card-body p-0">
                    @if ($mahasiswa_menurun_ipk->isEmpty())
                        <div class="text-center  mt-5 mb-5">
                            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/like (1).png')}}" alt="logout">
                            <span class="text-secondary">Tidak ada mahasiswa yang menurun ipk (> 0.25) pada semester ini</span>
                            <br><br>
                        </div>
                        @else
                        <label class="mb-0 small px-2 py-1">Mahasiswa yang menurun ipk (> 0.25) pada semester ini</label>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>IPK Sekarang</th>
                                        <th>IPK Sebelumnya</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($mahasiswa_menurun_ipk as $keg)
                                    <tr>
                                        <td>{{ $keg->nama }}</td>
                                        <td>{{ $keg->ipksekarang}}</td>
                                        <td>{{ $keg->IpkSebelumnyaBerubah }}</td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endif
                </div>
            </div>


        </div>


        <div class="col-md-12 mb-4">

            <div class="card mb-4 mx-md-2">
                <div class="card-header bg-white border-bottom-0 py-3">
                    <span class="m-0 font-weight-bold text-capitalize bg-light rounded p-2 text-dark">
                        <i class="fas fa-exclamation-circle text-gray-300"></i> Mahasiswa memiliki nilai C-, D, E <small class="font-weight-bold">(tidak lulus matakuliah)</small>
                    </span>

                    <span class="float-right">
                        <span class="small font-weight-bold">
                            <i class="fas fa-users  fa-sm"></i> {{ $mahasiswa_nilai_e->count() }}
                        </span>
                        <span class="d-none d-md-inline">
                            mahasiswa ditemukan
                        </span>
                    </span>

                </div>
                <div class="card-body">

                    <div class="row no-gutters">
                        @php $no=1 @endphp
                        @foreach ($mahasiswa_nilai_e->chunk(10) as $item)
                        <div class="col-lg-4 mb-3 px-3">
                            @foreach ($item as $m_nilai_e)

                            <a href="{{ route('akademik.lihat', ['id'=>$m_nilai_e->id]) }}" class="d-block text-secondary py-1 text-truncate">
                                <span class="
                                text-lowercase
                                @if ($m_nilai_e->ipksekarang>3) font-weight-bold text-success
                                @elseif ($m_nilai_e->ipksekarang<2.5)  text-warning
                                @endif
                                ">
                                    {{-- {{ $no++ }}).  --}}
                                    {{ $m_nilai_e->nama }}
                                    <sup class="badge badge-light text-secondary"> 0{{ (int)$m_nilai_e->angkatan-2000 }}</sup>
                                </span>
                                <span class="text-primary font-weight-bold float-right">
                                    {{$m_nilai_e->mkmengulang}} 
                                    <small><small><small>MK</small></small></small>
                                </span>
                            </a>

                            @endforeach
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="card-footer bg-white small">
                    <span class="font-weight-bold d-block">Keterangan : </span>
                    <span class="font-weight-bold text-success"> Hijau </span>, Mahasiswa IPK > 3. <br>
                    <span class="text-warning"> Kuning </span>, Mahasiswa IPK < 2,5. <br>
                    <span class="text-primary font-weight-bold">7</span>, Jumlah matakuliah mengulang.<br>
                    <sup class="badge badge-light text-secondary"> 2</sup>, Angkatan / tahun masuk.<br>
                </div>
            </div>


        </div>









    </div>











@endsection





@section('style-halaman')
    @livewireStyles
@endsection


@section('script-halaman')
    @livewireScripts

    <script>

        window.livewire.on('swalUpdated', () => {
            Swal.fire({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2000,
              //timerProgressBar: true,
              onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              },
                icon: 'success',
                title: 'Berhasil' ,
                text: 'data telah diubah!',
                confirmButtonText: 'Oke',
            });
            $('#modalInput').modal('hide');
            location.reload();
          })

        //window.livewire.on('tutupModal', () =>
        //{
        //    $('#modalInput').modal('hide');
        //})
    </script>
@endsection