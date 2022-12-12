@extends('layouts-auth.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <span class="h4 mb-0 text-gray-800">
            <span class="d-none d-md-inline">Selamat datang, {{ $user->username }}!</span>
            <span class="d-md-none">Hi, Welcome!</span>
        </span>

        <div class="dropdown no-arrow dropleft float-right mr-1 mr-md-2">
            <a href="#" class="btn btn-sm btn-light d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="dropdown">
                {{-- ☰ Opsi --}}
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
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Email : </span>{{ $user->email }}</li>
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Username : </span>{{ $user->username }}</li>
                            <li class="list-group-item text-right align-items-center "><span class="float-left small">Role : </span>
                                @foreach (json_decode($user->roles->pluck('name')) as $item)
                                <span class="bg-light text-secondary px-2 rounded font-weight-bold border">{{ $item }}</span>
                                @endforeach
                                {{-- {{ str_replace(['[','"',']'],'',)}} --}}
                            </li>
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
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Preferensi </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->masterpreferensi->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-th-large fa-2x text-gray-300"></i>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>


            </div>



        </div>










        <div class="col-md-6 mb-4">

            <div class="card mb-4 mx-md-2">
                <div class="card-body text-center">
                    <h5>Random Quote</h5>
                    "{{ $quote }}"
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