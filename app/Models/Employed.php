<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employed
 *
 * @property $id
 * @property $FrstName
 * @property $MiddleName
 * @property $LastName
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employed extends Model
{
    
    static $rules = [
		'FrstName' => 'required',
		'MiddleName' => 'required',
		'LastName' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['FrstName','MiddleName','LastName'];



}
