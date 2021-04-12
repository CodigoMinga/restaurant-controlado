<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
/**
 * @property integer $id
 * @property integer $region_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property Region $region
 * @property User[] $users
 */
class Commune extends Model
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
    protected $fillable = ['region_id', 'created_at', 'updated_at', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
=======
class Commune extends Model
{
    //
}
>>>>>>> roberto
