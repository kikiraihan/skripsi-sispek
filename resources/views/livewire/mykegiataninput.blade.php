<div>

    <div class="modal-header">
        <h5 class="modal-title" >{{ $formTitle }}</h5>
    </div>


    <form wire:submit.prevent="{{ $metode }}">

        <div class="modal-body px-5">


                <div class="form-group">
                    <label>Judul</label>
                    <input wire:model.lazy="judul" type="text" class="form-control @error('judul') is-invalid @enderror"  placeholder="judul kegiatan">
                    @error('judul')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input wire:model.lazy="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror">
                    @error('tanggal')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input wire:model.lazy="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror"  placeholder="lokasi kegiatan">
                    @error('lokasi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>

                <div class="form-group">
                    <label>Penyelenggara</label>
                    <input wire:model.lazy="penyelenggara" type="text" class="form-control @error('penyelenggara') is-invalid @enderror"  placeholder="penyelenggara kegiatan">
                    @error('penyelenggara')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>

                {{--  <div class="form-group">
                    <label>Sertifikat</label>
                    <input wire:model.lazy="sertifikat" type="file" class="form-control"  placeholder="sertifikat">
                </div>  --}}


        </div>

        <div class="modal-footer">

        <div class="row w-100 no-gutters">
            <div class="col-6 px-1">
                <button type="button" class="btn btn-block btn-lg btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <div class="col-6 px-1">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Save changes</button>
            </div>
        </div>

        </div>

    </form>


</div>
