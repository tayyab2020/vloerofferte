<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class new_quotations extends Model
{
    protected $table = 'new_quotations';

    public function data()
    {
        return $this->hasMany(new_quotations_data::class, 'quotation_id','id');
    }

    public function orders()
    {
        return $this->hasMany(new_orders::class, 'quotation_id','id');
    }

    public function invoices()
    {
        return $this->hasMany(new_invoices::class, 'quotation_id','id');
    }

}
