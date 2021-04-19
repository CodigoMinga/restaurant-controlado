<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $phone
 * @property int $address
 * @property Commune[] $commune
 * @property Region[] $region
 */
class Client extends Model
{
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'name', 'phone', 'address', 'company_id','commune_id','enabled'];

    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }
}
