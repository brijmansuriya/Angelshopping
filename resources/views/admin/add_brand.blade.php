@extends('admin/master')
@section('content')
<div class="container-fluid">
    <div class="row pt-5">
        <div class="m-auto p-0 card col-md-8 col-12">
        {{-- <div class="m-auto p-0 card col-md-8 col-12"> --}}
            <div class="card-header badge-light">
                <h4>Angel Shopping | <span class="text-success">Add Brand</span></h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin/add_brand')}}" class="pt-4" method="post" name="frm">
               @csrf
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input class="form-control" name="brand_name" type="text" placeholder="Enter Brand Name" required>
                    </div>
                    <div class="form-group">
                        <label>Brand Description</label>
                        <textarea class="form-control" name="brand_desc" cols="30" rows="4" placeholder="Enter Brand Description" required ></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Brand" name="addBrandBtn" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection