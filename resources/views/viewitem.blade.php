@extends('layout')
@section('content')
<div class="container mb-5 pb-5" id="">
    <div class="row border my-5 py-5">
        @if ($product)
            <div class="col-md-4 pl-5">
                <img class='img-fluid' src='{{asset('products/'. $product->p_image)}}'">
            </div>
            <div class="col-md-8">
                <span class=""><b>{{$product->p_name}}</b></span><br>
                <span>Price : &#x20B9;<strike>{{$product->p_listprice}}</strike></span><br>
                <span>Off Price : &#x20B9;
                    {{$product->p_listprice - ($product->p_listprice * $product->p_op)/100}}
                </span><br>
                <span>You Save : &#x20B9;{{($product->p_listprice * $product->p_op)/100}}</span><br>
                <p class="card-text">{{$product->p_desc}}</p>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="/addtocart" method="POST">
                        @csrf
                        <input type="number" hidden name="pid" value="{{$product->p_id}}">
                        <input hidden name="currentUrl" type="text" value="{{Request::url()}}">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add To Cart">
                    </form>
                    <form action="/checkout" method="POST">
                        @csrf
                        <input type="number" hidden name="pid" value="{{$product->p_id}}">
                        <input type="submit" name="submit" class="btn btn-danger" value="Buy">
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection