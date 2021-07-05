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
    protected $fillable = [
        'internal_id',
        'company_id',
        'ordertype_id',
        'table_id',
        'user_id',
        'client_id',
        'closed',

        'discount',
        'discount_description',
        'tip_type',
        'tip',
        'delivery',

        'credit_card',
        'debit_card',
        'efective',
        'transfer',

        'enabled',
        'created_at',
        'updated_at'];

    //setea el campo como date
    protected $casts = [
        'fecha_resolucion_sii'  => 'date:Y-m-d'
    ];
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

    public function client()
    {
        return $this->belongsTo('App\Client');
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
            if($orderdetail->enabled){
                $total=$total+$orderdetail->total_ammount;
            }
        }
        return $total;
    }

    
    public function getCommandCompleteAttribute(){
        $reps = true;
        $cant = 0;
        foreach ($this->orderdetails as $key => $orderdetail) {
            if($orderdetail->enabled){
                if($orderdetail->command==0){
                    $reps = false;
                }
                $cant++;
            }
        }
        return $cant>0 && $reps;
    }

    public function cashregister()
    {
        return $this->belongsTo('App\Cashregister');
    }
}
