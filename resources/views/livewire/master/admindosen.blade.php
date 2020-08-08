<div>





    <div class="card shadow mb-4 overflow-hidden">
        <div class="card-header border-bottom-0 font-weight-bold text-primary ">User Management</div>



        <div class="card-body px-0 py-0">
            @if ($admin->isEmpty())
            {{-- <div class="text-center  mt-5 mb-5">
              <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/startup_.svg')}}" alt="logout">
              <h5>User Baru</h5>
              <span class="text-secondary">Belum ada user baru</span>
              <br><br>
            </div> --}}
            @else
            <br>
                <label class="ml-3 font-weight-bold small">Admin</label>
                <label class="mr-3 font-weight-bold float-right small"><i class="fas fa-users"></i> {{ $admin->count() }} ditemukan</label>
                {{-- <label class="mr-3 font-weight-bold float-right small"><i class="fas fa-users"></i> Admin</label> --}}
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th width="20px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admin as $or)
                        <tr>
                            <td>{{ $or->username }}</td>
                            <td>
                                @foreach (json_decode($or->roles->pluck('name')) as $item)
                                <span class="badge @if ($item=='Kaprodi' OR $item=='Kajur') badge-success @else badge-info @endif">{{ $item }}</span>
                                @endforeach
                            </td>
                            <td>{{ $or->email }}</td>
                            <td >
                                <div class="dropdown no-arrow position-absolute dropleft">
                                    <a href="#" class="btn btn-sm btn-light" data-toggle="dropdown">
                                        ☰
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <span style=" cursor: pointer;" wire:click="bukaUpdate({{$or->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  href="#"><i class="fas fa-edit text-primary"></i> Edit </span>
                                        {{--  <div class="dropdown-divider"></div>  --}}
                                        <span style=" cursor: pointer;" wire:click="$emit('swalAndaYakin','adminDosenFixHapus',{{ $or->id }},'Anda akan menghapus data tersebut!')"  class="dropdown-item "  href="#"><i class="fas fa-trash text-danger"></i> Hapus </span>
                                        <span style=" cursor: pointer;" wire:click="$emit('swalAndaYakin','adminDosenResetPassword',{{ $or->id }},'Reset password user ini menjadi `password`?')"
                                            class="dropdown-item "  href="#"><i class="fas fa-redo-alt text-secondary"></i> Reset password </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br><br><br>
            @endif


        </div>


        <div class="card-body px-0 py-0">
            @if ($dosen->isEmpty())
            <div class="text-center  mt-5 mb-5">
                <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/startup_.svg')}}" alt="logout">
                <h5>User (Dosen,Admin)</h5>
                <span class="text-secondary">belum ada data ormawa yang di ikuti</span>
              <br><br>
            </div>
            @else
            <label class="ml-3 font-weight-bold small">Dosen, Kajur, dan Kaprodi</label>
            <label class="mr-3 font-weight-bold float-right small"><i class="fas fa-users"></i> {{ $dosen->count() }} ditemukan</label>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Kredensial Role</th>
                            <th width="20px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($dosen as $or)
                        <tr>
                            <td>{{ $or->dosen->nama }}</td>
                            <td>{{ $or->email }}</td>
                            <td>
                                @foreach (json_decode($or->roles->pluck('name')) as $item)
                                <span class="badge @if ($item=='Kaprodi' OR $item=='Kajur') badge-success @else badge-info @endif">{{ $item }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($or->hasRole('Dosen'))
                                    {{-- Nama  : {{ $or->dosen->nama }} <br> --}}
                                    <sup>Username  :</sup> <span class="float-right">{{ $or->username }}</span>
                                    <br>
                                    <sup>NIP  :</sup> <span class="float-right">{{ $or->dosen->nip }}</span>
                                @endif
                                @if ($or->hasRole('Kaprodi'))
                                    <br>
                                    <sup>Prodi  :</sup> <span class="float-right">{{ $or->dosen->kaprodi->prodi }}</span>
                                    <br>
                                    <sup>Periode  :</sup> <span class="float-right">{{ $or->dosen->kaprodi->periode }}</span>
                                @endif
                                @if ($or->hasRole('Kajur'))
                                <br>
                                <sup>Jurusan  :</sup> <span class="float-right">{{ $or->dosen->kajur->jurusan }}</span>
                                <br>
                                <sup>Periode  :</sup> <span class="float-right">{{ $or->dosen->kajur->periode }}</span>
                                @endif


                            </td>

                            <td>
                                <div class="dropdown no-arrow position-absolute dropleft">
                                    <a href="#" class="btn btn-sm btn-light" data-toggle="dropdown">
                                        ☰
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        {{-- cursor: pointer; --}}

                                        <span style=" cursor: pointer;" wire:click="bukaUpdate({{$or->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  ><i class="fas fa-edit text-primary"></i> Edit </span>
                                        <span style=" cursor: pointer;" wire:click="$emit('swalAndaYakin','adminDosenFixHapus',{{ $or->id }},'Anda akan menghapus data tersebut!')"  class="dropdown-item "  ><i class="fas fa-trash text-danger"></i> Hapus </span>
                                        <span style=" cursor: pointer;" wire:click="$emit('swalAndaYakin','adminDosenResetPassword',{{ $or->id }},'Anda akan mereset password menjadi `Password` user ini')"
                                        class="dropdown-item "  ><i class="fas fa-redo-alt text-secondary"></i> Reset password </span>

                                        @if ($or->hasRole('Kaprodi'))
                                        <div class="dropdown-divider"></div>
                                        <span style=" cursor: pointer;" wire:click=
                                        "$emit('swalAndaYakin','adminDosenBatalkanKaprodi',{{ $or->id }},'Anda akan membatalkan role kaprodi user ini')"
                                        class="dropdown-item "  ><i class="fas fa-ban text-danger"></i> Batalkan Kaprodi </span>
                                        @elseif ($or->hasRole('Kajur'))
                                        <div class="dropdown-divider"></div>
                                        <span style=" cursor: pointer;" wire:click=
                                        "$emit('swalAndaYakin','adminDosenBatalkanKajur',{{ $or->id }},'Anda akan membatalkan role kajur user ini')"
                                        class="dropdown-item "  ><i class="fas fa-ban text-danger"></i> Batalkan Kajur </span>
                                        @else
                                            @if ($or->hasRole('Dosen'))
                                            <div class="dropdown-divider"></div>
                                            <span style=" cursor: pointer;" wire:click="bukaSetAsKajur({{$or->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  ><i class="fas fa-user-edit text-success"></i> Set Kajur </span>
                                            <span style=" cursor: pointer;" wire:click="bukaSetAsKaprodi({{$or->id}})" data-toggle="modal" data-target="#modalInput"  class="dropdown-item "  ><i class="fas fa-user-edit text-success"></i> Set Kaprodi </span>
                                            @endif
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

        <button wire:click="bukaTambah()" type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Baru <i class="fas fa-plus "></i></button>
    </div>











</div>
