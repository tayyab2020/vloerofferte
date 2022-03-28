<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class all_categories extends Model
{
	use SoftDeletes;
    protected $fillable = ['cat_name','cat_slug','photo','description','parent_id','price_filter','size_filter','color_filter'];
    public $timestamps = false;
    protected $table = 'categories';
    protected $dates = ['deleted_at'];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

}
