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
    @endif


@endsection



@section('style-halaman')
    @livewireStyles
@endsection


@section('script-halaman')

    @livewireScripts
@endsection