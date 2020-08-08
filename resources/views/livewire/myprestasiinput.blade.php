<div>

    <div class="modal-header">
        <h5 class="modal-title" >{{ $formTitle }}</h5>
    </div>


    <form wire:submit.prevent="{{ $metode }}">

        <div class="modal-body px-5">


                <div class="form-group">
                    <label>Judul</label>
                    <input wire:model.lazy="judul" type="text" class="form-control @error('judul') is-invalid @enderror"  placeholder="Gemastik Competition" autofocus>
                    @error('judul')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>


                <div class="form-group">
                    <label>Tanggal</label>
                    <input wire:model.lazy="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror"  placeholder="tanggal">
                    @error('tanggal')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>


                <div class="form-group">
                    <label>Peringkat</label>
                    <select wire:model.lazy="peringkat" class="form-control @error('peringkat') is-invalid @enderror">
                        <option value="" hidden>- peringkat -</option>
                        @foreach (range(1,10) as $pgkt)
                            <option  value="{{ $pgkt }}">#{{ $pgkt }}</option>
                        @endforeach
                    </select>
                    @error('peringkat')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>


                <div class="form-group">
                    <label>Tingkat</label>
                    <select wire:model.lazy="tingkat" class="form-control @error('tingkat') is-invalid @enderror">
                        <option value="" hidden>- tingkat -</option>
                        <option value="Kampus">Kampus</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                    @error('tingkat')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>


                <div class="form-group">
                    <label>Lokasi</label>
                    <input wire:model.lazy="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror"  placeholder="Surabaya">
                    @error('lokasi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input wire:model.lazy="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror"  placeholder="sainstek, web programming, public speaking, atau ..">
                    @error('kategori')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>


                {{-- input sertifikat --}}

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
