@extends('layouts-auth.app')

@section('content')

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contoh</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <div class="row">


            <div class="col-lg-4">

                <div class="row no-gutters my-3 align-items-center justify-content-center">
                    <div class="col-5 col-md-7 px-1 ">
                        <div class="card shadow-sm overflow-hidden" style="max-height:21em">
                            <img src="{{ asset('assets_landing/img/avatar_2x.png') }}" alt="" class="w-100 h-100">
                        </div>
                    </div>
                    <div class="col-7 col-md-12 px-1 mt-md-3">
                        <div class="card border-light shadow-sm">
                            <ul class="list-group list-group-flush small ">
                                <li class="list-group-item text-right align-items-center small"><span class="float-left">Nama : </span> Moh Zulkifli Katili</li>
                                <li class="list-group-item text-right align-items-center small"><span class="float-left">NIM : </span> 531416066</li>
                                <li class="list-group-item text-right align-items-center small"><span class="float-left">Prodi/Angkatan : </span> S1-Sistem Informasi/2016</li>
                                <li class="list-group-item text-right align-items-center small"><span class="float-left">Usia : </span> 23 Tahun</li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>


            <div class="col-lg-8">
                <div class="card shadow mb-4 overflow-auto" style="max-height: 27em">
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


                    <!-- Card Body -->
                    <div class="card-body bg-info text-white px-0">
                        <h6 class="px-3 text-center"> Ormawa </h6>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item text-right align-items-center bg-info pb-0">
                                <span class="float-left">Kelompok Studi Linux - UNG  </span>
                                <div class="small">
                                    <br>
                                    Periode :
                                    2016-2018
                                    <br>
                                    Website :
                                    https://asdi.com
                                    <br>
                                    Binaan :
                                    Universitas
                                </div>
                            </li>


                        </ul>
                    </div>

                    <div class="card-body bg-success text-white px-0">
                        <h6 class="px-3 text-center"> Prestasi </h6>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item text-right align-items-center bg-success">
                                <span class="float-left ">FIT COMPETITION 2018  </span>
                                <div class="small">
                                    <br>
                                    Peringkat/Tingkat :
                                    3 / Nasional
                                    <br>
                                    Kategori :
                                    Web Programing
                                    <br>
                                    Lokasi, tanggal :
                                    Salatiga, 20 April 2018
                                </div>
                            </li>




                        </ul>
                    </div>





                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow mb-4">
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
                                    <span class="mr-2">
                                    <i class="fas fa-circle text-secondary"></i> D/E
                                    </span>
                                </div>
                            </div>
                            <div class="col-4 small">
                                IPK : 3.50<br>
                                SKS : 98
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                      <h4 class="small font-weight-bold">Perkuliahan <span class="float-right">80%</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                      <a href="#" class="btn btn-primary  btn-block"> <span class="small">Selengkapnya <i class="fas fa-arrow-right "></i> </span></a>

                    </div>
                  </div>
            </div>



            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header border-bottom-0 font-weight-bold text-primary ">Non Akademik</div>

                    <div class="card-body px-0 py-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                            <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Penyelenggara</th>
                                <th>Sertifikat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Samsung Galaxy S9</td>
                                <td>$800</td>
                                <td>July 15, 2019</td>
                                <td><span class="text-success">Completed</span></td>
                                <td><span class="text-success">Completed</span></td>
                                <td><a href="#"><i class="icon-plus text-muted"></i></a></td>
                            </tr>
                            <tr>
                                <td>iPhone X</td>
                                <td>$1000</td>
                                <td>August 19, 2019</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td><span class="text-warning">Pending</span></td>
                                <td><a href="#"><i class="icon-plus text-muted"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>












            <div class="col-12">
                <div class="card shadow mb-4">


                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                        <div class="dropdown no-arrow">
                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opsi :</div>
                            <a class="dropdown-item" href="#"><i class="fas fa-edit text-primary"></i> Edit</a>
                            {{--  <div class="dropdown-divider"></div>  --}}
                          </div>
                        </div>
                      </div>

                    <div class="row no-gutters overflow-auto" style="max-height:33.5em">
                        <div class="col-lg-4 border-left-primary">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Moh Zulkifli Katili</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">NIM : </span> 531416066</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Tempat, tgl lahir : </span> Gorontalo, 20 Maret 1997</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Jenis Kelamin : </span> Laki-Laki</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Golongan Darah : </span> O</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Agama : </span> Islam</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Status Kawin : </span> Belum kawin</li>

                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Email : </span> mohzulkiflikatili@gmail.com</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No KTP : </span> 72138912378923178</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No HP : </span> 082291501085</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Alamat Sekarang : </span> Jl. Sawah Besar, Desa Talango, Kec. Kabila, Kab. Bono Bolango, Gorontalo</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Alamat Asal : </span> Jl. Sawah Besar, Desa Talango, Kec. Kabila, Kab. Bono Bolango, Gorontalo</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Asuransi : </span> BPJS</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Minat/Bakat : </span> Programming, Desain, dll</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 border-left-primary">
                            {{--  <div class="card-body">
                                adkoasdkoads
                            </div>  --}}
                            <ul class="list-group list-group-flush">
                                {{--  <div class="dropdown-divider"></div>  --}}
                                <div class="d-block p-3 text-center text-primary small">Ayah </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Syafrudin Katili</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No HP : </span> 081340416262</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> S2</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pekerjaan/kategori : </span> Dosen/IV</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Penghasilan/Kategori : </span> Rp. 3.000.000/IV</li>
                                <div class="d-block p-3 text-center text-primary small">Ibu </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Kartin Usman</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">No HP : </span> 082218399283</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> S2</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pekerjaan/kategori : </span> Dosen/IV</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Penghasilan/Kategori : </span> Rp. 3.000.000/IV</li>
                            </ul>
                        </div>

                        <div class="col-lg-4 border-left-primary">
                            {{--  <div class="card-body">
                                adkoasdkoads
                            </div>  --}}
                            <ul class="list-group list-group-flush">
                                <div class="d-block p-3 text-center text-primary small">Saudara </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Siti Nur Qamariah Katili</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> SMA</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Bekerja/Tidak : </span> Tidak</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Hubungan (kakak/adik) : </span> Kakak</li>
                                <div class="d-block p-3 text-center text-primary small">Saudara </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Moh Tantawi Katili</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> SMA</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Bekerja/Tidak : </span> Tidak</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Hubungan (kakak/adik) : </span> Adik</li>
                                <div class="d-block p-3 text-center text-primary small">Saudara </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Moh Fajrin Katili</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> SMA</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Bekerja/Tidak : </span> Tidak</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Hubungan (kakak/adik) : </span> Adik</li>
                                <div class="d-block p-3 text-center text-primary small">Saudara </div>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Nama : </span> Moh Gufron Katili</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Pendidikan terakhir : </span> SMA</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Bekerja/Tidak : </span> Tidak</li>
                                <li class="list-group-item text-right align-items-center"><span class="float-left small">Hubungan (kakak/adik) : </span> Adik</li>
                            </ul>
                        </div>

                    </div>


                </div>
            </div>





        </div>





        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                        <h4 class="card-title">Sunlimetech</h4>
                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                        <h4 class="card-title">Sunlimetech</h4>
                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                        <h4 class="card-title">Sunlimetech</h4>
                        <p class="card-text">This is basic card with image on top, title, description and button.</p>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>









        <!-- Content Row -->
        <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                    <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                    </div>
                    <div class="col">
                        <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow-sm h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>

        <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow-sm mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
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
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                </div>
            </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow-sm mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
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
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                <canvas id="MyPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direct
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Referral
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-10">
        <div class="card shadow-sm mb-4">
            <div class="card-header border-bottom-0">Sales</div>
            <div class="card-body px-0 py-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Samsung Galaxy S9</td>
                    <td>$800</td>
                    <td>July 15, 2019</td>
                    <td><span class="text-success">Completed</span></td>
                    <td><a href="#"><i class="icon-plus text-muted"></i></a></td>
                </tr>
                <tr>
                    <td>iPhone X</td>
                    <td>$1000</td>
                    <td>August 19, 2019</td>
                    <td><span class="text-warning">Pending</span></td>
                    <td><a href="#"><i class="icon-plus text-muted"></i></a></td>
                </tr>
                <tr>
                    <td>Sony Xperia ZX</td>
                    <td>$850</td>
                    <td>July 15, 2019</td>
                    <td><span class="text-danger">Cancelled</span></td>
                    <td><a href="#"><i class="icon-plus text-muted"></i></a></td>
                </tr>
                </tbody>
            </table>
            </div>
            </div>
        </div>
        </div>
        </div>

        <!-- Content Row -->
        <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            </div>



            <!-- Color System -->
            <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Success
                    <div class="text-white-50 small">#1cc88a</div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Info
                    <div class="text-white-50 small">#36b9cc</div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    Warning
                    <div class="text-white-50 small">#f6c23e</div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Danger
                    <div class="text-white-50 small">#e74a3b</div>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    Secondary
                    <div class="text-white-50 small">#858796</div>
                </div>
                </div>
            </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('assets_template/img/undraw_posting_photo.svg')}}" alt="">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
            </div>
            </div>

            <!-- Approach -->
            <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive ruse of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
            </div>
            </div>

        </div>
        </div>






@endsection



@section('script-halaman')
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("AkademikPieChart");
    var AkademikPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["A", "B", "C", "D/E"],
        datasets: [{
        data: [55, 30, 15, 1],
        backgroundColor: ['#4e73df', '#36b9cc', '#f6c23e', '#858796'],
        hoverBackgroundColor: ['#2e59d9', '#2c9faf', '#e1b64a', '#575969' ],
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