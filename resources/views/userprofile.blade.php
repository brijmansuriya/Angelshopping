@extends('layout')
@section('content')
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
@if($userdata)
<div class="container" id="">
	<div class="row my-5 border">
		<div class="col-md-3 border-right py-3">
			<div class="row">
				<div class="col-md-12">
					<img src="img/profiledemo.png" class="img-polaroid" width="250px">
				</div>
				<div class="col-md-12 pt-3">
					<p class="text-center text-capitalize">{{$userdata->firstname}} {{$userdata->lastname}}</p>
				</div>
				<div class="col-md-12 px-0">
					<hr>
					<a href="/cart" class="pl-3">Cart</a>
					<hr>
					<a href="/orderhistory" class="pl-3">Order History</a>
					<hr>
				</div>
			</div>
		</div>
		<div class="col-md-9 py-3">
			<h2>Personal Info</h2>
			<form action="/updatepersonalinfo" method="POST">
				@csrf
				<div class="row form-group">
					<div class="col-md-6">
						<label>First Name<span class="text-danger">*</span></label>
						<input type="text" class="form-control" value="{{$userdata->firstname}}" name="firstname">
					</div>
					<div class="col-md-6">
						<label>Last Name<span class="text-danger">*</span></label>
						<input type="text" class="form-control" value="{{$userdata->lastname}}" name="lastname">
					</div>
					<div class="col-md-6">
						<label>Mobile Number<span class="text-danger">*</span></label>
						<input type="text" class="form-control" value="{{$userdata->mobileno}}" name="mobileno">
					</div>
					<div class="col-md-6">
						<label>Email<span class="text-danger">*</span></label>
						<input type="text" disabled class="form-control" value="{{$userdata->email}}" name="email">
					</div>
					<div class="col-md-12">
						<label>Gender<span class="text-danger">*</span></label><br/>
						@if($userdata->gender =='0' )
						<div class="form-check-inline">
							<label class="form-check-label">
							<input type="radio" class="form-check-input form-check-input" checked value="0"  name="gender" />Male</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="1" name="gender" />Female</label>
						</div>
						@endif
						@if($userdata->gender == '1')
						<div class="form-check-inline">
							<label class="form-check-label">
							<input type="radio" class="form-check-input form-check-input"  value="0"  name="gender" />Male</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label class="form-check-label">
							<input type="radio" class="form-check-input" checked value="1" name="gender" />Female</label>
						</div>
						@endif
					</div>
					{{-- <div class="col-md-6">
						<label>File<span class="text-danger">*</span></label>
						<input type="file" class="form-control" name="image">
					</div>
					 --}}
					 <div class="col-md-6 pt-3">
						<input type="submit" class="btn btn-primary" name="signup" value="Update">
					</div>
				</div>
			</form>
			<hr>
			<h2>Change Password</h2>
			<form action="/changepassword" method="POST">
				@csrf
				<div class="row form-group">
					<div class="col-md-6">
						<label>Old Password<span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="oldpassword">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label>New Password<span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="newpassword">
					</div>
					<div class="col-md-6">
						<label>Confirm Password<span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="conformnewpassword">
					</div>
					<div class="col-md-6 pt-3">
						<input type="submit" class="btn btn-primary" name="signup" value="Change">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endif
@endsection