<div>







    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}



                <div class="card-body overflow-auto"
                        x-data="{ isUploading: false, progress: 0, isUploaded:false}"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false;isUploaded=true"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                 >






                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress" class="w-100"></progress>
                        </div>







                        <form wire:submit.prevent="posthtml">
                            @csrf

                            <div class="text-center row">
                                <div class="col-md-8">


                                    <div class="file-upload">
                                        {{--  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>  --}}


                                        <div wire:loading wire:target="transkrip">Uploading...</div>
                                        {{-- {{ $transkrip!=null?$transkrip->getFileName():'' }} --}}

                                        <div x-show="!isUploaded" class="image-upload-wrap">
                                            <input wire:model="transkrip" class="file-upload-input" type='file' accept="text/html" onchange="
                                            @this.set('namafile', this.files[0].name);
                                            "/>
                                            <div class="drag-text" >
                                                <h3 class="p-3">Drag and drop file html atau tekan untuk membuka file</h3>
                                            </div>
                                        </div>

                                        <div x-show="isUploaded">
                                            <img class="file-upload-image" src="{{ asset("ilustrasi/quality_check.svg") }}" alt="your image" />
                                            <h6><span class="image-title">{{ $namafile }} </span></h6>
                                            <div class="image-title-wrap">
                                                <button  x-on:click="isUploaded = false;isUploading= false; progress= 0;" wire:click="removeUpload()"  type="button" class="remove-image">Kosongkan</button>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-4 mt-4 mt-md-0 no-gutters">

                                    <button type="submit" class="btn btn-block btn-primary h-100" wire:loading.attr="disabled" wire:target="posthtml">
                                        <div wire:loading.remove wire:target="posthtml">
                                            <i class="fas fa-file-import fa-lg"></i> Import
                                        </div>
                                        <div wire:loading wire:target="posthtml" >
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            Mengimport.. ini membutuhkan waktu sedikit lama
                                        </div>
                                    </button>


                                </div>
                            </div>
                        </form>












                </div>

                @if(Session::has('pesan'))
                <div class="card-footer alert-success small">
                    @if (Session::get('pesan')==[])
                    Data sudah update
                    @else
                    @foreach (Session::get('pesan') as $pesan)
                    {{ $pesan }} <br>
                    @endforeach
                    @endif
                </div>
                @endif

            </div>


        </div>








    </div>
















</div>
