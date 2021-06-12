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
		'date' => 'required',
		'success' => 'required',
		'message' => 'required',
		'id_employed' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date','success','message','id_employed'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employed()
    {
        return $this->hasOne('App\Models\Employed', 'id', 'id_employed');
    }
    

}
