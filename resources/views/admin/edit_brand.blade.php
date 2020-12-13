@extends('admin/master')

@section('content')



        <div class="col-md-10">
            <div class="m-auto pt-5 pb-5">
                <h4>Angel Shopping | <span class="text-success">Edit Brand</span></h4>
            </div>
            
            @if(Session::has('message'))       
                    <div class="alert alert-info" align="center">        
                        {{Session::get('message')}}
                    </div>     
            @endif
            
            <div class="row">
                <div class="border col-md-10 m-auto">
                    <form action="/update_brand" class="pt-4" method="POST" name="frm">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="hidden" name="id" value="{{$edit_brand->id}}">
                            <input class="form-control" name="brand_name" value="{{ $edit_brand->brand_name }}" type="text" placeholder="Enter Brand Name" required>
                        </div>
                        <div class="form-group">
                            <label>Brand Description</label>
                            <input class="form-control" name="brand_desc" value="{{ $edit_brand->brand_desc }}" type="text" placeholder="Enter Brand Description" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Brand" name="addBrandBtn" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection