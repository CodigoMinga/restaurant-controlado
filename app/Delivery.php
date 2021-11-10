<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'ammount', 'delivery_commission','company_id','enabled'];
}
