<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $description
 * @property Product $product
 * @property Prescriptiondetail[] $prescriptiondetails
 */
class Prescription extends Model
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
    protected $fillable = ['product_id', 'created_at', 'updated_at', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescriptiondetails()
    {
        return $this->hasMany('App\Prescriptiondetail')->where("enabled",1);
    }
}
