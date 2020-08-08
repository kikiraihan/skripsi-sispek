<div>

    <div class="modal-header">
        <h5 class="modal-title" id="modalGantiPasswordLabel">
            {{ $formTitle }}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <form wire:submit.prevent="{{ $metode }}">
        <div class="modal-body px-5">

            @if ($metode=="gantiPassword")
                <div class="form-group">
                    {{-- <label>Password Lama</label> --}}
                    <input wire:model.lazy="passwordLama" type="text" class="form-control @error('passwordLama') is-invalid @enderror"  placeholder="passwordLama" >
                    @error('passwordLama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                <div class="form-group">
                    {{-- <label>Password Baru</label> --}}
                    <input wire:model.lazy="passwordBaru" type="text" class="form-control @error('passwordBaru') is-invalid @enderror"  placeholder="passwordBaru" >
                    @error('passwordBaru')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            @elseif($metode=="editProfil")
            <div class="form-group">
                <label>Username</label>
                <input wire:model.lazy="username" type="text" class="form-control @error('username') is-invalid @enderror"  placeholder="username" >
                @error('username')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            @if (AUTH::user()->hasRole('Dosen'))
            <div class="form-group">
                <label>Nama</label>
                <input wire:model.lazy="nama" type="text" class="form-control @error('nama') is-invalid @enderror"  placeholder="nama" >
                @error('nama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                {{-- {{ $nama }} --}}
            </div>
            @endif
            <div class="form-group">
                <label>Email</label>
                <input wire:model.lazy="email" type="text" class="form-control @error('email') is-invalid @enderror"  placeholder="email" >
                @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            @endif


        </div>
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
