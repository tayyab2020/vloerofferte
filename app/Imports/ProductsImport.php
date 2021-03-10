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

    public $data = array();

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
        if($row[1])
        {
            $category = Category::where('cat_name',$row[5])->first();

            if(!$category)
            {
                $cat_slug = Str::slug($row[5], "-");

                if (Category::where('cat_slug',$cat_slug)->exists()) {
                    $cat_slug = $this->incrementSlug($cat_slug,1);
                }

                $category = new Category;
                $category->cat_name = $row[5];
                $category->cat_slug = $cat_slug;
                $category->save();
            }

            $brand = Brand::where('cat_name',$row[6])->first();

            if(!$brand)
            {
                $brand_slug = Str::slug($row[6], "-");

                if (Brand::where('cat_slug',$brand_slug)->exists()) {
                    $brand_slug = $this->incrementSlug($brand_slug,2);
                }

                $brand = new Brand;
                $brand->cat_name = $row[6];
                $brand->cat_slug = $brand_slug;
                $brand->save();
            }

            $model = Model1::where('cat_name',$row[7])->first();

            if(!$model)
            {
                $model_slug = Str::slug($row[7], "-");

                if (Model1::where('cat_slug',$model_slug)->exists()) {
                    $model_slug = $this->incrementSlug($model_slug,3);
                }

                $model = new Model1;
                $model->brand_id = $brand->id;
                $model->cat_name = $row[7];
                $model->cat_slug = $model_slug;
                $model->save();
            }

            $check = Products::where('id',$row[1])->first();

            if(!$check)
            {
                $check1 = Products::leftjoin('categories', 'categories.id', '=', 'products.category_id')->leftjoin('brands', 'brands.id', '=', 'products.brand_id')->leftjoin('models', 'models.id', '=', 'products.model_id')->where('products.title', 'LIKE', '%' . $row[2] . '%')->where('categories.cat_name', $row[5])->where('brands.cat_name', $row[6])->where('models.cat_name', $row[7])->select('products.*')->first();

                if(!$check1)
                {
                    $check = new Products;
                    $check->article_code = $row[0];
                    $check->title = $row[2];
                    $check->slug = $row[3];
                    $check->description = $row[4];
                    $check->model_number = $row[8];
                    $check->size = $row[9];
                    $check->measure = $row[10];
                    $check->estimated_price = $row[11];
                    $check->additional_info = $row[12];
                    $check->floor_type = $row[13];
                    $check->floor_type2 = $row[14];
                    $check->supplier = $row[15];
                    $check->color = $row[16];
                    $check->category_id = $category->id;
                    $check->brand_id = $brand->id;
                    $check->model_id = $model->id;
                    $check->excel = 1;
                    $check->save();

                    $this->data[] = $check->id;
                }
                else
                {
                    $check1->article_code = $row[0];
                    $check1->slug = $row[3];
                    $check1->description = $row[4];
                    $check1->model_number = $row[8];
                    $check1->size = $row[9];
                    $check1->measure = $row[10];
                    $check1->estimated_price = $row[11];
                    $check1->additional_info = $row[12];
                    $check1->floor_type = $row[13];
                    $check1->floor_type2 = $row[14];
                    $check1->supplier = $row[15];
                    $check1->color = $row[16];
                    $check1->excel = 1;
                    $check1->save();

                    $this->data[] = $check1->id;
                }
            }
            else
            {
                $check->article_code = $row[0];
                $check->title = $row[2];
                $check->slug = $row[3];
                $check->description = $row[4];
                $check->model_number = $row[8];
                $check->size = $row[9];
                $check->measure = $row[10];
                $check->estimated_price = $row[11];
                $check->additional_info = $row[12];
                $check->floor_type = $row[13];
                $check->floor_type2 = $row[14];
                $check->supplier = $row[15];
                $check->color = $row[16];
                $check->category_id = $category->id;
                $check->brand_id = $brand->id;
                $check->model_id = $model->id;
                $check->excel = 1;
                $check->save();

                $this->data[] = $check->id;
            }

        }
        else {

            $check = Products::leftjoin('categories', 'categories.id', '=', 'products.category_id')->leftjoin('brands', 'brands.id', '=', 'products.brand_id')->leftjoin('models', 'models.id', '=', 'products.model_id')->where('products.title', 'LIKE', '%' . $row[2] . '%')->where('categories.cat_name', $row[5])->where('brands.cat_name', $row[6])->where('models.cat_name', $row[7])->select('products.*')->first();

            if ($check) {

                $check->article_code = $row[0];
                $check->slug = $row[3];
                $check->description = $row[4];
                $check->model_number = $row[8];
                $check->size = $row[9];
                $check->measure = $row[10];
                $check->estimated_price = $row[11];
                $check->additional_info = $row[12];
                $check->floor_type = $row[13];
                $check->floor_type2 = $row[14];
                $check->supplier = $row[15];
                $check->color = $row[16];
                $check->excel = 1;
                $check->save();

            } else {

                $category = Category::where('cat_name', $row[5])->first();

                if (!$category) {
                    $cat_slug = Str::slug($row[5], "-");

                    if (Category::where('cat_slug', $cat_slug)->exists()) {
                        $cat_slug = $this->incrementSlug($cat_slug, 1);
                    }

                    $category = new Category;
                    $category->cat_name = $row[5];
                    $category->cat_slug = $cat_slug;
                    $category->save();
                }

                $brand = Brand::where('cat_name', $row[6])->first();

                if (!$brand) {
                    $brand_slug = Str::slug($row[6], "-");

                    if (Brand::where('cat_slug', $brand_slug)->exists()) {
                        $brand_slug = $this->incrementSlug($brand_slug, 2);
                    }

                    $brand = new Brand;
                    $brand->cat_name = $row[6];
                    $brand->cat_slug = $brand_slug;
                    $brand->save();
                }

                $model = Model1::where('cat_name', $row[7])->first();

                if (!$model) {
                    $model_slug = Str::slug($row[7], "-");

                    if (Model1::where('cat_slug', $model_slug)->exists()) {
                        $model_slug = $this->incrementSlug($model_slug, 3);
                    }

                    $model = new Model1;
                    $model->brand_id = $brand->id;
                    $model->cat_name = $row[7];
                    $model->cat_slug = $model_slug;
                    $model->save();
                }

                $product = new Products;
                $product->article_code = $row[0];
                $product->title = $row[2];
                $product->slug = $row[3];
                $product->model_number = $row[8];
                $product->size = $row[9];
                $product->measure = $row[10];
                $product->estimated_price = $row[11];
                $product->additional_info = $row[12];
                $product->floor_type = $row[13];
                $product->floor_type2 = $row[14];
                $product->supplier = $row[15];
                $product->color = $row[16];
                $product->category_id = $category->id;
                $product->brand_id = $brand->id;
                $product->model_id = $model->id;
                $product->description = $row[4];
                $product->excel = 1;
                $product->save();

                /*return new Products([
                    'title' => $row[1],
                    'slug' => $row[2],
                    'description' => $row[3],
                    'category_id' => $category->id,
                    'brand_id' => $brand->id,
                    'model_id' => $model->id
                ]);*/
            }
        }
    }
}
