<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'id',
        'url',
        'brand',
        'model',
        'year',
        'option',
        'engine_cylinders',
        'engine_displacement',
        'engine_power',
        'engine_torque',
        'engine_fuel_system',
        'engine_fuel',
    ];
}
