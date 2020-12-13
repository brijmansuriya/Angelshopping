<?php

namespace App\Http\Controllers;
use App\Add_Sub_Category;
use App\Add_Category;
use Session;
use Illuminate\Http\Request;

class AddSubCategory extends Controller
{
    public function category_drop(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $datas = Add_Category::select('id','category_name')->get();
            return view('admin.add_sub_category',['datas'=>$datas]);
        }
        return redirect('admin/index');
    }
    public function add_sub_category(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $request->validate([
                'sc_name' => 'required',
                'sc_desc' => 'required',
            ]);

            if(Add_Sub_Category::where('sc_name',$request->sc_name)->first() and Add_Sub_Category::where('c_id',$request->c_id)->first())
            {
                return redirect('admin/manage_sub_category')->with('error', 'Please Insert Unique Sub Category!');
            }
            else
            {
                $sub_category = new Add_Sub_category();
                $sub_category->sc_name = $request->sc_name;
                $sub_category->sc_desc = $request->sc_desc;
                $sub_category->c_id = $request->c_id;
                $sub_category->save();
            }
            return redirect('admin/manage_sub_category')->with('message', 'Sub Category Added Successfully!');
        }
        return redirect('admin/index');
    }
    public function showsubcategory()
    {
        if(Session::has('adminemail'))
        {
            $category = Add_Category::all();
            $ssc = Add_Sub_Category::all();
            return view('admin.manage_sub_category',compact('ssc','category'));    
        }
        return redirect('admin/index');
    }
    public function delete_sub_category($id)
    {
        if(Session::has('adminemail'))
        {
            $delete_sub_category = Add_Sub_Category::where('sc_id',$id)->first();
            $delete_sub_category->delete();
            return redirect('admin/manage_sub_category')->with('message', 'Sub Category Deleted Successfully!');
        }
        return redirect('admin/index');
    }
    public function edit_sub_category($id)
    {
        if(Session::has('adminemail'))
        {
            $edit_sub_category= Add_Sub_Category::where('sc_id',$id)->first();
            return view('admin.edit_sub_category',['edit_sub_category'=>$edit_sub_category]);
        }
        return redirect('admin/index');
    }
    public function update_sub_category(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $update_sub_category = Add_Sub_Category::where('sc_id',$request->id)->first();
            $update_sub_category->sc_name = $request->sc_name;
            $update_sub_category->sc_desc = $request->sc_desc;
            $update_sub_category->save();
            return redirect('admin/manage_sub_category')->with('message', 'Sub Category Updated Successfully!');
        }
        return redirect('admin/index');
    }   
}
