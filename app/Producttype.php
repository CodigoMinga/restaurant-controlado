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
 * @property boolean $enabled
 * @property Company $company
 * @property Orderdetail[] $orderdetails
 */
class Producttype extends Model
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
    protected $fillable = ['company_id', 'created_at', 'updated_at', 'name', 'description', 'enabled'];

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

    
    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
