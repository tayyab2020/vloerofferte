<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class items extends Model
{
    use SoftDeletes;
    public $table = 'items';
    public $timestamps = false;
    protected $dates = ['deleted_at'];


}
