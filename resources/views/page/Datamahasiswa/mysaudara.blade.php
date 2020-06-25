{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')


  <div class="card shadow mb-4 overflow-hidden">
      <div class="card-header border-bottom-0 font-weight-bold text-primary ">Saudara</div>

      <div class="card-body px-0 py-0">
          @if ($user->mahasiswa->saudara->isEmpty())
          <div class="text-center  mt-5 mb-5">
              <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/gaming_.svg')}}" alt="logout">
              <span class="text-secondary">data saudara belum di isi</span>
              <br><br>
          </div>
          @else
              <div class="table-responsive">
                  <table class="table table-striped mb-0">
                      <thead class="text-capitalize">
                        <tr>

                            <th>nama</th>
                            <th>pendidikan terakhir</th>
                            <th>bekerja</th>
                            <th>hubungan</th>
                            <th>aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($user->mahasiswa->saudara as $o)
                        <tr>
                            <td>{{ $o->nama }}</td>
                            <td>{{ $o->pendidikan_terakhir }}</td>
                            <td>{{ $o->bekerjakah }}</td>
                            <td>{{ $o->hubungan }}</td>
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