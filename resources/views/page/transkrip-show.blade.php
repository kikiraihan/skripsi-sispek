{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')
    <div class="card shadow mb-3">
        <div class="card-header text-left bg-white border-0">
            <b class="text-primary">Data Akademik</b>
            {{--  <small class="float-right text-info">*tap untuk mengedit</small>  --}}
        </div>




        <div class="card-body row no-gutters align-items-center">


            <div class="col-lg-4 pt-2">

                <div class="card-body ">
                    <p class="card-text ">
                        <b class="text-primary small font-weight-bold">Nama :</b>
                        <span class="float-right text-capitalize font-weight-bold">{{ strtolower($mahasiswa->nama) }}</span>
                        <br>
                        <b class="text-primary small font-weight-bold">NIM :</b>
                        <span class="float-right ">{{ $mahasiswa->nim }}</span>
                        <br>
                        <b class="text-primary small font-weight-bold">Prodi :</b>
                        <span class="float-right ">{{ $mahasiswa->prodi }}</span>
                        <br>
                    </p>
                </div>


                <div class="card-body">
                    <div class="row align-items-center justify-content-center no-gutters ">
                        <div class="col-7">
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
                        <div class="col-5 small text-right">
                            <h5 class="text-primary font-weight-bold">Nilai</h5>



                            <span class="bg-primary text-white rounded py-1 px-2 font-weight-bold">IPK : {{ $mahasiswa->ipksekarang }}</span><br>
                            <br> SKS <br>
                            <span class="text-success">{{ $mahasiswa->skslulus }}</span> <span class="small">lulus / {{ $mahasiswa->sksall }}</span> <br>


                            <br> MK <br>
                            {{ $mahasiswa->mkkosong }} <span class="small">kosong ({{ $mahasiswa->sksall-$mahasiswa->skskecualiNULL }} sks)</span> <br>
                            @if ($mahasiswa->MkMengulang != 0)
                            <span class="badge badge-danger">{{ $mahasiswa->MkMengulang }}</span> <span class="small">tdk lulus ({{ $mahasiswa->skskecualiNULL-$mahasiswa->skslulus }} sks)</span>
                            @endif
                        </div>
                    </div>

                </div>


                {{--  <h4 class="small font-weight-bold">Perkuliahan <span class="float-right">{{ round(($mahasiswa->skslulus/144)*100,2) }}%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(($mahasiswa->skslulus/144)*100,2) }}%" aria-valuenow="{{ round(($mahasiswa->skslulus/144)*100,2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>  --}}

                <hr class="d-lg-none">

            </div>



            <div class="col-lg-7 offset-lg-1 p-2">
                <div class=" card border-0 shadow-sm ">

                    <div class="card-header text-center bg-white border-0">
                        <span class="font-weight-bold text-primary">IPK Sebelumnya</span>
                    </div>

                    {{--  <hr>  --}}
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myAreaChart" style="display: block; height: 320px; width: 387px;" width="774" height="640" class="chartjs-render-monitor"></canvas>
                    </div>

                </div>

            </div>


        </div>



        <hr>




        <div class="card border shadow-sm m-3">
            <h5 class="text-primary font-weight-bold p-3">Mata Kuliah</h5>

            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead class="text-capitalize">
                    <tr class="text-center">
                        <th>No</th>
                        <th class="text-left">Mata Kuliah</th>
                        <th class="d-none d-md-table-cell">Kode MK</th>
                        <th>SKS</th>
                        <th>Nilai</th>
                        <th class="d-none d-md-table-cell">Bobot</th>
                        <th class="d-none d-md-table-cell">Sks.Bobot</th>
                        <th class="d-none d-md-table-cell">Semester</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1; $sebelumnya=0@endphp
                    @foreach ($mahasiswa->matakuliah->sortBy('pivot.semester') as $mk)
                    @if ($sebelumnya!=$mk->pivot->semester)
                    <tr class="bg-gray-200">
                        <td class="font-weight-bold">Semester {{ $mk->pivot->semester }}</td>
                        <td></td><td></td>
                        <td></td>
                        <td></td><td></td>
                        <td></td><td></td>
                    </tr>
                    @endif

                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td class="text-left">{{ $mk->nama }}</td>
                        <td class="d-none d-md-table-cell">{{ $mk->kodemk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->pivot->nilai_mutu }}</td>
                        <td class="d-none d-md-table-cell">{{ $mk->pivot->angka_mutu }}</td>
                        <td class="d-none d-md-table-cell">{{ $mk->pivot->angka_mutu*$mk->sks }}</td>
                        <td class="d-none d-md-table-cell">{{ $mk->pivot->semester }}</td>
                    </tr>
                    @php $sebelumnya=$mk->pivot->semester; @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>




    </div>
@endsection




@section('style-halaman')

@endsection





@section('script-halaman')

<!-- Page level plugins -->
<script src="{{asset('assets_template/vendor/chart.js/Chart.min.js')}}"></script>




{{--  AREA CHART  --}}
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! $tgl_chart !!},
        datasets: [{
        label: "IPK ",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: {!! $ipk_chart !!},
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
        padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
        }
        },
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false,
            drawBorder: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
                return '~ ' + value;
            }
            },
            gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
            }
        }],
        },
        legend: {
        display: false
        },
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
            label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + tooltipItem.yLabel;
            }
        }
        }
    }
    });

</script>





{{--  PIE CHART  --}}
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
        data: [{{ $mahasiswa->nilaiA }}, {{ $mahasiswa->nilaiB }}, {{ $mahasiswa->nilaiC }}, {{ $mahasiswa->mkmengulang }}, {{ $mahasiswa->mkkosong }}],
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