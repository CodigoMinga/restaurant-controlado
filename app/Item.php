<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $measureunit_id
 * @property integer $company_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $description
 * @property float $stock
 * @property Company $company
 * @property Measureunit $measureunit
 * @property Prescriptiondetail[] $prescriptiondetails
 */
class Item extends Model
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
    protected $fillable = ['measureunit_id', 'company_id', 'created_at', 'updated_at', 'name', 'stock'];

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
    public function measureunit()
    {
        return $this->belongsTo('App\Measureunit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescriptiondetails()
    {
        return $this->hasMany('App\Prescriptiondetail');
    }
}
