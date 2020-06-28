<div>

    <div class="modal-header">
        <h5 class="modal-title" >{{ $formTitle }}</h5>
    </div>


    <form wire:submit.prevent="{{ $metode }}">

        <div class="modal-body px-5">

            <div class="form-group">
                <label>Ormawa</label>
                <select @if ($idToUpdate!=NULL) disabled @endif wire:model.lazy="id_ormawa" class="form-control @error('id_ormawa') is-invalid @enderror">
                    <option value="" hidden>- ormawa -</option>
                    @foreach ($ormawa as $orm)
                        <option  value="{{ $orm->id }}">{{ $orm->nama }}</option>
                    @endforeach
                </select>
                @error('id_ormawa')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>



            <div class="form-group">
                <label>Periode Dari</label>
                <select wire:model.lazy="periode_dari" class="form-control @error('periode_dari') is-invalid @enderror">
                    <option value="" hidden>- tahun -</option>
                    @foreach ($yearRange as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
                @error('periode_dari')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>



            <div class="form-group">
                <label>Periode Sampai</label>
                <select wire:model.lazy="periode_sampai" class="form-control @error('periode_sampai') is-invalid @enderror">
                    <option  value="" hidden>- tahun -</option>
                    {{--  <option  value="" selected="selected" disabled="disabled" hidden="hidden">- tahun -</option>  --}}
                    @foreach ($yearRange as $y)
                        <option  value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
                @error('periode_sampai')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>



            {{--  surat pdf  --}}



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
