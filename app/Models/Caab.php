<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caab
 *
 * @property $id
 * @property $lat
 * @property $long
 * @property $height
 * @property $airport
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caab extends Model
{
    
    static $rules = [
		'airport' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['lat','long','height','airport'];



}
