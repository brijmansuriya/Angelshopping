@extends('admin/master')
@section('content')    

            <div class="col-md-10">
                <div class="m-auto pt-5 pb-5" align="center">
                    <h4>Angel Shopping | <span class="text-success">Add Category</span></h4>
                </div>

                {{-- @if(Session::has('message'))       
                        <div class="alert alert-info" align="center">        
                            {{Session::get('message')}}
                        </div>     
                @endif --}}

                <div class="row">
                    <div class="border col-md-8 m-auto">
                        <form action="{{route('admin/add_category')}}" class="pt-4" method="post" name="frm">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="category_name" type="text" placeholder="Enter Category Name" required>
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <input class="form-control" name="category_desc" type="text" placeholder="Enter Category Description" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Category" name="addCategoryBtn" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        
    @endsection