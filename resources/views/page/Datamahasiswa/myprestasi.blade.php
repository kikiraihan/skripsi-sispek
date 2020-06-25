{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')


  <div class="card shadow mb-4 overflow-hidden">
      <div class="card-header border-bottom-0 font-weight-bold text-primary ">Prestasi</div>

      <div class="card-body px-0 py-0">
          @if ($user->mahasiswa->prestasi->isEmpty())
          <div class="text-center  mt-5 mb-5">
            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/achievement_.svg')}}" alt="logout">
            <h5>Prestasi</h5>
            <span class="text-secondary">belum ada data prestasi</span>
            <br><br>
          </div>
          @else
              <div class="table-responsive">
                  <table class="table table-striped mb-0">
                      <thead class="text-capitalize">
                        <tr>
                            <th>judul</th>
                            <th>tanggal</th>
                            <th>tingkat</th>
                            <th>peringkat</th>
                            <th>lokasi</th>
                            <th>kategori</th>
                            <th>Sertifikat</th>
                            <th>status</th>
                            <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($user->mahasiswa->prestasi as $p)
                        <tr>
                            <td>{{ $p->judul }}</td>
                            <td>{{ $p->tanggal->formatLocalized("%d %B %Y")  }}, <span class="small">{{ $p->tanggal->diffForHumans() }}</span></td>
                            <td>{{ $p->tingkat }}</td>
                            <td>{{ $p->peringkat }}</td>
                            <td>{{ $p->lokasi }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>{{ $p->Sertifikat }}</td>
                            <td>{{ $p->status }}</td>
                            <td><a href="#"><i class="icon-plus text-muted"></i>add</a></td>
                        </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          @endif


      </div>

      <a href="#" class="btn btn-block btn-light rounded-0">Baru <i class="fas fa-plus "></i></a>
  </div>


@endsection


@section('style-halaman')

@endsection


@section('script-halaman')

@endsection