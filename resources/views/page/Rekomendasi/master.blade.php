{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')



@if ($komponen=="masterpreferensi.index")
<livewire:rekomendasi.masterpreferensi/>


@elseif($komponen=="masterpreferensi.input")
<livewire:rekomendasi.masterpreferensiinput/>

@elseif($komponen=="rekomendasiotomatis.index")
<livewire:rekomendasi.rekomendasiotomatis/>

@endif






@endsection



@section('style-halaman')
    @livewireStyles
    <style>
        table tbody tr th{
            text-align: center;
            width: 1em;
        }
    </style>
@endsection


@section('script-halaman')
    @livewireScripts
    <script src="{{ asset('assets_kiki/form_kriteria.js') }}"></script>

    <script>

        window.livewire.on('swalInputMatriks', (baris,kolom,barisTitle,kolomTitle, valueSebelumnya) => {
          Swal.fire({
            title: ' <small class="mr-2">'+kolomTitle+' <br>(ke kiri)</small> <br>atau<br> <small class="ml-2">'+barisTitle+' <br>(ke kanan)</small>',
            icon: 'question',
            input: 'range',
            inputAttributes: {
                min: -9,
                max: 9,
                step: 1
            },
            inputValue: valueSebelumnya,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan'
          }).then((result) => {

            if(result.value)
            {
                if(result.value % 1 != 0)
                result.value=0;

                window.livewire.emit('setMatriksKriteria',baris,kolom,result.value);
            }

          });
        })




        window.livewire.on('swalAlertDanger', (title, pesan) => {
            Swal.fire({
                //toast: true,
                //position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                icon: 'error',
                title: title ,
                text: pesan,
            });
        })

        window.livewire.on('swalAlertSuccess', (title, pesan) => {
            Swal.fire({
                //toast: true,
                //position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                onOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                icon: 'success',
                title: title ,
                text: pesan,
            });
        })





        window.livewire.on('swalDeleted', (tujuan,idhapus) => {
            Swal.fire({
              title: 'Anda yakin?',
              text: "Anda akan menghapus data tersebut!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
              if (result.value) {

                window.livewire.emit(tujuan,idhapus);

                Swal.fire(
                  'Terhapus!',
                  'data telah dihapus.',
                  'success'
                )

              }
            });
          })


      </script>
@endsection















    {{-- <div class="card">
        <div class="card-header pl-3">New Criteria-Preference +</div>

        <div class="card-body">


            <form action="" method="post">
                <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <div class="ml-3 form-inline">
                        <input type="text" name="judul" placeholder="Judul kriteria" required="required"
                        class="form-control form-control-sm mr-1" autofocus>

                        <select id="n" name="n" class="custom-select custom-select-sm mr-1">
                            <option value="" selected="selected" disabled="disabled" hidden="hidden">Pilih jumlah kriteria</option>
                            <option value="2">2-Dua</option>
                            <option value="3">3-Tiga</option>
                            <option value="4">4-Empat</option>
                            <option value="5">5-Lima</option>
                            <option value="6">6-Enam</option>
                            <option value="7">7-Tujuh</option>
                            <option value="8">8-Delapan</option>
                            <option value="9">9-Sembilan</option>
                            <option value="10">10-Sepuluh</option>
                        </select>


                    </div>
                </div>
                <div id="inputKriteria" class="pl-0 col-md-6 pb-2"></div>
                <a href="#inputMatriks" onclick="btnProceed()" class="btn btn-secondary btn-sm">Proceed</a>
                <div id="inputMatriks" class="mt-3"></div>
                <div id="wadahMatriksNormalised" class="mt-3"></div>
            </form>


        </div>
    </div> --}}