<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $company_id
 * @property integer $ordertype_id
 * @property string $created_at
 * @property string $updated_at
 * @property Company $company
 * @property Ordertype $ordertype
 * @property Orderdetail[] $orderdetails
 * @property integer $internal_id
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['company_id', 'ordertype_id', 'table_id', 'user_id', 'created_at', 'updated_at','closed','enabled','internal_id'];


    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function table()
    {
        return $this->belongsTo('App\Table');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ordertype()
    {
        return $this->belongsTo('App\Ordertype');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\Orderdetail');
    }

    public function getTotalAttribute(){
        $total=0;
        foreach ($this->orderdetails as $key => $orderdetail) {
            $total=$total+$orderdetail->total_ammount;
        }
        return $total;
    }
}
