@extends('admin/master')
@section('content')
<div class="row m-auto pt-5 pb-5">
    <div class="col-md-6">
        <h4>Angel Shopping | <span class="text-success">Manage Sub Category</span>
        </h4>
    </div>
    <div class="col-md-6">
        <form class="form-inline" action="">
            <div class="input-group ml-auto">
                <a href="/excelsubcategory" class="btn btn-dark ml-auto mr-4">Excel Exports subcategory</a>
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
                <td>Sub Category Name</td>
                <td>Sub Category Description</td>
                <td>Category Name</td>
                <td style="width:140px;">Action</td>
            </tr>
            @foreach($ssc as $data)
                <tr>
                    <td>{{ $data->sc_id }}</td>
                    <td>{{ $data->sc_name }}</td>
                    <td>{{ $data->sc_desc }}</td>
                    @foreach($category as $categorys)
                        @if ($categorys->id == $data->c_id)
                            <td>{{ $categorys->category_name }}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="/edit_sub_category/{{$data->sc_id}}"> <i class="fa fa-edit"></i></a> | 
                        <a href="/delete_sub_category/{{$data->sc_id}}"> <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <a href="add_sub_category" class="btn btn-primary ml-auto mr-4">Add New Sub Category</a>
</div>
@endsection