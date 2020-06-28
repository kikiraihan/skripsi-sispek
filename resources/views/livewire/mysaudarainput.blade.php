<div class="overflow-auto">

    <div class="modal-header">
        <h5 class="modal-title" >{{ $formTitle }}</h5>
    </div>


    <form wire:submit.prevent="{{ $metode }}">

        <div class="modal-body px-5">

            <div class="form-group">
                <label>Nama</label>
                <input wire:model.lazy="nama" type="text" class="form-control @error('nama') is-invalid @enderror"  placeholder="Fulan bin fulan" autofocus>
                @error('nama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>Pendidikan terakhir</label>
                <select wire:model.lazy="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                    <option value="" hidden>- Pendidikan -</option>

                    <option value="tidak sekolah">Tidak Sekolah</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>

                </select>
                @error('pendidikan_terakhir')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>Bekerja</label>
                <select wire:model.lazy="bekerja" class="form-control @error('bekerja') is-invalid @enderror">
                    <option value="" hidden>- bekerja -</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
                @error('bekerja')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>


            <div class="form-group">
                <label>Hubungan</label>
                <select wire:model.lazy="hubungan" class="form-control @error('hubungan') is-invalid @enderror">
                    <option value="" hidden>- Hubungan -</option>
                    <option value="kakak">Kakak</option>
                    <option value="adik">Adik</option>
                </select>
                @error('hubungan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>




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
