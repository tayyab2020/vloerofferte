<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
    protected $fillable = ['cat_name', 'cat_slug','photo','description','colors','service_type','main_service'];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function users()
    {
    	return $this->hasMany('App\User');

    }


}
