<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class handyman_services extends Model
{
    protected $fillable = ['handyman_id','service_id','rate','description'];
    public $timestamps = false;


}