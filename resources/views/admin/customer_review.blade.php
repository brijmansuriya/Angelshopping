@extends('admin/master')
@section('content')
<div class="row m-auto pt-5 pb-5">
    <div class="col-md-6">
        <h4>Angel Shopping | <span class="text-success"> Customer Review</span></h4>
    </div>
    <div class="col-md-6">
        <form class="form-inline" action="">
            <div class="input-group ml-auto">
                <a href="/excelcontact" class="btn btn-dark ml-auto mr-4">Excel Exports Customer Reply</a>
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
                <td>Name</td>
                <td>Email</td>
                <td>Mobile No</td>                
                <td>Message</td>
                <td>Action</td>
            </tr>
            @foreach ($show_messages as $data)                                
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->mobileno}}</td>
                <td>{{$data->message}}</td>
                <td>
                    {{-- <a href="/admin/c_reply/{{$data->id}}">Reply</a> |  --}}
                    <a href="/delete_messages/{{$data->id}}"> <i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $show_messages->links() }}
    </div>
</div>
@endsection