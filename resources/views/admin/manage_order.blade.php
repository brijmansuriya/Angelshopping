@extends('admin/master')
@section('content')
<div class="row m-auto pt-5 pb-5">
    <div class="col-md-6">
        <h4>Angel Shopping | <span class="text-success">Manage Order</span>
        </h4>
    </div>
    <div class="col-md-6">
        <form class="form-inline" action="">
            <div class="input-group ml-auto">
                <a href="/excelorder" class="btn btn-dark ml-auto mr-4">Excel Export Orders</a>
                <input class="form-control" type="text" placeholder="Search">
                <div class="input-group-append">
                    <input class="input-group-btn btn btn-dark fa fa-search" type="submit">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table border">
            <tr class="text-dark bg-light">
                <td>Orderid</td>
                <td>Name</td>
                <td>Mobile</td>
                <td>Email</td>
                <td>State</td>
                <td>Total Payment</td>
                <td>Order Status</td>
                <td>Order Date</td>
                <td>Action</td>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{$order->orderid}}</td>
                    <td>{{$order->firstname}} {{$order->lastname}}</td>
                    <td>{{$order->mobile_no}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->state}}</td>
                    <td>{{$order->ordertotalprice}}</td>
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
                    <td>{{$order->order_date}}</td>
                    <td>
                        <a href="/changeorderinfo/{{$order->orderid}}"><i  class="btn btn-info">Confirm</i></a>
                        {{-- <a href="/delete_order/{{$order->orderid}}"><i class="fa fa-trash"></i></a> --}}
                    </td>
                   
                </tr>
            @endforeach
        </table>
     
        {{ $orders->links() }}
       
    </div>
@endsection