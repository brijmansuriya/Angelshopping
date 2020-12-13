<?php

namespace App\Http\Controllers;
use App\Add_Brand;
use App\Add_Category;
use App\Add_Sub_Category;
use App\Add_Product;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AddProduct extends Controller
{
    public function addProduct(Request $request)
    {
        $brands = Add_Brand::all();
        $categorys = Add_Category::all();
        $subCategorys = Add_Sub_Category::all();
        return view('admin.add_product',compact('brands','categorys','subCategorys'));
    }
    public function insert_product(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta");//set you countary name from below timezone list
        $addproduct = new Add_Product();
        $addproduct->p_name=$request->productName;
        $addproduct->p_qty=$request->productQty;
        $addproduct->p_listprice=$request->productPrice;
        $addproduct->p_op=$request->productOfferPr;
        $addproduct->p_suggesion=$request->productSuggestedPeople;
        $addproduct->p_desc=$request->productDesc;
        $addproduct->p_add_date=date('Y-m-d H:i:s');
        $addproduct->p_gw=$request->productGW;
        $addproduct->p_gw_desc=$request->productGWDesc;
        $addproduct->brand_id=$request->productBrand;
        $addproduct->category_id=$request->productCategory;
        $addproduct->subcategory_id=$request->productSubCategory;
        if($file = $request->file('productImg'))
        {
             $extension = $file->getClientOriginalExtension(); //geting image Extension
             $filename = time() . '.' . $extension;
             $file->move('products/', $filename);
             $addproduct->p_image = $filename;
        }
        $addproduct->save();
        return redirect('admin/manage_product')->with('message','Product Added Seccessfully!');
    }
    public function show_product()
    {
        $show_products = Add_Product::paginate(5);
        return view('admin.manage_product',compact('show_products'));
    }
    public function edit_product($id)
    {
        $edit_products= Add_Product::where('p_id',$id)->first();
        $editdrop_brands = Add_Brand::all();
        $editdrop_categorys = Add_Category::all();
        $editdrop_subCategorys = Add_Sub_Category::all();
        return view('admin.edit_product',compact('edit_products','editdrop_brands','editdrop_categorys','editdrop_subCategorys'));
    }
    public function update_product(Request $request)
    {
        $update_product = Add_Product::where('p_id',$request->p_id)->first();
        $update_product->p_name=$request->productName;
        $update_product->p_qty=$request->productQty;
        $update_product->p_listprice=$request->productPrice;
        $update_product->p_op=$request->productOfferPr;
        $update_product->brand_id=$request->productBrand;
        $update_product->category_id=$request->productCategory;
        $update_product->subcategory_id=$request->productSubCategory;
        $update_product->p_suggesion=$request->productSuggestedPeople;
        $update_product->p_gw=$request->productGW;
        $update_product->p_gw_desc=$request->productGWDesc;
        $update_product->p_desc=$request->productDesc;
        if($request->hasfile('productImg'))
         {
             $productimage = public_path("products/{$update_product->p_image}");
             if(File::exists($productimage))
             {
                 unlink($productimage);
             }
             $file = $request->file('productImg');
             $extension = $file->getClientOriginalExtension(); //geting image Extension
             $filename = time() . '.' . $extension;
             $file->move('products/', $filename);
             $update_product->p_image = $filename;
         }
         $update_product->save();
         return redirect('admin/manage_product')->with('message','Product Updated Successfully!');
    } 
    // public function delete_product($id)
    // {
    //     $delete_product = Add_Product::where('p_id',$id)->first();
    //     $delete_product->delete();
    //     return redirect('admin/manage_user')->with('message', 'Query Deleted Successfully!');
    // }
}
