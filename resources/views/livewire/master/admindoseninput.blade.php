<div wire:ignore.self class="modal fade bd-example-modal" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div wire:ignore.self class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
        <div wire:ignore.self class="modal-content">

            <div class="overflow-auto">

                <div class="modal-header">
                    <h5 class="modal-title" >{{ $formTitle }}</h5>
                    @if ($idUserToUpdate)
                    <span class="float-right small font-weight-bold">id-{{ $idUserToUpdate }}</span>
                    @endif
                </div>


                <form wire:submit.prevent="{{ $metode }}">


                    @if ($metode=='setAsKajur' OR $metode=='setAsKaprodi')
                    <div class="modal-body px-5">
                        @include('layouts-auth.inputankajurkaprodi')
                    </div>
                    @else
                    <div class="modal-body px-5">

                        <div class="form-group">
                            <label>Username</label>
                            <input wire:model.lazy="username" type="text" class="form-control @error('username') is-invalid @enderror"  placeholder="username" >
                            @error('username')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input wire:model.lazy="email" type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="email" >
                            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                        @if ($metode=="newAdminDosen")
                        <div class="form-group">
                            <label>Pilih Role</label>
                            <select wire:model.lazy="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="" >- Belum memiliki role -</option>
                                <option value="Admin" >Admin</option>
                                <option value="Dosen" >Dosen</option>
                            </select>
                            @error('role')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        @endif

                        @if ($role=="Dosen" OR $role=="Kaprodi" OR $role=="Kajur")
                        <hr>
                        <label class="font-weight-bold text-primary small float-right">Kredensial Dosen</label><br>
                            <div class="form-group">
                                <label>Nama</label>
                                <input wire:model.lazy="nama" type="text" class="form-control @error('nama') is-invalid @enderror"  placeholder="nama" >
                                @error('nama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group">
                                <label>Nip</label>
                                <input wire:model.lazy="nip" type="text" class="form-control @error('nip') is-invalid @enderror"  placeholder="nip" >
                                @error('nip')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        @endif

                        @include('layouts-auth.inputankajurkaprodi')

                    </div>
                    @endif

                    <div class="modal-footer">

                        <div class="row w-100 no-gutters">
                            <div class="col-6 px-1">
                                <button  type="button" class="btn btn-block btn-lg btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-6 px-1">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">Save changes</button>
                            </div>
                        </div>

                    </div>

                </form>


            </div>

        </div>
    </div>
</div>




