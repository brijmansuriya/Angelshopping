@extends('admin/master')
@section('content')
<div class="row m-auto pt-5 pb-5">
    <div class="col-md-6">
        <h4>Angel Shopping | <span class="text-success">Manage Products</span>
        </h4>
    </div>
    <div class="col-md-6">
        <form class="form-inline" action="/admin/searchproduct" method="post">
            {{ csrf_field() }}
            <div class="input-group ml-auto">
                <a href="/excelproduct" class="btn btn-dark ml-auto mr-4">Excel Exports Product</a>
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
                <td>No</td>
                <td>Product</td>
                <td>Description</td>
                <td>Price</td>
                {{-- <td>Brand</td> --}}
                {{-- <td>Category</td> --}}
                {{-- <td>Sub Category</td> --}}
                <td>Suggested</td>
                <td>Total Item</td>
                <td>Action</td>
            </tr>
            @foreach ($show_products as $show_product)
            <tr>
                <td>{{$show_product->p_id}}</td>
                <td>{{$show_product->p_name}}</td>
                <td>{{$show_product->p_desc}}</td>
                <td>{{$show_product->p_listprice}}</td>
                {{-- <td>{{$show_product->brand_id}}</td> --}}
                {{-- <td>{{$show_product->category_id}}</td> --}}
                {{-- <td>{{$show_product->subcategory_id}}</td> --}}
                <td>{{$show_product->p_suggesion}}</td>
                <td>{{$show_product->p_qty}}</td>
                <td>
                    <a href="/edit_product/{{$show_product->p_id}}"> <i class="fa fa-edit"></i></a> |
                    {{-- <a href="/delete_product/{{$show_product->id}}"> <i class="fa fa-trash"></i></a> --}}
                </td>
            </tr>
            @endforeach
        </table>
       {{$show_products->links()}}
    </div>
    <a href="add_product" class="btn btn-primary ml-auto mr-4">Add New Product</a>
</div>
@endsection