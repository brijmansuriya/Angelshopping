<?php

namespace App\Http\Controllers;
use App\Add_Brand;
use App\Add_Product;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AddBrand extends Controller
{
    public function add_brand(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $request->validate([
                'brand_name' => 'required',
                'brand_desc' => 'required',
            ]);
            
            if(Add_Brand::where('brand_name',$request->brand_name)->first())
            {
                return redirect('admin/manage_brand')->with('error', 'Please Enter Unique Brand!');
            }
            else
            {
                $add_brand = new Add_Brand();
                $add_brand->brand_name = $request->brand_name;
                $add_brand->brand_desc = $request->brand_desc;
                $add_brand->save();
                return redirect('admin/manage_brand')->with('message', 'Brand Added Successfully!');
            }
        }
        return redirect('admin/index');
    }
    public function show_brand()
    {
        if(Session::has('adminemail'))
        {
            $show_brand=Add_Brand::paginate(5);
            return view('admin.manage_brand',['show_brand'=>$show_brand]);    
        }
        return redirect('admin/index');
    }
    public function edit_brand($id)
    {
        if(Session::has('adminemail'))
        {
            $edit_brand= add_brand::where('id',$id)->first();
            return view('admin.edit_brand',['edit_brand'=>$edit_brand]);
        }
        return redirect('admin/index');
    }
    public function update_brand(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $update_brand = Add_Brand::where('id',$request->id)->first();
            $update_brand->brand_name = $request->brand_name;
            $update_brand->brand_desc = $request->brand_desc;
            $update_brand->save();
            return redirect('admin/manage_brand')->with('message', 'Brand Updated Successfully!');
        }
        return redirect('admin/index');
    }
    public function delete_brand($id)
    {
        if(Session::has('adminemail'))
        {
            $delete_brand = Add_brand::where('id',$id)->first();
            $product = Add_Product::where('brand_id',$id)->first();
            if($product)
            {
                return redirect('admin/manage_brand')->with('error','Brand Is Used In Product!');
            }
            else
            {
                $delete_brand->delete();
                return redirect('admin/manage_brand')->with('message', 'Brand Deleted Successfully!');
            }
        
        }
        return redirect('admin/index');
    }
}
