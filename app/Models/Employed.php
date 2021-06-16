<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employed
 *
 * @property $id
 * @property $id_employed
 * @property $first_name
 * @property $middle_name
 * @property $last_name
 * @property $room_access
 * @property $date_deleted
 * @property $id_department
 * @property $created_at
 * @property $updated_at
 *
 * @property Department $department
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employed extends Model
{
    
    static $rules = [
		'id_employed' => 'required',
		'first_name' => 'required',
		'middle_name' => 'required',
		'last_name' => 'required',
		//'room_access' => 'required',
		'id_department' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_employed','first_name','middle_name','last_name','room_access','date_deleted','id_department'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'id_department');
    }
    

}
