@extends('layouts-auth.app')

@section('content')

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Home Profile</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="row">


            <div class="col-lg-4 order-1">

                <div class="row no-gutters my-3 align-items-center justify-content-center">
                    <div class="col-5 col-md-7 px-1 ">
                        <div class="card shadow-sm overflow-hidden" style="max-height:21em">
                            <img src="{{ $user->gravatar }}" alt="" class="w-100 h-100">
                        </div>
                    </div>
                    <div class="col-7 col-md-12 px-1 mt-md-3">
                        <div class="card border-light shadow-sm">
                            <ul class="list-group list-group-flush small ">
                                <li class="list-group-item text-right align-items-center "><span class="float-left small">Nama : </span>{{$user->mahasiswa->nama}}</li>
                                <li class="list-group-item text-right align-items-center "><span class="float-left small">NIM : </span> {{$user->mahasiswa->nim}}</li>
                                <li class="list-group-item text-right align-items-center "><span class="float-left small">Prodi : </span> {{$user->mahasiswa->prodi}}/{{$user->mahasiswa->angkatan}}</li>
                                <li class="list-group-item text-right align-items-center "><span class="float-left small">Usia : </span> {{ $user->mahasiswa->usia }} Tahun</li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>


            <div class="col-lg-8 order-md-2 order-4">
                <div class="card shadow mb-2 overflow-auto" style="max-height: 28em">
                    {{--  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Ekstrakulikuler</h6>
                      <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </div>  --}}

                    @if ($user->mahasiswa->organisasi->isEmpty())
                        <div class="text-center  mt-5 ">
                            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/startup_.svg')}}" alt="logout">
                            <h5>Organisasi</h5>
                            <span class="text-secondary">belum ada data ormawa yang di ikuti</span>
                            <br><br>

                            <li class="list-group-item text-right align-items-center bg-info ">
                                <a href="#" class="btn btn-block btn-info text-right">Tambahkan data baru <i class="fas fa-plus "></i></a>
                            </li>
                        </div>
                    @else
                    <!-- Card Body -->
                    <div class="card-body bg-info text-white px-0">
                        <h6 class="px-3 text-center font-weight-bold"> Ormawa </h6>
                        <ul class="list-group list-group-flush ">

                            @foreach ($user->mahasiswa->organisasi as $org)

                            {{-- 'nama',
                            'binaan',
                            'deskripsi',
                            'website',
                            'jenis',
                            'kategori',

                            'periode_dari'
                            'periode_sampai'
                            'suratbuktianggota'
                            'status' --}}

                            <li class="list-group-item text-right align-items-center bg-info pb-0">
                                <span class="float-left">{{ $org->nama }} </span>
                                <div class="small">
                                    <br>
                                    Periode :
                                    {{ $org->pivot->periode_dari }} - {{ $org->pivot->periode_sampai }}
                                    <br>
                                    Website :
                                    {{ $org->website }}
                                    <br>
                                    Binaan :
                                    {{ $org->binaan }}
                                </div>
                            </li>
                            @endforeach

                            <li class="list-group-item text-right align-items-center bg-info pb-0">
                                <a href="{{ route('ormawa.my') }}" class="btn btn-block btn-info text-right">Tambahkan data baru <i class="fas fa-plus "></i></a>
                            </li>


                        </ul>
                    </div>
                    @endif

                    @if ($user->mahasiswa->prestasi->isEmpty())
                        <div class="text-center  mt-5">
                            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/achievement_.svg')}}" alt="logout">
                            <h5>Prestasi</h5>
                            <span class="text-secondary">belum ada data prestasi</span>
                            <br><br>

                            <li class="list-group-item text-right align-items-center bg-success">
                                <a href="#" class="btn btn-block btn-success btn-success text-right">Tambahkan data baru <i class="fas fa-plus "></i></a>
                            </li>
                        </div>
                    @else

                    <div class="card-body bg-success text-white px-0">
                        <h6 class="px-3 text-center font-weight-bold"> Prestasi </h6>
                        <ul class="list-group list-group-flush ">

                            {{-- 'id_mahasiswa',
                            'sertifikat',
                            'judul',
                            'tanggal',
                            'tingkat',
                            'peringkat',
                            'lokasi',
                            'kategori',
                            'status' --}}

                            @foreach ($user->mahasiswa->prestasi as $p)
                            <li class="list-group-item text-right align-items-center bg-success">
                                <span class="float-left ">{{ $p->judul }}  </span>
                                <div class="small">
                                    <br>
                                    Peringkat/Tingkat :
                                    {{ $p->peringkat }} / {{ $p->tingkat }}
                                    <br>
                                    Kategori :
                                    {{ $p->kategori }}
                                    <br>
                                    Lokasi, tanggal :
                                    {{ $p->lokasi }}, {{ $p->tanggal->formatLocalized("%d %B %Y") }}
                                </div>
                            </li>
                            @endforeach
                            <li class="list-group-item text-right align-items-center bg-success">
                                <a href="{{ route('prestasi.my') }}" class="btn btn-block btn-success text-right">Tambahkan data baru <i class="fas fa-plus "></i></a>
                            </li>




                        </ul>
                    </div>
                    @endif





                </div>
            </div>

            <div class="col-lg-4 order-2 order-md-3">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Akademik</h6>
                    </div>


                    <div class="card-body pt-2">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-8">
                                <div class="chart-pie pt-2 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="AkademikPieChart" width="662" height="490" class="chartjs-render-monitor" style="display: block; height: 245px; width: 331px;"></canvas>
                                </div>
                                <div class="mt-2 text-center small">
                                    <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> A
                                    </span>
                                    <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> B
                                    </span>
                                    <span class="mr-2">
                                    <i class="fas fa-circle text-warning"></i> C
                                    </span>
                                    {{-- <br> --}}
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-danger"></i> tidak lulus
                                        {{-- C-/D/E --}}
                                    </span>
                                    {{-- <span class="mr-2">
                                    <i class="fas fa-circle text-secondary"></i> Kosong
                                    </span> --}}
                                </div>
                            </div>
                            <div class="col-4 small">
                                <span class="bg-primary text-white rounded py-1 px-2 font-weight-bold">IPK : {{ $user->mahasiswa->ipksekarang }}</span><br>
                                <br> SKS : <br>
                                <span class="text-success">{{ $user->mahasiswa->skslulus }}</span> <span class="small">lulus / {{ $user->mahasiswa->sksall }}</span> <br>


                                <br> MK : <br>
                                {{ $user->mahasiswa->mkkosong }} <span class="small">kosong ({{ $user->mahasiswa->sksall-$user->mahasiswa->skskecualiNULL }} sks)</span> <br>
                                @if ($user->mahasiswa->MkMengulang != 0)
                                <span class="badge badge-danger">{{ $user->mahasiswa->MkMengulang }}</span> <span class="small">tdk lulus ({{ $user->mahasiswa->skskecualiNULL-$user->mahasiswa->skslulus }} sks)</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                      <h4 class="small font-weight-bold">Perkuliahan <span class="float-right">{{ round(($user->mahasiswa->skslulus/144)*100,2) }}%</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(($user->mahasiswa->skslulus/144)*100,2) }}%" aria-valuenow="{{ round(($user->mahasiswa->skslulus/144)*100,2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                      <a href="{{ route('akademik.my') }}" class="btn btn-primary btn-lg btn-block"> <span class="small">Selengkapnya <i class="fas fa-arrow-right "></i> </span></a>

                    </div>
                  </div>
            </div>



            <div class="col-lg-8 order-3 order-md-4">
                <div class="card shadow mb-4 overflow-hidden">

                    <div class="card-header border-bottom-0 py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Non Akademik</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opsi :</div>
                            <a class="dropdown-item" href="{{ route('kegiatan.my') }}"><i class="fas fa-edit text-primary"></i> Edit Kegiatan</a>
                            {{--  <div class="dropdown-divider"></div>  --}}
                          </div>
                        </div>
                    </div>

                    <div class="card-body px-0 py-0">
                        @if ($user->mahasiswa->kegiatan->isEmpty())
                        <div class="text-center  mt-5 mb-5">
                            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/adventure_.svg')}}" alt="logout">
                            <span class="text-secondary">belum ada data kegiatan non akademik</span>
                            <br><br>
                        </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Lokasi</th>
                                        <th class="d-none d-md-table-cell">Penyelenggara</th>
                                        <th class="d-none d-md-table-cell">Sertifikat</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->mahasiswa->kegiatan as $keg)
                                    <tr>
                                        <td>{{ $keg->judul }}</td>
                                        <td>{{ $keg->tanggal->formatLocalized("%d %B %Y") }}</td>
                                        <td>{{ $keg->lokasi }}</td>
                                        <td class="d-none d-md-table-cell">{{ $keg->penyelenggara }}</td>
                                        <td class="d-none d-md-table-cell">{{ $keg->sertifikat }}</td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endif


                    </div>


                    {{-- <a href="#" class="btn btn-block btn-light rounded-0">Kegiatan baru <i class="fas fa-plus "></i></a> --}}

                </div>
            </div>












            <div class="col-lg-4  order-5">
                <div class="card shadow mb-2 overflow-hidden">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opsi :</div>
                            <a class="dropdown-item" href="{{ route('biodata.my') }}"><i class="fas fa-edit text-primary"></i> Edit Bio</a>
                            {{--  <div class="dropdown-divider"></div>  --}}
                          </div>
                        </div>
                      </div>

                        <div class=" overflow-auto">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> {{ $user->mahasiswa->nama }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">NIM : </span> {{ $user->mahasiswa->nim }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Tempat, tgl lahir : </span> {{ $user->mahasiswa->tempat_lahir }}, {{ $user->mahasiswa->tgl_lahir->formatLocalized("%d %B %Y") }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Jenis Kelamin : </span> {{ $user->mahasiswa->jenis_kelamin }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Golongan Darah : </span> {{ $user->mahasiswa->golongan_darah }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Agama : </span> {{ $user->mahasiswa->agama }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Status Kawin : </span> {{ $user->mahasiswa->status }}</li>

                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Email : </span> {{ $user->email }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No KTP : </span> {{ $user->mahasiswa->no_ktp }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No HP : </span> {{ $user->mahasiswa->no_hp }}</li>
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
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Asuransi : </span> {{ $user->mahasiswa->asuransi }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Minat/Bakat : </span>
                                    @if($user->mahasiswa->minatbakat->isEmpty())
                                    -
                                    @else
                                    @foreach ($user->mahasiswa->minatbakat as $item){{ $item }},@endforeach
                                    @endif
                                </li>
                            </ul>
                        </div>

                </div>
            </div>




            <div class="col-lg-4  order-6">
                <div class="card shadow mb-2 overflow-hidden">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Orangtua</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opsi :</div>
                            <a class="dropdown-item" href="{{ route('orangtua.my') }}"><i class="fas fa-edit text-primary"></i> Edit Orangtua</a>
                            {{--  <div class="dropdown-divider"></div>  --}}
                          </div>
                        </div>
                    </div>

                    <div class=" overflow-auto" >
                        @if ($user->mahasiswa->orangtua->isEmpty() )
                        <div class="text-center  my-5">
                            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/family_.svg')}}" alt="logout">
                            <span class="text-secondary">data orangtua belum di isi</span>
                        </div>
                        @else
                        <ul class="list-group list-group-flush">
                            @foreach ($user->mahasiswa->orangtua as $ortu)
                                <div class="d-block p-3 text-center text-primary small text-capitalize font-weight-bold">{{ $ortu->hubungan }} </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> {{ $ortu->nama }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No HP : </span> {{ $ortu->no_hp }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> {{ $ortu->pendidikan_terakhir }}</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pekerjaan/kategori : </span> {{ $ortu->pekerjaan }} / {{ $ortu->kategori_pekerjaan }}</li>
                                <li class="list-group-item text-right align-items-center">
                                    <span class="float-left small">Penghasilan : </span> Rp. {{ number_format($ortu->nominal_penghasilan) }}
                                    {{-- /Kategori{{ $ortu->kategori_penghasilan }} --}}
                                </li>
                            @endforeach
                            {{--  <div class="dropdown-divider"></div>  --}}
                        </ul>
                        @endif
                    </div>

                </div>
            </div>

            <div class="col-lg-4  order-7">
                <div class="card shadow mb-2 overflow-hidden">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Saudara</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opsi :</div>
                            <a class="dropdown-item" href="{{ route('saudara.my') }}"><i class="fas fa-edit text-primary"></i> Edit Saudara</a>
                            {{--  <div class="dropdown-divider"></div>  --}}
                          </div>
                        </div>
                    </div>

                    <div class=" overflow-auto" >
                        @if ($user->mahasiswa->saudara->isEmpty() )
                        <div class="text-center  my-5">
                            <img class="w-50 d-block p-3 mr-auto ml-auto" src="{{asset('ilustrasi/gaming_.svg')}}" alt="logout">
                            <span class="text-secondary">data saudara belum di isi</span>
                        </div>
                        @else
                        <ul class="list-group list-group-flush">
                            @foreach ($user->mahasiswa->saudara as $saudara)
                            <div class="d-block p-3 text-center text-primary small font-weight-bold text-capitalize">{{ $saudara->hubungan }} </div>
                            <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> {{ $saudara->nama }}</li>
                            <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> {{ $saudara->pendidikan_terakhir }}</li>
                            <li class="list-group-item text-right align-items-center"><span class="float-left small">Bekerja/Tidak : </span> {{ $saudara->bekerjakah }}</li>
                            {{--  <li class="list-group-item text-right align-items-center"><span class="float-left small">Hubungan (kakak/adik) : </span> {{ $saudara->hubungan }}</li>  --}}
                            @endforeach
                            {{--  <div class="dropdown-divider"></div>  --}}
                        </ul>
                        @endif
                    </div>

                </div>
            </div>














        </div>



















@endsection



@section('script-halaman')

<!-- Page level plugins -->
<script src="{{asset('assets_template/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('assets_template/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets_template/js/demo/chart-pie-demo.js')}}"></script>



<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("AkademikPieChart");
    var AkademikPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["A", "B", "C", "Tidak lulus", "kosong"],
        datasets: [{
        data: [{{ $user->mahasiswa->nilaiA }}, {{ $user->mahasiswa->nilaiB }}, {{ $user->mahasiswa->nilaiC }}, {{ $user->mahasiswa->mkmengulang }}, {{ $user->mahasiswa->mkkosong }}],
        backgroundColor: ['#4e73df', '#36b9cc', '#f6c23e', '#e74a3b', '#858796'],
        hoverBackgroundColor: ['#2e59d9', '#2c9faf', '#e1b64a', '#be3326', '#575969' ],
        /*danger '#e74a3b' '#be3326'*/
        /*primary '#4e73df' '#2e59d9'*/
        /*Hijau '#1cc88a' '#17a673'*/
        hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        },
        legend: {
        display: false
        },
        cutoutPercentage: 80,
    },
    });

</script>
@endsection