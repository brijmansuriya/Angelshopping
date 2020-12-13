@extends('layout')
@section('content')
<div class="container" id="">
    @if ($order_id)
    <h4 class="py-3">AngelShopping | <span class="text-success"> Order Success</span></h4>
			<div class="row my-5">
                <div class="col-md-12">
                    <p>Your Order Success Fully.</p>
                    <p>Your Id Order Is This Number : <b>{{$order_id}}</b></p>
                    {{-- <p>Your Order Payment Report : <a class="btn btn-sm btn-success" href="/pdf">Click here</a></p> --}}
                </div>
            </div>
            @endif
		</div>
@endsection