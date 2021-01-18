@if($errors->any())
  <div class="content text-center">
    @foreach($errors->all() as $error)
      <p class="alert alert-danger text-center" style="color: white; font-weight:bold"> {{$error}} </p>
    @endforeach
  </div>
@endif