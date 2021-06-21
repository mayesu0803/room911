<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Record
 *
 * @property $id
 * @property $date
 * @property $success
 * @property $message
 * @property $id_employed
 * @property $created_at
 * @property $updated_at
 *
 * @property Employed $employed
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Record extends Model
{
    
    static $rules = [
		'id_employed' => 'required|numeric',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','success','message','id_employed'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /*public function employed()
    {
        return $this->hasOne('App\Models\Employed', 'id', 'id_employed');
    }*/
    

}
