{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')


  <div class="card shadow mb-4 overflow-hidden">
      <div class="card-header border-bottom-0 font-weight-bold text-primary ">Orang Tua</div>

      <div class="card-body px-0 py-0">
          @if ($user->mahasiswa->orangtua->isEmpty())
          <div class="text-center  mt-5 mb-5">
                <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/family_.svg')}}" alt="logout">
                <span class="text-secondary">data orangtua belum di isi</span>
              <br><br>
          </div>
          @else
              <div class="table-responsive">
                  <table class="table table-striped mb-0">
                      <thead class="text-capitalize">
                        <tr>
                            <th>hubungan</th>
                            <th>nama</th>
                            <th>pekerjaan</th>
                            <th>kategori pekerjaan</th>
                            <th>no HP</th>
                            <th>pendidikan Terakhir</th>
                            <th>kategori Penghasilan</th>
                            <th>nominal Penghasilan</th>
                            <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($user->mahasiswa->orangtua as $o)
                        <tr>
                            <td>{{ $o->hubungan }}</td>
                            <td>{{ $o->nama }}</td>
                            <td>{{ $o->pekerjaan }}</td>
                            <td>{{ $o->kategori_pekerjaan }}</td>
                            <td>{{ $o->no_hp }}</td>
                            <td>{{ $o->pendidikan_terakhir }}</td>
                            <td>{{ $o->kategori_penghasilan }}</td>
                            <td>Rp. {{ number_format($o->nominal_penghasilan) }}</td>
                            <td><a href="#"><i class="icon-plus text-muted"></i>add</a></td>
                        </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          @endif


      </div>

      <a href="#" class="btn btn-block btn-light rounded-0 ">Tambahkan <i class="fas fa-plus "></i></a>

  </div>


@endsection



@section('style-halaman')

@endsection


@section('script-halaman')

@endsection