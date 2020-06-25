{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')

    @if($komponen=="mykegiatan")
        <livewire:mykegiatan/>


        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modalInput" tabindex="-1" role="dialog" aria-labelledby="modalInputLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Add data</h5>
              </div>
              <livewire:mykegiataninput/>
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