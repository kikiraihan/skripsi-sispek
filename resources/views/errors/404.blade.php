<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>404</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets_landing/bootstrap/css/bootstrap.min.css') }}">




</head>

<body>

	<div class="container col-lg-3 ">
    <div class="text-center ">
        <br><br><br>
        <img class="p-0 m-0 w-100" src="{{ asset('ilustrasi/404_page_not_found_.svg') }}">
        <br><br>
        <h3 class="text-warning ">- 404 -</h3>
        <p class="info ">Oops! Halaman tidak ditemukan</p>
        <hr width="200e">
        <a href="#"
        onclick="event.preventDefault();  history.go(-1);"
        class="btn btn-lg btn-outline-primary w-100" >
        Kembali
        </a>
    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>