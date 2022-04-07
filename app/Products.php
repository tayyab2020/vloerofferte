<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['excel_id','title','slug','model_number','size','measure','estimated_price','additional_info','floor_type','floor_type2','supplier','color','category_id','brand_id','model_id','photo','description'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function supplier()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function colors()
    {
        return $this->hasMany('App\colors','product_id','id');
    }

    public function models()
    {
        return $this->hasMany('App\product_models','product_id','id');
    }

    public function types()
    {
        return $this->hasMany('App\Model1','brand_id','brand_id');
    }

}
