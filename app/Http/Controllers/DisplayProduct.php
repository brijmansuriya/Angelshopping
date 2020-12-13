<?php

namespace App\Http\Controllers;
use App\Add_Product;
use App\Add_Brand;
use App\Add_Category;
use App\Add_Sub_Category;
use App\Login;
use Session;
use Illuminate\Http\Request;

class DisplayProduct extends Controller
{
    public function index()
    {
        $brands = Add_Brand::All();
        $categories = Add_Category::All();
        $products = Add_Product::paginate(9);
        $totalusers = Login::count();
        $totalproducts = Add_Product::count();
        return view('index',compact('brands','categories','products','totalusers','totalproducts'));
    }
    public function viewitem(Request $request)
    {
        $product = Add_Product::where('p_id',$request->pid)->first();
        return view('viewitem',compact('product'));
    }
    public function viewcategoryitem(Request $request)
    {
        $brands = Add_Brand::All();
        $categories = Add_Category::All();
        $products = Add_Product::where('category_id',$request->cid)->get();
        return view('viewcategoryitem',compact('brands','categories','products'));
    }
}