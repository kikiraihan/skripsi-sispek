<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Roboto:100,300,400,500,700,900" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets_landing/bootstrap/css/bootstrap.min.css') }}">
<div class="container">
    <div class="text-center ">
        <br><br><br>
        <img class="p-0 m-0" src="{{ asset('assets_landing/img/forbidden.svg') }}" width="250e">
        <h3 class="text-danger">- 403 -</h3>
        <p class="info">{{ $exception->getMessage() }}</p>
        <hr width="200e">
        <a href="{{ url('/') }}" class="btn btn-secondary btn-sm" >Back to front page</a>
    </div>
</div>

<h2></h2>