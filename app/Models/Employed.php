<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employed
 *
 * @property $id
 * @property $FirstName
 * @property $MiddleName
 * @property $LastName
 * @property $id_deparment
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employed extends Model
{
    
    static $rules = [
		'FirstName' => 'required',
		'MiddleName' => 'required',
		'LastName' => 'required',
		'id_deparment' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['FirstName','MiddleName','LastName','id_deparment'];



}
