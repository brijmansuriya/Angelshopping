<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Angel Shopping</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg" style="background-color:black;">
			{{-- <img src="img/logo.jpg" width="3%"> --}}
			<a class="navbar-brand text-white" href="/">Angel Shopping</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
				@if (Session::has('email'))
				{{-- @if (Session::has('user_id')) --}}
				<li class="nav-item">
					<a class="nav-link text-light" href="/cart">Cart</a>
					
				</li>
				<li class="nav-item">
						<a class="nav-link text-light" href="/logout">Logout</a>
						
					</li>
				
				@else
				<li class="nav-item">
						<a class="nav-link text-light" href="signup">Sign-Up</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="login">Login</a>
					</li>
				@endif
				</ul>
				<form class="form-inline my-2">
					<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
		<div id="container">
			<div class="nav">
				 <ul class="ml-auto">
					<li><a href="/"><i class="icon-home"></i>Home</a></li>
					<li><a href="/aboutus"><i class="icon-bookmark"></i>About Us</a></li>
					<li><a href="/contactus"><i class="icon-inbox"></i>Contact Us</a></li>
					<li><a href="/userprofile"><i class="icon-user"></i>Profile</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			@section('content')
			@show
		</div>
        <div class="footer">
            <div class="bg-dark text-white py-2 text-center">
                <label style="font-size:17px;"> Copyright &copy; </label>
                <span style="font-size:17px;">Angel Shopping</a></span>
            </div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>