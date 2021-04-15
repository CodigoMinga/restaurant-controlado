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
 * @property int $number
 * @property boolean $enabled
 * @property Company $company
 */
class Table extends Model
{
    protected $keyType = 'integer';

    protected $fillable = ['company_id', 'created_at', 'updated_at', 'name', 'description', 'number', 'enabled'];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function tabletype()
    {
        return $this->belongsTo('App\Tabletype');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function hasOrder()
    {
        $order = $this->orders()->where('closed', 0)->first();
        if($order){
            return $order;
        }else{
            return null;
        }
    }

}
