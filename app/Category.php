<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
    protected $fillable = ['cat_name','cat_slug','photo','description','parent_id','price_filter','size_filter','color_filter'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where('parent_id','!=', 0)->where('cat_name','!=', 'Accessories');
    }

    // public function suppliers()
    // {
    //     return $this->hasMany('App\supplier_categories','category_id','id')->leftjoin('users','users.id','=','supplier_categories.user_id')->select('users.*');
    // }

    // public function sub_categories()
    // {
    //     return $this->hasMany('App\sub_categories','parent_id','id');
    // }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

}
