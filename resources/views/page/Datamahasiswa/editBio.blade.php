{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')

<div class="row mb-4">
    <div class="col-md-3 order-md-2 text-right mb-5">


        <div class="text-center ">
            <img src="{{ $user->gravatar }}" class="shadow-sm rounded-circle">
            <br><br>
            <a class="btn btn-success " href="https://id.gravatar.com/">
                <i class="fas fa-user-circle fa-sm fa-fw "></i>
                Ganti foto
            </a>
        </div>
        <hr>

        @include('page.Datamahasiswa.updatePassword')

    </div>

    <div class="col-md-9 order-md-1">
        <div class="card shadow mb-4 overflow-hidden">
            <div class="card-header text-left bg-white border-0">
                <b>Biodata</b>
                <small class="float-right text-info">*tap untuk mengedit</small>
            </div>

                <form action="{{ route('biodata.my.update') }}" method="POST">
                    @csrf
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Nama : </span>
                            <input type="text" placeholder="nama" name="nama" value="{{ $user->mahasiswa->nama }}" class="@error('nama') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('nama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">NIM : </span>
                            <input disabled type="text" placeholder="nim" name="nim" value="{{ $user->mahasiswa->nim }}" class="@error('nim') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('nim')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Tempat Lahir : </span>
                            <input type="text" placeholder="tempat_lahir" name="tempat_lahir" value="{{ $user->mahasiswa->tempat_lahir }}" class="@error('tempat_lahir') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('tempat_lahir')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Tanggal Lahir : </span>
                            <input type="date" placeholder="tgl_lahir" name="tgl_lahir" value="{{ $user->mahasiswa->tgl_lahir->formatLocalized("%Y-%m-%d") }}" class="@error('tgl_lahir') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('tgl_lahir')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Jenis Kelamin : </span>
                            <select name="jenis_kelamin" class="
                            @error('jenis_kelamin') is-invalid @enderror
                            text-right form-control form-control-sm form-control-plaintext d-inline w-50 text-capitalize {{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}
                            " >
                                <option  value="" selected="selected" disabled="disabled" hidden="hidden">-</option>
                                <option  {{old('jenis_kelamin',$user->mahasiswa->jenis_kelamin )=="Laki-Laki"?"selected":"" }} value="Laki-Laki">Laki-Laki</option>
                                <option  {{old('jenis_kelamin',$user->mahasiswa->jenis_kelamin )=="Perempuan"?"selected":"" }} value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Golongan Darah : </span>
                            <select name="golongan_darah" class="
                            @error('golongan_darah') is-invalid @enderror
                            text-right form-control form-control-sm form-control-plaintext d-inline w-50 text-capitalize {{ $errors->has('golongan_darah') ? ' is-invalid' : '' }}
                            " >
                                <option  value="" selected="selected" disabled="disabled" hidden="hidden">-</option>
                                <option  {{old('golongan_darah',$user->mahasiswa->golongan_darah )=="O"?"selected":"" }} value="O">O</option>
                                <option  {{old('golongan_darah',$user->mahasiswa->golongan_darah )=="A"?"selected":"" }} value="A">A</option>
                                <option  {{old('golongan_darah',$user->mahasiswa->golongan_darah )=="A+"?"selected":"" }} value="A+">A+</option>
                                <option  {{old('golongan_darah',$user->mahasiswa->golongan_darah )=="B"?"selected":"" }} value="B">B</option>
                                <option  {{old('golongan_darah',$user->mahasiswa->golongan_darah )=="B+"?"selected":"" }} value="B+">B+</option>
                                <option  {{old('golongan_darah',$user->mahasiswa->golongan_darah )=="AB"?"selected":"" }} value="AB">AB</option>
                            </select>
                            @error('golongan_darah')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Agama : </span>
                            <select name="agama" class="
                            @error('agama') is-invalid @enderror
                            text-right form-control form-control-sm form-control-plaintext d-inline w-50 text-capitalize {{ $errors->has('agama') ? ' is-invalid' : '' }}
                            " >
                                <option  value="" selected="selected" disabled="disabled" hidden="hidden">-</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Islam"?"selected":"" }} value="Islam">Islam</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Hindu"?"selected":"" }} value="Hindu">Hindu</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Kristen"?"selected":"" }} value="Kristen">Kristen</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Katolik"?"selected":"" }} value="Katolik">Katolik</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Konghuchu"?"selected":"" }} value="Konghuchu">Konghuchu</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Budha"?"selected":"" }} value="Budha">Budha</option>
                                <option  {{old('agama',$user->mahasiswa->agama )=="Lainnya"?"selected":"" }} value="Lainnya">Lainnya</option>
                            </select>
                            @error('agama')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Status Kawin : </span>
                            <select name="status_menikah" class="
                            @error('status_menikah') is-invalid @enderror
                            text-right form-control form-control-sm form-control-plaintext d-inline w-50 text-capitalize {{ $errors->has('status_menikah') ? ' is-invalid' : '' }}
                            " >
                                <option  value="" selected="selected" disabled="disabled" hidden="hidden">-</option>
                                <option  {{old('status_menikah',$user->mahasiswa->status_menikah )=="1"?"selected":"" }} value="1">Sudah Menikah</option>
                                <option  {{old('status_menikah',$user->mahasiswa->status_menikah )=="0"?"selected":"" }} value="0">Belum Menikah</option>
                            </select>
                            @error('status_menikah')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>

                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Email : </span>
                            <input type="email" placeholder="email" name="email" value="{{ $user->email }}" class="@error('email') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">No KTP : </span>
                            <input type="text" placeholder="no_ktp" name="no_ktp" value="{{ $user->mahasiswa->no_ktp }}" class="@error('no_ktp') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('no_ktp')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>
                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">No HP : </span>
                            <input type="text" placeholder="no_hp" name="no_hp" value="{{ $user->mahasiswa->no_hp }}" class="@error('no_hp') is-invalid @enderror text-right form-control form-control-sm form-control-plaintext d-inline w-50" >
                            @error('no_hp')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>

                        <li class="list-group-item text-right align-items-center">
                            <span class="float-left small">Asuransi : </span>
                            <select name="asuransi" class="
                            @error('asuransi') is-invalid @enderror
                            text-right form-control form-control-sm form-control-plaintext d-inline w-50 text-capitalize {{ $errors->has('asuransi') ? ' is-invalid' : '' }}
                            " >
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="-"?"selected":"" }} value="-">-</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="JAMKESMAS"?"selected":"" }} value="JAMKESMAS">JAMKESMAS</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="JAMKESMAN"?"selected":"" }} value="JAMKESMAN">JAMKESMAN</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="JAMKESDA"?"selected":"" }} value="JAMKESDA">JAMKESDA</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="BPJS"?"selected":"" }} value="BPJS">BPJS</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="JAMKESTA"?"selected":"" }} value="JAMKESTA">JAMKESTA</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="Kelurga Sejahtera (KKS)"?"selected":"" }} value="Kelurga Sejahtera (KKS)">Kelurga Sejahtera (KKS)</option>
                                <option  {{old('asuransi',$user->mahasiswa->asuransi )=="Program Keluarga Harapan (PKH)"?"selected":"" }} value="Program Keluarga Harapan (PKH)">Program Keluarga Harapan (PKH)</option>
                            </select>
                            @error('asuransi')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </li>



                        {{--  //belum selesai  --}}
                        <li class="list-group-item text-right align-items-center"><span class="float-left small">Alamat Sekarang : </span>
                            @php
                            $alamat_sekarang=$user->mahasiswa->lokasi->where('jenis','alamat_sekarang')->first();
                            @endphp
                            @if($alamat_sekarang==NULL)
                            -
                            @else
                            {{ $alamat_sekarang->deskripsi }}
                            @endif
                        </li>
                        <li class="list-group-item text-right align-items-center"><span class="float-left small">Alamat Asal : </span>
                            @php
                            $alamat_asal=$user->mahasiswa->lokasi->where('jenis','alamat_asal')->first();
                            @endphp
                            @if($alamat_asal==NULL)
                            -
                            @else
                            {{ $alamat_asal->deskripsi }}
                            @endif
                        </li>

                        <li class="list-group-item text-right align-items-center"><span class="float-left small">Minat/Bakat : </span>
                            @if($user->mahasiswa->minatbakat->isEmpty())
                            -
                            @else
                            @foreach ($user->mahasiswa->minatbakat as $item){{ $item }},@endforeach
                            @endif
                        </li>

                        <li class="list-group-item text-right align-items-center">
                            <button type="submit" class="btn btn-block btn-success btn-lg">Simpan perubahan</button>
                        </li>


                    </ul>
                </form>


        </div>

    </div>
</div>






@endsection



@section('style-halaman')

@endsection


@section('script-halaman')

@endsection