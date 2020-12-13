@extends('layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif

<script>
	function funchk() {
		var a = document.getElementById("pass").value;
		var b = document.getElementById("cpass").value;
		if (a != b) {
			alert("Password and Confirm password are not same!!");
		}
	}
</script>
<div class="container">
	<div class="row pt-3">
		<div class="col-md-6 mx-auto border border-1 pt-2">
			<h2>Welcome To <span class="text-success">Sign Up</span></h2>
			<form action="{{ action('RegisterController@store') }}" method="post">
				{{ csrf_field() }}
				<div class="row form-group">
					<div class="col-md-12">
						<label for="">First Name<span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="firstname">
					</div>
					<div class="col-md-12">
						<label for="">Last Name<span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="lastname">
					</div>
					<div class="col-md-12 py-2">
						<label>Gender<span class="text-danger">*</span></label><br/>
						<div class="form-check-inline">
							<label class="form-check-label">
							<input type="radio" class="form-check-input form-check-input" checked value="0"  name="gender" />Male</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="1" name="gender" />Female</label>
						</div>
					</div>
					<div class="col-md-12">
						<label for="">Mobile Number<span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="mobileno">
					</div>
					<div class="col-md-12">
						<label for="">Email<span class="text-danger">*</span></label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="col-md-12">
						<label for="">Password<span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="col-md-12">
						<label for="">Confirm Password<span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="cmpassword">
					</div>
					<div class="col-md-12 pt-3">
						<input type="submit" class="btn btn-primary" name="signup" value="Sign Up">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
	crossorigin="anonymous"></script>