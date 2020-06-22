{{--  @extends('layouts.app')  --}}
@extends('layouts-auth.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body overflow-auto">





                      <form action="{{ route('posthtml') }}" method="POST"  enctype="multipart/form-data">
                          @csrf
                        <div class="text-center row">
                            <div class="col-md-8">
                                <div class="file-upload">
                                    {{--  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>  --}}

                                    <div class="image-upload-wrap">
                                      <input name="inihtml" class="file-upload-input" type='file' onchange="readURL(this);" accept="text/html" />
                                      <div class="drag-text" >
                                        <h3 class="p-3">Drag and drop file atau tekan untuk membuka file</h3>
                                      </div>
                                    </div>
                                    <div class="file-upload-content">
                                      <img class="file-upload-image" src="#" alt="your image" />
                                      <h6><span class="image-title">Uploaded Image</span></h6>
                                      <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Kosongkan</button>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-4 mt-4 mt-md-0 no-gutters">
                                <button type="submit" class="btn btn-block btn-primary h-100"><i class="fas fa-file-import fa-lg"></i> Import</button>
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

        {{--  <div class="col-md-12 mt-3">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse " id="collapseCardExample" style="">
                  <div class="card-body">
                    This is a collapsable card example using Bootstraps built in collapse functionality. <strong>Click on the card header</strong> to see the card body collapse and expand!
                  </div>
                </div>
            </div>
        </div>  --}}


    </div>
@endsection


@section('style-halaman')
    <style>
        .file-upload {
            background-color: #ffffff;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
          }

          .file-upload-btn {
            width: 100%;
            margin: 0;
            color: #fff;
            background: #1FB264;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #15824B;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
          }

          .file-upload-btn:hover {
            background: #1AA059;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
          }

          .file-upload-btn:active {
            border: 0;
            transition: all .2s ease;
          }

          .file-upload-content {
            display: none;
            text-align: center;
          }

          .file-upload-input {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
            cursor: pointer;
          }

          .image-upload-wrap {
            margin-top: 20px;
            border: 4px dashed #1FB264;
            position: relative;
          }

          .image-dropping,
          .image-upload-wrap:hover {
            background-color: #1FB264;
            border: 4px dashed #ffffff;
          }

          .image-title-wrap {
            padding: 0 15px 15px 15px;
            color: #222;
          }

          .drag-text {
            text-align: center;
          }

          .drag-text h3 {
            font-weight: 100;
            text-transform: uppercase;
            color: #15824B;
            padding: 60px 0;
          }

          .file-upload-image {
            max-height: 200px;
            max-width: 200px;
            margin: auto;
            padding: 20px;
          }

          .remove-image {
            width: 200px;
            margin: 0;
            color: #fff;
            background: #cd4535;
            border: none;
            padding: 10px;
            border-radius: 4px;
            border-bottom: 4px solid #b02818;
            transition: all .2s ease;
            outline: none;
            text-transform: uppercase;
            font-weight: 700;
          }

          .remove-image:hover {
            background: #c13b2a;
            color: #ffffff;
            transition: all .2s ease;
            cursor: pointer;
          }

          .remove-image:active {
            border: 0;
            transition: all .2s ease;
          }
    </style>
@endsection


@section('script-halaman')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

              var reader = new FileReader();

              reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', '{{ asset("ilustrasi/quality_check.svg") }}');//e.target.result
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
              };

              reader.readAsDataURL(input.files[0]);

            } else {
              removeUpload();
            }
          }

          function removeUpload() {
            $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.file-upload-content').hide();
            $('.image-upload-wrap').show();
          }
          $('.image-upload-wrap').bind('dragover', function () {
                  $('.image-upload-wrap').addClass('image-dropping');
              });
              $('.image-upload-wrap').bind('dragleave', function () {
                  $('.image-upload-wrap').removeClass('image-dropping');
          });
    </script>
@endsection