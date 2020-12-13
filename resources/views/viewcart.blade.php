@extends('layout')
@section('content')
<div class="container" id="">
    @if ($itemArr)
    <div class="row">
        <table class="table table-hover">
            <thead>
                <table class="table border">
                    <tr class="text-dark bg-light">
                        <td>Name</td>
                        <td>Item Price</td>
                        <td>Item Price With Offere Price</td>
                        <td class="text-center">Qty</td>
                        <td style="width:10px;">Action</td>
                    </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($itemArr); $i++)
                    @foreach ($products as $product)
                        @if ($product->p_id == $itemArr[$i])
                            <tr class="text-dark bg-light text-capitalize">
                                <td> {{$product->p_name}} </td>
                                <td>&#x20B9; {{$product->p_listprice}}</td>
                                <td>
                                    {{round($product->p_listprice-($product->p_listprice * $product->p_op / 100), 0) * $qtyArr[array_search($itemArr[$i],$itemArr)]}}
                                </td>
                                <td>
                                    @if ($product->p_id)
                                    <div class="row">
                                        <div class="col-md-5 text-right">
                                            <form action="/pluscartitem" method="POST">
                                                @csrf
                                                <input type="number" hidden name="pid" value="{{$product->p_id}}">
                                                <input type="text" hidden name="currentUrl" value="{{Request::url()}}">
                                                <input type="submit" name="plus" class="btn btn-info btn-sm" value="+">
                                            </form>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            {{$qtyArr[array_search($itemArr[$i],$itemArr)]}}
                                        </div>
                                        <div class="col-md-5">
                                            <form action="/minushcartitem" method="POST">
                                                @csrf
                                                <input type="number" hidden name="pid" value="{{$product->p_id}}">
                                                <input type="text" hidden name="currentUrl" value="{{Request::url()}}">
                                                <input type="submit" name="minus" class="btn btn-danger btn-sm" value="-">
                                            </form>
                                        </div>
                                    </div>
                                    @else
                                    <form action="/addtocart" method="POST">
                                        @csrf
                                        <input type="number" hidden name="pid" value="{{$product->p_id}}">
                                        <input type="text" hidden name="currentUrl" value="{{Request::url()}}">
                                        <input type="submit" name="submit" class="btn btn-info btn-sm btn-block"
                                            value="Add To Cart">
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <form action="/removecart" method="POST">
                                        @csrf
                                        <input type="number" hidden name="pid" value="{{$product->p_id}}">
                                        <input type="text" hidden name="currentUrl" value="{{Request::url()}}">
                                        <input type="submit" name="submit" class="btn btn-danger btn-sm ml-auto"
                                            value="Remove Cart">
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endfor
            </tbody>
        </table>
    </div>
    <form action="checkout" method="POST">
        @csrf
        <input type="submit" name="submit" class="btn btn-primary ml-auto" value="Buy Now">
    </form>
    @else
    <p>Your Cart Have Been Empty Please Add Item Your Cart</p>
    @endif
</div>
@endsection