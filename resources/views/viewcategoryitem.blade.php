@extends('layout')
@section('content')
<div class="container pt-1">
    <div class="row">
        <div class="col-md-2">
            @foreach ($categories as $category)
                <form action="/viewcategoryitem">
                    <input type="text" hidden value="{{$category->id}}" name="cid">
                    <input type="submit" readonly class="form-control-plaintext bg-white" id="staticEmail" value="{{$category->category_name}}">
                </form><hr>
            @endforeach
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 border">
						<a href='viewitem/{{$product->p_id}}'>
							<img class='img-fluid' src='{{asset('products/'. $product->p_image)}}'">
						</a><br>
                        <span class=""><b>{{$product->p_name}}</b> | </span>
                        <span>&#x20B9;<strike>{{$product->p_listprice}}</strike></span> | </span>
                        <span>&#x20B9;
                            {{$product->p_listprice - ($product->p_listprice * $product->p_op)/100}}
                        </span><br>
                        <p class="card-text">{{$product->p_desc}}</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="/addtocart" method="POST">
                                @csrf
                                <input type="number" hidden name="pid" value="{{$product->p_id}}">
                                <input name="currentUrl" hidden type="text" value="{{Request::url()}}">
                                {{-- <p>{{Request::url()}}</p> --}}
                                <input type="submit" name="submit" class="btn btn-primary" value="Add To Cart">
                            </form>
                            <form action="/viewitem">
                                @csrf
                                <input type="number" hidden name="pid" value="{{$product->p_id}}">
                                <input type="submit" name="submit" class="btn btn-danger" value="View">
                            </form>
                        </div>
				    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection