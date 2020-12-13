@extends('admin/master')
@section('content')
        <div class="row m-auto pt-5 pb-5">
            <div class="col-md-6">
                <h4>Angel Shopping | <span class="text-success">Manage Brand</span>
                </h4>
            </div>
            <div class="col-md-6">
                <form class="form-inline" action="/admin/searchbrand" method="post">
                    {{ csrf_field() }}
                    <div class="input-group ml-auto">
                        
                        <a href="/excelbrand" class="btn btn-dark ml-auto mr-4">Excel Exports Brand</a>
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
                        <td style="width:200px;">Brand</td>
                        <td>Brand Description</td>
                        <td style="width:140px;">Action</td>
                    </tr>
                    @foreach($show_brand as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->brand_name }}</td>
                            <td>{{ $data->brand_desc }}</td>
                            <td>
                                <a href="/edit_brand/{{$data->id}}"> <i class="fa fa-edit"></i></a> | 
                                <a href="/delete_brand/{{$data->id}}"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $show_brand->links() }}
            </div>  
            <a href="add_brand" class="btn btn-primary ml-auto mr-4">Add New Brand</a>
        </div>
@endsection