@extends('admin/master')

@section('content')

            <div class="col-md-10">
                <div class="m-auto pt-5 pb-5" align="center">
                    <h4>Angel Shopping | <span class="text-success">Add Sub Category</span></h4>
                </div>
                <div class="row">
                    <div class="border col-md-8 m-auto">
                        <form action="{{route('admin/add_sub_category')}}" class="pt-4" method="post" name="frm">
                           {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="c_id" id="">
                                    <option>Select Sub Category</option>
                                    @foreach($datas as $data)
                                        <option class="form-control" value="{{ $data->id }}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Category</label>
                                <input class="form-control" name="sc_name" type="text" placeholder="Enter Sub Category Name" required>
                            </div>
                            <div class="form-group">
                                <label>Sub Category Description</label>
                                <input class="form-control" name="sc_desc" type="text" placeholder="Enter Sub Category Description" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Sub Category" name="addSubCategoryBtn" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection