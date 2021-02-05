<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['title','slug','category_id','brand_id','model_id','photo','description'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];


}
