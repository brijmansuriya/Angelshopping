@extends('layout')
@section('content')
<div class="container mb-5 pb-5">
	<div class="row border my-5 py-2">
		<div class="col-md-12">
			<div class="alert alert-info" role="alert">Order Only Cash On Delivery!</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<h5 class="card-header">Checkout Item</h5>
						<div class="card-body">
							<table class="table table-sm">
								<thead>
									<tr>
										<th>Item</th>
										<th width="10%">Qty</th>
										<th width="10%">Price</th>
									</tr>
								</thead>
								<tbody>
									@for ($i = 0; $i < count($itemArr); $i++)
										@foreach ($products as $product)
											@if ($itemArr[$i] == $product->p_id)
												<tr>
													<td>{{$product->p_name}}</td>
													<td><span class="badge badge-primary badge-pill">{{$qtyArr[$i]}}</span></td>
													<td>{{$product->p_listprice - ($product->p_listprice * $product->p_op)/100}}</td>
												</tr>
											@endif
										@endforeach
									@endfor
								</tbody>
								<tfoot>
									<tr>
										<th colspan="2">Total</th>
										<td width="10%">{{$totalPrice}}</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="card">
						<h5 class="card-header">Billing Address</h5>
						<div class="card-body">
							<form action="/order" method="POST">
								@csrf
								<div class="row">
									<input type="text" hidden name="totalprice" value="{{$totalPrice}}">
									<div class="col-md-6 mb-3">
										<label>First name</label>
										<input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required>
									</div>
									<div class="col-md-6 mb-3">
										<label>Last name</label>
										<input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 mb-3">
										<label>Mobile Number</label>
										<input type="number" class="form-control" name="mobileno" placeholder="Enter Mobile Number" required>
									</div>
									<div class="col-md-6 mb-3">
										<label>Email</label>
										<input type="email" class="form-control" name="email" placeholder="you@example.com">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 mb-3">
										<label>House No</label>
										<input type="text" class="form-control" name="houseno" placeholder="Enter House Number" required>
									</div>
									<div class="col-md-4 mb-3">
										<label>Street</label>
										<input type="text" class="form-control" name="street" placeholder="Enter Street Name">
									</div>
									<div class="col-md-4 mb-3">
										<label>City</label>
										<input type="text" class="form-control" name="city" placeholder="City or Village Name" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 mb-3">
										<label>District</label>
										<input type="text" class="form-control" name="district" placeholder="District Name" required>
									</div>
									<div class="col-md-4 mb-3">
										<label>State</label>
										<input type="text" class="form-control" name="state" placeholder="State Name" required>
									</div>
									<div class="col-md-4 mb-3">
										<label>Pincode</label>
										<input type="text" class="form-control" name="pincode" placeholder="Pincode" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-3">
										<input class="btn btn-primary" name="placeorder" value="Place Order" type="submit">
									</div>
								</div>
							</form>
							{{-- <form action="orderconform.html">
								@csrf
								<div class="row form-group">
									<div class="col-md-6">
										<label>First Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="firstname"
											placeholder="First Name">
									</div>
									<div class="col-md-6">
										<label>Last Name<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="lastname"
											placeholder="Last Name">
									</div>
									<div class="col-md-6">
										<label>Mobile Number<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="mobileno"
											placeholder="Mobile No">
									</div>
									<div class="col-md-6">
										<label>Email<span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="email" placeholder="Email">
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4 mb-3">
												<label>House No</label>
												<input type="text" class="form-control" name="houseno"
													placeholder="Enter House Number" required>
											</div>
											<div class="col-md-4 mb-3">
												<label>Street</label>
												<input type="text" class="form-control" name="street"
													placeholder="Enter Street Name">
											</div>
											<div class="col-md-4 mb-3">
												<label>City</label>
												<input type="text" class="form-control" name="city"
													placeholder="City or Village Name" required>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4 mb-3">
												<label>District</label>
												<input type="text" class="form-control" name="district"
													placeholder="District Name" required>
											</div>
											<div class="col-md-4 mb-3">
												<label>State</label>
												<input type="text" class="form-control" name="state"
													placeholder="State Name" required>
											</div>
											<div class="col-md-4 mb-3">
												<label>Pincode</label>
												<input type="text" class="form-control" name="pincode"
													placeholder="Pincode" required>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<input class="btn btn-danger" name="placeorder" value="Place Order"
											type="submit">
									</div>
								</div>
							</form> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<div class="row border my-5 py-2">
			<div class="col-md-12">
				<div class="alert alert-info" role="alert">Order Only Cash On Delivery!</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="card">
							<h5 class="card-header">Checkout Item</h5>
							<div class="card-body">
								@for ($i = 0; $i < count($itemArr); $i++)
								@foreach ($products as $product)
									@if ($itemArr[$i] == $product->p_id)
									<div class="card-body">
										<ul class="list-group">
											<li class="d-flex justify-content-between align-items-center">
												{{$product->p_name}}
												<span class="badge badge-primary badge-pill">
													{{$qtyArr[$i]}}
												</span>
											</li>
										</ul>
									</div>
									@endif
								@endforeach
							@endfor
							<div class="card-footer text-muted">
								<ul class="list-group">
									<li class="d-flex justify-content-between align-items-center">
										Total Pay <span>&#8377;
											<b>{{$totalPrice}}</b>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-8">
						<div class="card">
							<div class="card-header">
								<h4 class="text-danger">Billing address</h4>
							</div>
							<div class="card-body">
								
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection