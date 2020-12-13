@extends('layout')
@section('content')
<div class="container">
			<div class="row py-5">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">Order History</h5>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Name</th>
                                        <th>Mo</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Total Price</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->orderid}}</td>
                                        <td>{{$order->firstname}} {{$order->lastname}}</td>
                                        <td>{{$order->mobile_no}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->house_no}},{{$order->street}} street ,<br>{{$order->city}}-{{$order->pincode}}<br>{{$order->district}},{{$order->state}}</td>
                                        <td>{{$order->ordertotalprice}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>
                                            @if($order->orderstatus == '0')
                                                 <span>Confirm</span>
                                            @elseif($order->orderstatus == '1')
                                                <span>Packing</span>
                                            @elseif ($order->orderstatus == '2')
                                                <span>Shipping</span>
                                            @elseif($order->orderstatus == '3')
                                                <span>Received</span>
                                            @else:
                                                <span>Cancle</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="pdf" method="POST">
                                                @csrf
                                                <input type="hidden" name="orderid" value="{{$order->orderid}}">
                                                <input type="submit" class="btn btn-info" name="pdfgenerate" value="Download">
                                            </form>
                                        </td>
                        
                                    </tr>
                                   
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>

@endsection