<div>





  <div class="card shadow mb-4 overflow-hidden">
    <div class="card-header border-bottom-0 font-weight-bold text-primary ">Non Akademik</div>

    <div class="card-body px-0 py-0">
      @if ($kegiatan->isEmpty())
      <div class="text-center  mt-5 mb-5">
        <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/adventure_.svg')}}" alt="logout">
        <span class="text-secondary">belum ada data kegiatan non akademik</span>
        <br><br>
      </div>
      @else
      <div class="table-responsive">
        <table class="table table-striped mb-0">
          <thead class="text-capitalize">
            <tr>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>Lokasi</th>
              <th>Penyelenggara</th>
              <th>Sertifikat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kegiatan as $keg)
            <tr>
              <td>{{ $keg->judul }}</td>
              <td>{{ $keg->tanggal->formatLocalized("%d %B %Y") }}, <span class="small">{{ $keg->tanggal->diffForHumans() }}</span></td>
              <td>{{ $keg->lokasi }}</td>
              <td>{{ $keg->penyelenggara }}</td>
              <td>{{ $keg->sertifikat }}</td>
              <td><a href="#"><i class="icon-plus text-muted"></i>add</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif


    </div>

    <button type="button" data-toggle="modal" data-target="#modalInput" href="#" class="btn btn-block btn-light rounded-0 ">Kegiatan baru <i class="fas fa-plus "></i></button>

  </div>








</div>