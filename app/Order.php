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
    protected $fillable = ['company_id', 'ordertype_id', 'created_at', 'updated_at','closed'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordertype()
    {
        return $this->belongsTo('App\Ordertype');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetails()
    {
        return $this->hasMany('App\Orderdetail');
    }
}
