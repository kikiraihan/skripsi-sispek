{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')


    @if($komponen=="mykegiatan")
        <livewire:mykegiatan/>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-md" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
              <livewire:mykegiataninput/>
            </div>
          </div>
        </div>


    @elseif($komponen=="myormawa")
    <livewire:myormawa/>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-md" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <livewire:myormawainput/>
        </div>
      </div>
    </div>


    @elseif($komponen=="myprestasi")
    <livewire:myprestasi/>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-md" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <livewire:myprestasiinput/>
        </div>
      </div>
    </div>

    @elseif($komponen=="myorangtua")
    <livewire:myorangtua/>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <livewire:myorangtuainput/>
        </div>
      </div>
    </div>

    @elseif($komponen=="mysaudara")
    <livewire:mysaudara/>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-md" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
          <livewire:mysaudarainput/>
        </div>
      </div>
    </div>

    @elseif($komponen=="masterkriteria")
    <livewire:rekomendasi.masterkriteria/>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <livewire:rekomendasi.masterkriteriainput/>
        </div>
      </div>
    </div>






    @elseif($komponen=="masterAdminDosen")
    <livewire:master.admindosen/>

    <!-- Modal -->
    {{-- ada pake ignore self --}}
    <livewire:master.admindoseninput/>

    
    
    @elseif($komponen=="masterMatakuliah")
    <livewire:master.mastermatakuliah/>
    






    @elseif($komponen=="mahasiswaPA")
    <livewire:mahasiswa.mahasiswapa/>


    @elseif($komponen=="mahasiswaall")
    <livewire:mahasiswa.all/>









    @endif


@endsection



@section('style-halaman')
    @livewireStyles
@endsection


@section('script-halaman')

    @livewireScripts



    {{-- jalankan sweetalert setelah mentriger event livewire --}}
    {{-- kenpa disini? karena harus setelah meload livewirescript --}}
    <script>
      window.livewire.on('swalAdded', counter => {
        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            icon: 'success',
            title: 'Berhasil' ,
            text: 'berhasil menambahkan '+counter+' data!',
        });
        $('#modalInput').modal('hide');
      })

      window.livewire.on('swalUpdated', () => {
        Swal.fire({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000,
          //timerProgressBar: true,
          onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          },
            icon: 'success',
            title: 'Berhasil' ,
            text: 'data telah diubah!',
            confirmButtonText: 'Oke',
        });
        $('#modalInput').modal('hide');
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



      window.livewire.on('tutupModal', () =>
      {
        $('#modalInput').modal('hide');
      })


      window.livewire.on('swalAndaYakin', (tujuan,idModel,pesan) => {
        Swal.fire({
          title: 'Anda yakin?',
          text: pesan,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya!'
        }).then((result) => {
          if (result.value) {

            window.livewire.emit(tujuan,idModel);

            Swal.fire(
              'Berhasil!',
              'data telah diupdate.',
              'success'
            )

          }
        });
      })


    </script>


@endsection