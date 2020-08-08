        @if ($role=="Kaprodi")
            @if ($metode=="updateAdminDosen")<hr>@endif
            <label class="font-weight-bold text-primary small float-right">Kredensial Kaprodi</label><br>
                <div class="form-group">
                    <label>Prodi</label>
                    <select wire:model.lazy="prodi" class="form-control @error('prodi') is-invalid @enderror">
                        <option value="" >- Prodi -</option>
                        <option value="S1 - Sistem Informasi" >S1 - Sistem Informasi</option>
                        <option value="S1 - Pendidikan Teknologi Informasi" >S1 - Pendidikan Teknologi Informasi</option>
                    </select>
                    @error('prodi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
                {{-- <span >{{ $prodi }}</span> --}}


            @endif

            @if ($role=="Kajur")
            @if ($metode=="updateAdminDosen")<hr>@endif
            <label class="font-weight-bold text-primary small float-right">Kredensial Kajur</label><br>
                <div class="form-group">
                    <label>Jurusan</label>
                    <select wire:model.lazy="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                        <option value="" >- Jurusan -</option>
                        <option value="Teknik Informatika" >Teknik Informatika</option>
                    </select>
                    @error('jurusan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            @endif

            @if ($role=="Kaprodi" OR $role=="Kajur")
            <div class="form-group">
                <label>Periode Dari</label>
                <select wire:model.lazy="periode_dari" class="form-control @error('periode_dari') is-invalid @enderror">
                    <option  value="" hidden>- Tahun -</option>
                    @foreach ($yearRange as $y)
                        <option  value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
                @error('periode_dari')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>Periode Sampai</label>
                <select wire:model.lazy="periode_sampai" class="form-control @error('periode_sampai') is-invalid @enderror">
                    <option  value="" hidden>- Tahun -</option>
                    @foreach ($yearRange as $y)
                        <option  value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
                @error('periode_sampai')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            @endif