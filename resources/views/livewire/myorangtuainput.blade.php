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
                <label>Hubungan</label>
                <select wire:model.lazy="hubungan" class="form-control @error('hubungan') is-invalid @enderror">
                    <option value="" hidden>- Hubungan -</option>
                    <option value="ayah">Ayah</option>
                    <option value="ibu">Ibu</option>
                    <option value="wali">Wali</option>
                </select>
                @error('hubungan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>No Handphone</label>
                <input wire:model.lazy="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"  placeholder="0822xxxx" >
                @error('no_hp')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
                <label>Pekerjaan</label>
                <select wire:model.lazy="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror">
                    <option value="" hidden>- pekerjaan -</option>

                    <option value="88. Tidak Bekerja">88. Tidak Bekerja</option>
                    <option value="1. PNS (bukan Guru / Dosen)">1. PNS (bukan Guru / Dosen)</option>
                    <option value="2. PNS (Guru / Dosen)">2. PNS (Guru / Dosen)</option>
                    <option value="3. TNI / POLRI">3. TNI / POLRI</option>
                    <option value="4. Petani / Nelayan">4. Petani / Nelayan</option>
                    <option value="5. Buruh">5. Buruh</option>
                    <option value="6. Pegawai swasta (bukan Guru/Dosen)">6. Pegawai swasta (bukan Guru/Dosen)</option>
                    <option value="7. Pegawai swasta (Guru / Dosen)">7. Pegawai swasta (Guru / Dosen)</option>
                    <option value="8. Pegawai BUMN / BUMD">8. Pegawai BUMN / BUMD</option>
                    <option value="9. Wiraswasta / Eksekutif / Pedagang">9. Wiraswasta / Eksekutif / Pedagang</option>
                    <option value="10. Profesional Perorangan">10. Profesional Perorangan</option>
                    <option value="11. Pensiunan PNS / TNI / POLRI">11. Pensiunan PNS / TNI / POLRI</option>
                    <option value="12. Pensiunan swasta">12. Pensiunan swasta</option>
                    <option value="13. Purnawirawan / Veteran">13. Purnawirawan / Veteran</option>
                    <option value="14. Rohaniawan">14. Rohaniawan</option>
                    <option value="99. Lainnya">99. Lainnya</option>
                </select>
                @error('pekerjaan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>Kategori Pekerjaan</label>
                <select wire:model.lazy="kategori_pekerjaan" class="form-control @error('kategori_pekerjaan') is-invalid @enderror">
                    <option value="" hidden>- Kategori Pekerjaan -</option>

                    <option value="tidak bekerja">Tidak Bekerja</option>
                    <option value="1"> Kategori 1 : PNS Gol. I, PNS Gol. II, Pensiunan PNS Gol. I, Pensiunan PNS Gol. II, Pensiunan PNS Gol. III, KAUR, Bintara, Tamtama, Bintara Tinggi, Supir, Kuli Bangunan, Buruh Tani, Tukang Parkir</option>
                    <option value="2"> Kategori 2 : PNS Gol. III, Pensiunan PNS Gol. IV, Pejabat Eselon IV, Kepala Seksi, Kepala Sub Bagian, Supervisor, Perwira Pertama</option>
                    <option value="3"> Kategori 3 : PNS Gol. IV, Pejabat Eselon III, Kepala Bagian, Pengusaha Mikro dan Kecil, Asisten Manager, Perwira Menengah</option>
                    <option value="4"> Kategori 4 : Pejabat Eselon II, Dekan, Kepala Dinas, Kepala Biro, Manager</option>
                    <option value="5"> Kategori 5 : Pejabat Eselon I, Pejabat Tinggi Negara, Perwira Tinggi, Kepala Daerah, Rektor, Guru Besar, Anggota Legislatif, Pengusaha Besar dan Menengah, Direksi</option>

                </select>
                @error('kategori_pekerjaan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>Kategori Penghasilan</label>
                <select wire:model.lazy="kategori_penghasilan" class="form-control @error('kategori_penghasilan') is-invalid @enderror">
                    <option value="" hidden>- Kategori Penghasilan -</option>
                    <option value="< Rp. 1 juta"> < Rp. 1 juta</option>
                    <option value="Rp. 1 juta - 3 juta"> Rp. 1 juta - 3 juta</option>
                    <option value="Rp. 3 juta - 5 juta"> Rp. 3 juta - 5 juta</option>
                    <option value="Rp. 5 juta - 10 juta"> Rp. 5 juta - 10 juta</option>
                    <option value="> Rp. 10 juta"> > Rp. 10 juta</option>

                </select>
                @error('kategori_penghasilan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group">
                <label>Nominal Penghasilan</label>
                <input wire:model.lazy="nominal_penghasilan" type="number" class="form-control @error('nominal_penghasilan') is-invalid @enderror"  placeholder="500000" >
                @error('nominal_penghasilan')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
