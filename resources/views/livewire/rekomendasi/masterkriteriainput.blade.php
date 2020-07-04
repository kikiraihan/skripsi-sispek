<div>
    {{-- The best athlete wants his opponent at his best. --}}


    <div class="modal-header">
        <h5 class="modal-title" >{{ $formTitle }}</h5>
    </div>


    <form wire:submit.prevent="{{ $metode }}">

        <div class="modal-body px-md-5">


            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input wire:model.lazy="title" type="text" class="form-control @error('title') is-invalid @enderror"  placeholder=": Nilai matakuliah a" >
                        @error('title')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Model Type</label>
                        <input wire:model.lazy="model_type" type="text" class="form-control @error('model_type') is-invalid @enderror"  placeholder=": App\Models\Foo" >
                        @error('model_type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Jenis</label>
                        <select wire:model.lazy="jenis" class="form-control @error('jenis') is-invalid @enderror">
                            <option value="" hidden>- jenis -</option>
                            <option value="angka">Angka</option>
                            <option value="non angka">Non Angka</option>
                        </select>
                        @error('jenis')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>

                <div class="col-md-12">


                    <div class="form-group">
                        <label>Path To</label>
                        <input wire:model.lazy="pathTo" type="text" class="form-control @error('pathTo') is-invalid @enderror"  placeholder=": ->matakuliah()->where(kodemk,3214234)->..  parameter tidak pakai petik" >
                        @error('pathTo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>


                    <div class="form-group">
                        <label>Rasio</label><br>
                        @if ($rasio!=null)
                        @foreach ($rasio as $key=>$item)
                            <div class="row mb-2">

                                <div class="col-md-6">
                                    <input wire:model.lazy="rasio.{{ $key }}.pilihan" type="text" class="form-control @error('rasio.{{ $key }}.pilihan') is-invalid @enderror"  placeholder=": Pilihan" >
                                    @error('rasio.{{ $key }}.pilihan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="col-md-5">
                                    <input wire:model.lazy="rasio.{{ $key }}.nilai" type="number" class="form-control @error('rasio.{{ $key }}.nilai') is-invalid @enderror"  placeholder=": Nilai" >
                                    @error('rasio.{{ $key }}.nilai')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>


                                <div class="col-md-1">
                                    <a wire:click="rasioRowDelete({{ $key }})" href="#" class="btn btn-danger w-100"> X </a>
                                </div>
                            </div>
                        @endforeach
                        @endif

                        <a wire:click="rasioRowBaru" href="#" class="btn btn-primary btn-sm">rasio baru+</a>
                    </div>

                </div>


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
