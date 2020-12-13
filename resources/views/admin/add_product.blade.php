@extends('admin/master')
@section('content')
    <div class="container-fluid">
        <div class="row py-5">
            <div class="m-auto p-0 card col-md-10 col-12">
                <div class="card-header badge-light">
                    <h4>Angel Shopping | <span class="text-success">Add New Product</span></h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin/add_product')}}" class="pt-4" method="POST" name="frm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Product Name<span class="text-danger">*</span></label>
                                <input class="form-control" name="productName" type="text" placeholder="Ex: MI Note 6 Black" required autofocus/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Quantity<span class="text-danger">*</span></label>
                                <input class="form-control" name="productQty" type="text" placeholder="Ex: 50" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Product List Price<span class="text-danger">*</span></label>
                                <input class="form-control" name="productPrice" type="text" placeholder="Ex: 11999" required />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Product Offer Persentage<span class="text-danger">*</span></label>
                                <input class="form-control" name="productOfferPr" type="text" placeholder="Ex: 2(Persentage)" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Product Brand<span class="text-danger">*</span></label>
                                <select class="form-control" id="brand" name="productBrand">
                                    <option>Select Here</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Product Category<span class="text-danger">*</span></label>
                                <select class="form-control" name="productCategory" id="category">
                                    <option>Select Here</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Product Sub Category<span class="text-danger">*</span></label>
                                <select class="form-control" name="productSubCategory" id="subCategory">
                                    <option>Select Here</option>
                                    @foreach ($subCategorys as $subCategory)
                                        <option id="{{$subCategory->c_id}}" value="{{$subCategory->sc_id}}">{{$subCategory->sc_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Suggested People</label>
                                <select class="form-control" name="productSuggestedPeople" id="suggestedPeople">
                                    <option value="All">All</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Children">Children</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Guarantee Or Warranty<span class="text-danger">*</span></label>
                                <select class="form-control" name="productGW" id="gw" onchange="guaranteeWarrantyChangeDesc(this.value)">
                                    <option value="Not">Not One</option>
                                    <option value="Guarantee">Guarantee</option>
                                    <option value="Warranty">Warranty</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Guarantee Or Warranty Desc<span class="text-danger">*</span></label>
                                <input disabled class="form-control" name="productGWDesc" id="gwdesc" type="text" placeholder="Guarantee Or Warranty Desc" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>Product Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="productDesc" rows="4" placeholder="Product Description"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Product Image<span class="text-danger">*</span></span></label>
                                <label for="proimg1" class="btn btn-primary btn-block">Select Image</label>
                                <input hidden id="proimg1" name="productImg" type="file" oninput="imgText(this.value)" required>
                                <span id="imgText"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group ml-auto pr-3">
                                <input  type="submit" class="btn btn-danger" name="addNewProduct" value="Add Product 1">
                                {{-- <input  type="submit" class="btn btn-danger"  name="addNewProduct" value="Add Product"> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('jsscript')
<!-- Java Script Block -->
    <script>
        // category and subcategory dropdown bind code here
        $(document).ready(function(){
            var $category=$('#category'),$subCategory=$('#subCategory'),$options=$subCategory.find('option');
            $category.on('change',function(){
                $subCategory.html($options.filter('[id="'+this.value+'"]'));
            }).trigger('change');
        });
        // Product Guarantee Or Warranty disble true false here code
        function guaranteeWarrantyChangeDesc(gow)
        {
            if(gow == "Guarantee" || gow == "Warranty")
            { 
               document.getElementById('gwdesc').disabled = false;
            }
            else
            {
                document.getElementById('gwdesc').disabled = true;
                document.getElementById('gwdesc').value = "";
            }
        }
        //image name fetch here
        function imgText(imgUrl)
        {
            var startIndex = (imgUrl.indexOf('\\') >= 0 ? imgUrl.lastIndexOf('.') : imgUrl.lastIndexOf('.'));
            var filename = imgUrl.substring(startIndex);
            if(filename.substring(1) == 'jpeg' || filename.substring(1) == 'jpg' || filename.substring(1) == 'png')
            {
                var startIndex = (imgUrl.indexOf('\\') >= 0 ? imgUrl.lastIndexOf('\\') : imgUrl.lastIndexOf('/'));
                var filename = imgUrl.substring(startIndex);
                document.getElementById('imgText').innerHTML = filename.substring(1);
            }
            else
            {
                alert('File only jpeg, jpg or png format');
                document.getElementById('imgText').innerHTML = "";
                return false;
            }
        }
    </script> 
@endsection