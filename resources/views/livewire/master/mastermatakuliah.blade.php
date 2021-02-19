<div>
    

    <h5 class="text-primary">Master Matakuliah</h5>
    



    <div class="row no-gutters mb-3">
        <div class="col-md-6 p-1">
            <div class="input-group">
                <div class="input-group-prepend ">
                  <div class="input-group-text border-right-0 bg-white" id="btnGroupAddon">
                    <i class="fas fa-search text-primary"></i>
                  </div>
                </div>
                <input type="text" wire:model.debounce.750ms="search" class="form-control border-left-0" placeholder="Matakuliah">
            </div>
        </div>

        <div class="col-md-6 p-1">
            <span class="float-md-right">
                {{ $jlh_matakuliah }}
                ditemukan
            </span>
        </div>

        <div class="custom-control custom-checkbox mt-3 ml-2">
            <input wire:model="mengulangsaja" type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">hanya matakuliah memiliki pengulangan</label>
        </div>

    </div>











    <div class="card shadow-sm mb-4 overflow-hidden">


        <div class="card-body px-0 py-0">
            @if ($matakuliah->isEmpty())
            <div class="text-center  mt-5 mb-5">
              <img class="d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/fishing.svg')}}" alt="logout" width="35%">
              <h5>Matakuliah</h5>
              <span class="text-secondary">tidak ditemukan</span>
              <br><br>
            </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead class="text-capitalize">
                          <tr>
                              {{-- <th>No</th> --}}
                              <th>Nama</th>
                              <th>Kode MK</th>
                              <th>Prodi</th>
                              <th class="text-center">Mengulang</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $no=1;
                            @endphp --}}
                        @foreach ($matakuliah as $key=>$p)    
                        <tr>
                            {{-- <td>{{$key}}</td> --}}
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->kodemk }}</td>
                            <td>{{ $p->prodi }}</td>
                            <td class="text-center 
                            @if ($p->mahasiswamengulang>0)text-warning @endif
                            ">{{ $p->mahasiswamengulang }} <i class="fas fa-users"></i></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif


        </div>

        
    </div>

    {{ $matakuliah->links() }}


    
</div>
