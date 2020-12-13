@extends('layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	<ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif
@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
<div class="container" id="">
	<div class="row py-5 my-5">
		<div class="col-md-6 mb-2 mx-auto border border-1 pt-2">
			<h2>Welcome To <span class="text-success">Login</span></h2>
			<form action="{{ action('LoginController@store') }}" method="post">
				@csrf
				<div class="row form-group">
					<div class="col-md-12">
						<label for="">Email<span class="text-danger">*</span></label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="col-md-12">
						<label for="">Password<span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="col-md-12 pt-3">
						<input type="submit" class="btn btn-primary" name="Login" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection