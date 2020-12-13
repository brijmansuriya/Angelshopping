@extends('admin/master')
@section('content')
<div class="row m-auto pt-5 pb-5">
    <div class="col-md-6">
        <h4>Angel Shopping | <span class="text-success">Manage Users</span></h4>
    </div>
    <div class="col-md-6">
        <form class="form-inline" action="">
            <div class="input-group ml-auto">
                <a href="/exceluser" class="btn btn-dark ml-auto mr-4">Export User</a>
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
                <td>First Name</td>
                <td>Last Name</td>
                <td>Gender</td>
                <td>Mobile No</td>
                <td>Email</td>
               <td>Action</td>
            </tr>
            @foreach($show_users as $show_user)     
            <tr>
                <td>{{$show_user->user_id}}</td>
                <td>{{$show_user->firstname}}</td>
                <td>{{$show_user->lastname}}</td>
               <td>
                    @if($show_user->gender == 0)
                        male
                    @elseif($show_user->gender == 1)
                        female
                    @endif
                </td>
                <td>{{$show_user->mobileno}}</td>
                <td>{{$show_user->email}}</td>
                {{-- <td><img class="rounded-circle border border-1" src="{{ asset('uploads/users/'. $show_user->image) }}" width="50px" height="50px" alt="image"></td> --}}
                <td>
                    <a href="/delete_user/{{$show_user->user_id}}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
     {{$show_users->links()}}
    </div>
</div>
@endsection