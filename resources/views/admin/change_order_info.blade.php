@extends('admin/master')
@section('content')
<div class="container-fluid">
    <div class="row py-5">
        <div class="m-auto p-0 card col-md-10 col-12">
            <div class="card-header badge-light">
                <h4>Angel Shopping| <span class="text-success">Change Order Status</span></h4>
            </div>
            <div class="card-body">
                {{-- @foreach ($order_master as $order) --}}
                @if ($order_master)
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-responsive text-capitalize">
                            <tr>
                                <td>order id</td><td>{{$order_master->orderid}}</td>
                            </tr>
                            <tr>
                                <td>customer name</td><td>{{$order_master->firstname}} {{$order_master->lastname}}</td>
                            </tr>
                            <tr>
                                <td>mobile number</td><td>{{$order_master->mobile_no}}</td>
                            </tr>
                            <tr>
                                <td>email address</td><td class="text-lowercase">{{$order_master->email}}</td>
                            </tr>
                            <tr>
                                <td>address</td><td>{{$order_master->house_no}},{{$order_master->street}} street, {{$order_master->city}}-{{$order_master->pincode}}</td>
                            </tr>
                            <tr>
                                <td>district</td><td>{{$order_master->district}}</td>
                            </tr>
                            <tr>
                                <td>state</td><td>{{$order_master->state}}</td>
                            </tr>
                            <tr>
                                <td>order date</td><td>{{$order_master->order_date}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td>Item Name</td>
                                <td>Item Qty</td>
                                <td>Price</td>
                            </tr>
                            @foreach ($order_detail as $orderdetail)
                                @foreach ($products as $product)
                                    @if ($product->p_id == $orderdetail->itemid)
                                        <tr>
                                            <td class="text-capitalize">{{$product->p_name}}</td>
                                            <td>{{$orderdetail->itemqtys}} x {{$orderdetail->itemprice}}</td>
                                            <td>{{$orderdetail->itemprice * $orderdetail->itemqtys}}</td>
                                        </tr>
                                    @endif    
                                @endforeach
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-capitalize"><b>Total Payment</b></td>
                                <td>&#x20B9;{{$order_master->ordertotalprice}}</td>
                            </tr>
                        </table>
                        <form action="/updateorder" method="POST">
                            @csrf
                            <input type="text" name="orderid" value="{{$order_master->orderid}}" hidden>
                            <label>Change Order Status</label>
                            <select class="form-control mb-3" name="orderStatus" id="suggestedPeople" required>
                                <option value="">Select One</option>
                                <option {{ ( "0" == $order_master->orderstatus) ? 'selected' : '' }} value="0">Confirm</option>
                                <option {{ ( "1" == $order_master->orderstatus) ? 'selected' : '' }} value="1">Packing</option>
                                <option {{ ( "2" == $order_master->orderstatus) ? 'selected' : '' }} value="2">Shipping</option>
                                <option {{ ( "3" == $order_master->orderstatus) ? 'selected' : '' }} value="3">Received</option>
                            </select>
                            <div class="form-group ml-auto pr-3">
                                <input class="btn btn-danger" name="updateorder" value="Update Order" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection