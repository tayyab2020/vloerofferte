<?php

namespace App\Exports;

use App\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function headings(): array
    {
        return ["ID", "Title", "Slug", "Description", "Category", "Brand", "Model"];
    }

    public function collection()
    {
        return Products::leftjoin('categories','categories.id','=','products.category_id')->leftjoin('brands','brands.id','=','products.brand_id')->leftjoin('models','models.id','=','products.model_id')->select('products.id','products.title','products.slug','products.description','categories.cat_name','brands.cat_name as brand_name','models.cat_name as model_name')->get();
    }
}
