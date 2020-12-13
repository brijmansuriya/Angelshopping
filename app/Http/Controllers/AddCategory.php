<?php

namespace App\Http\Controllers;
use App\Add_Category;
use App\Add_Sub_Category;
use Session;
use Illuminate\Http\Request;

class AddCategory extends Controller
{
    public function add_category(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $request->validate([
                'category_name' => 'required',
                'category_desc' => 'required',
            ]);

            if(Add_Category::where('category_name',$request->category_name)->first())
            {
                return redirect('admin/manage_category')->with('error', 'Please Insert Unique Category!');
            }
            else
            {
                $add_category = new Add_Category();
                $add_category->category_name = $request->category_name;
                $add_category->category_desc = $request->category_desc;
                $add_category->save();
                return redirect('admin/manage_category')->with('message', 'Category Added Successfully!');
            }
        }
        return redirect('admin/index');
    }
    public function show_category()
    {  
        if(Session::has('adminemail'))
        {
            $show_category=Add_Category::paginate(5);
            return view('admin.manage_category',['show_category'=>$show_category]);    
        }
        return redirect('admin/index');
    }
    public function edit_category($id)
    {
        if(Session::has('adminemail'))
        {
            $edit_category= add_category::where('id',$id)->first();
            return view('admin.edit_category',['edit_category'=>$edit_category]);
        }
        return redirect('admin/index');
    }
    public function update_category(Request $request)
    {
        if(Session::has('adminemail'))
        {
            $update_category = Add_Category::where('id',$request->id)->first();
            $update_category->category_name = $request->category_name;
            $update_category->category_desc = $request->category_desc;
            $update_category->save();
            return redirect('admin/manage_category')->with('message', 'Category Updated Successfully!');
        }
        return redirect('admin/index');
    }
    public function delete_category($id)
    {
        if(Session::has('adminemail'))
        {
            Add_Sub_Category::where('c_id',$id)->delete();
            $delete_category = Add_Category::where('id',$id)->first();
            $delete_category->delete();
            return redirect('admin/manage_category')->with('message', 'Category Deleted Successfully!');
        }
        return redirect('admin/index');
    }
}
