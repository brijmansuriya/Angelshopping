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
		{{Session::get('message')}}
	</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
<div class="container">
			<div class="row my-5 p-3 border">
				<div class="col-md-12">
					<h2 class="text-center">CONTACT US</h2>
				</div>
				<div class="col-md-8 mx-auto">
					<form action="contactus" method="post" class="form-group">
					{{ csrf_field() }}
				  
 						<div class="row">
							<div class="col-md-4">
								<label for="">Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="c_name">
							</div>
							<div class="col-md-4">
								<label for="">Email<span class="text-danger">*</span></label>
								<input type="email" class="form-control" name="c_email">
							</div>
							<div class="col-md-4">
								<label for="">Mobile No<span class="text-danger">*</span></label>
								<input type="number" class="form-control" name="c_mobileno">
							</div>
							<div class="col-md-12">
								<label for="">Message<span class="text-danger">*</span></label>
								<textarea name="c_message" class="form-control" cols="30" rows="5"></textarea>
							</div>
							<div class="col-md-12 mt-3 text-center">
								<input type="submit" class="btn btn-primary" value="SEND FORM">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection