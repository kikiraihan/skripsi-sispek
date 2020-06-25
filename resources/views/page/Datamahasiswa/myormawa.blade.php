{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')


  <div class="card shadow mb-4 overflow-hidden">
      <div class="card-header border-bottom-0 font-weight-bold text-primary ">Organisasi</div>

      <div class="card-body px-0 py-0">
          @if ($user->mahasiswa->organisasi->isEmpty())
          <div class="text-center  mt-5 mb-5">
            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/startup_.svg')}}" alt="logout">
            <h5>Organisasi</h5>
            <span class="text-secondary">belum ada data ormawa yang di ikuti</span>
            <br><br>
          </div>
          @else
              <div class="table-responsive">
                  <table class="table table-striped mb-0">
                      <thead class="text-capitalize">
                      <tr>
                          <th>Nama</th>
                          <th>Binaan</th>
                          {{--  <th>Deskripsi</th>  --}}
                          <th>Website</th>
                          <th>Jenis</th>
                          <th>Kategori</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($user->mahasiswa->organisasi as $ormawa)
                      <tr>
                          <td>{{ $ormawa->nama }}</td>
                          <td>{{ $ormawa->binaan }}</td>
                          {{--  <td>{{ $ormawa->deskripsi }}</td>  --}}
                          <td>{{ $ormawa->website }}</td>
                          <td>{{ $ormawa->jenis }}</td>
                          <td>{{ $ormawa->kategori }}</td>
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