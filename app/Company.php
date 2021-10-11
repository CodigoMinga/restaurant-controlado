<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property boolean $enabled
 * @property CompanyUser[] $companyUsers
 * @property Item[] $items
 * @property Order[] $orders
 * @property Product[] $products
 * @property Table[] $tables
 */
class Company extends Model
{
    protected $keyType = 'integer';

    
    protected $fillable = ['created_at', 'updated_at', 'name', 'rut', 'razon_social', 'giro', 'direccion', 'commune_id', 'api_key_openfactura','enabled'];

    
    public function companyUsers()
    {
        return $this->hasMany('App\CompanyUser');
    }

    
    public function items()
    {
        return $this->hasMany('App\Item');
    }
    

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    

    public function products()
    {
        return $this->hasMany('App\Product');
    }


    public function tables()
    {
        return $this->hasMany('App\Table');
    }


    public function commune()
    {
        return $this->belongsTo('App\Commune');
    }
}
