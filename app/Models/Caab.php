<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caab
 *
 * @property $sl
 * @property $lat
 * @property $long
 * @property $height
 * @property $airport
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caab extends Model
{
    protected $table = 'caab';
    static $rules = [
		'sl' => 'required',
		'airport' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sl','lat','long','height','airport'];



}
