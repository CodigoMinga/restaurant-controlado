<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $company_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $description
 * @property int $price
 * @property boolean $enabled
 * @property Company $company
 * @property Orderdetail[] $orderdetails
 * @property Prescriptiondetail[] $prescriptiondetails
 * @property Prescription[] $prescriptions
 */
class Product extends Model
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
    protected $fillable = ['company_id', 'created_at', 'updated_at', 'name', 'description', 'price', 'enabled'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetails()
    {
        return $this->hasMany('App\Orderdetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescriptiondetails()
    {
        return $this->hasMany('App\Prescriptiondetail', 'item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }
}
