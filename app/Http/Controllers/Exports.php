<?php

namespace App\Http\Controllers;
use App\Add_Brand;
use App\Add_Category;
use App\Add_Sub_Category;
use App\Add_Product;
use App\Login;
use App\Contact_Us;
use App\Orders_Detail;
use App\Order_Masters;
use Excel;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Exports extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request,[
            'file' => 'required|mimes:csv,txt',
        ]);
        
        if(($handle = fopen($_FILES['file']['tmp_name'],"r")) !== FALSE)
        {
            fgetcsv($handle);//Remove First Rows Form The Excel
            while(($data = fgetcsv($handle,1000,",")) !==FALSE)
            {
                // echo $data[0];
                // echo "<br>";
                $add_brand = DB::table('add_brand')->insert([
                    'brand_name' => $data[0], 
                    'brand_desc' => $data[1]
                ]);
            }
            return redirect()->back()->with('message','Brand Import SuccessFully');
        }
    }
    
    //Admin Side Exports Brands On add_brand Table
    function excelBrand()
    {
        return Excel::download(new BrandExport,'BrandData.xlsx');
    }
    //Admin Side Exports Categories On add_category Table
    function excelCategory()
    {
        return Excel::download(new CategoryExport,'CategoryData.xlsx');
    }
    //Admin Side Exports SubCategories On add_sub_category Table
    function excelSubCategory()
    {
        return Excel::download(new SubCategoryExport,'SubCategoryData.xlsx');
    }
    //Admin Side Exports Products On product Table
    function excelProduct()
    {
        return Excel::download(new ProductExport,'ProductData.xlsx');
    }
    //Admin Side Exports Orders On ordermaster Table
    function excelOrder()
    {
        return Excel::download(new OrderExport,'OrdersData.xlsx');
    }
    //Admin Side Exports Users On register Table
    function excelUser()
    {
        return Excel::download(new UserExport,'UserData.xlsx');
    }
    
    //Admin Side Exports Contacts On contact_us Table
    function excelContactUs()
    {
        return Excel::download(new ContactUsExport,'ContactData.xlsx');
    }
}
//Brands Exports Class
class BrandExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Add_Brand::all('id','brand_name','brand_desc');
    }
    public function headings(): array
    {
        return [
            'Id',
            'Brand Name',
            'Brand Descriptions',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
//Categories Exports Class
class CategoryExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Add_Category::all('id','category_name','category_desc');
    }
    public function headings(): array
    {
        return [
            'Id',
            'Category Name',
            'Category Descriptions',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
//SubCategories Exports Class
class SubCategoryExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Add_Sub_Category::all('sc_id','sc_name','sc_desc');
    }
    public function headings(): array
    {
        return [
            'Id',
            'SubCategory Name',
            'SubCategory Descriptions',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
//Products Exports Class
class ProductExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Add_Product::all('p_id','p_name','p_qty','p_listprice','p_op','p_suggesion','p_desc','p_add_date','p_gw','p_gw_desc');
    }
    public function headings(): array
    {
        return [
            'Id',
            'Product Name',
            'Product Quntity',
            'Product Price',
            'Product OfferPrice',
            'Product Suggesions',
            'Product Descriptions',
            'Product DateAndTime',
            'Product Garuenty/Warrenty',
            'Product GW Descriptions',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
//Orders Exports Class
class OrderExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Order_Masters::all('orderid','firstname','lastname','mobile_no','email','house_no','street','city','district','state','pincode','ordertotalprice','orderstatus','order_date');
    }
    public function headings(): array
    {
        return [
            'Order Id',
            'First Name',
            'Last Name',
            'Mobile Number',
            'Email',
            'House Number',
            'Street',
            'City',
            'District',
            'State',
            'Pincode',
            'Order Total Price',
            'Order Status',
            'Order Date',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
//Users Exports Class
class UserExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Login::all('user_id','firstname','lastname','gender','mobileno','email');
    }
    public function headings(): array
    {
        return [
            'Id',
            'First Name',
            'Last Name',
            'Gender(0=MALE / 1=FEMALE)',
            'Mobile Number',
            'Email',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
//Contacts Exports Class
class ContactUsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function collection()
    {
        return Contact_Us::all('id','name','email','mobileno','message');
    }
    public function headings(): array
    {
        return [
            'C_id',
            'Name',
            'Email',
            'mobileno',
            'Descriptions',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(17);
            },
        ];
    }
}
