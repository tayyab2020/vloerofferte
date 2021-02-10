<?php

namespace App\Imports;

use App\Brand;
use App\Category;
use App\Model1;
use App\Products;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
     *
    */

    public function startRow(): int
    {
        return 2;
    }

    public function incrementSlug($slug,$type) {

        $original = $slug;

        $count = 2;

        if($type == 1)
        {
            while (Category::where('cat_slug',$slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }

        elseif($type == 2)
        {
            while (Brand::where('cat_slug',$slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        else
        {
            while (Model1::where('cat_slug',$slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }

    }

    public function model(array $row)
    {
        $check = Products::leftjoin('categories','categories.id','=','products.category_id')->leftjoin('brands','brands.id','=','products.brand_id')->leftjoin('models','models.id','=','products.model_id')->where('products.title', 'LIKE', '%'.$row[1].'%')->where('categories.cat_name',$row[4])->where('brands.cat_name',$row[5])->where('models.cat_name',$row[6])->select('products.*')->first();

        if($check)
        {
            $check->title = $row[1];
            $check->slug = $row[2];
            $check->description = $row[3];
            $check->save();
        }
        else
        {
            $category = Category::where('cat_name',$row[4])->first();

            if(!$category)
            {
                $cat_slug = Str::slug($row[4], "-");

                if (Category::where('cat_slug',$cat_slug)->exists()) {
                    $cat_slug = $this->incrementSlug($cat_slug,1);
                }

                $category = new Category;
                $category->cat_name = $row[4];
                $category->cat_slug = $cat_slug;
                $category->save();
            }

            $brand = Brand::where('cat_name',$row[5])->first();

            if(!$brand)
            {
                $brand_slug = Str::slug($row[5], "-");

                if (Brand::where('cat_slug',$brand_slug)->exists()) {
                    $brand_slug = $this->incrementSlug($brand_slug,2);
                }

                $brand = new Brand;
                $brand->cat_name = $row[5];
                $brand->cat_slug = $brand_slug;
                $brand->save();
            }

            $model = Model1::where('cat_name',$row[6])->first();

            if(!$model)
            {
                $model_slug = Str::slug($row[6], "-");

                if (Model1::where('cat_slug',$model_slug)->exists()) {
                    $model_slug = $this->incrementSlug($model_slug,3);
                }

                $model = new Model1;
                $model->brand_id = $brand->id;
                $model->cat_name = $row[6];
                $model->cat_slug = $model_slug;
                $model->save();
            }

            /*$product = new product;
            $product->excel_id = $row[0];
            $product->title = $row[1];
            $product->slug = $row[2];
            $product->category_id = $category->id;
            $product->brand_id = $brand->id;
            $product->model_id = $model->id;
            $product->description = $row[3];
            $product->save();*/

            return new Products([
                'excel_id'     => $row[0],
                'title'    => $row[1],
                'slug' => $row[2],
                'description' => $row[3],
                'category_id' => $category->id,
                'brand_id' => $brand->id,
                'model_id' => $model->id
            ]);
        }
    }
}
