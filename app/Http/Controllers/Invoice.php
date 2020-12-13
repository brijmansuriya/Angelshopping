<?php

namespace App\Http\Controllers;
use PDF;
use Session;
use App;
use Illuminate\Http\Request;
use App\Add_Brand;
use App\Order_Masters;
use App\Orders_Detail;
use App\Add_Product;

class Invoice extends Controller
{
    public function pdf(Request $request)
    {
        $products = Add_Product::all();
        $order_master = Order_Masters::where('orderid',$request->orderid)->first();
        $order_detail = Orders_Detail::where('order_id',$request->orderid)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('invoice',compact('products','order_master','order_detail'));
        return $pdf->download();
    }
}
