@extends('admin/master')
@section('content')
<div class="row m-auto pt-5 pb-5">
    <div class="col-md-6">
        <h4>Angel Shopping | <span class="text-success">Manage Category</span>
        </h4>
    </div>
    <div class="col-md-6">
        <form class="form-inline" action="/admin/searchcategory" method="post">
            {{ csrf_field() }}
            <div class="input-group ml-auto">
                <a href="/excelcategory" class="btn btn-dark ml-auto mr-4">Excel Exports Category</a>
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
                <td style="width:200px;">Category</td>
                <td>Category Description</td>
                <td style="width:140px;">Action</td>
            </tr>
            @foreach($show_category as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->category_name}}</td>
                <td>{{$data->category_desc}}</td>
                <td>
                    <a href="/edit_category/{{$data->id}}"><i class="fa fa-edit"></i></a> | 
                    <a href="/delete_category/{{$data->id}}"> <i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $show_category->links() }}
    </div>
    <a href="add_category" class="btn btn-primary ml-auto mr-4">Add New Category</a>
</div>
@endsection