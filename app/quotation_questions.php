<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotation_questions extends Model
{

    protected  $table = 'quotation_questions';
    public $timestamps = false;


    public function answers(){
        return $this->hasMany('App\predefined_answers','question_id','id');
    }

}
