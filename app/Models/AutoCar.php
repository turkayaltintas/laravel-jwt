<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoCar extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'car_id',
        'brand',
        'model',
        'year',
        'options',
    ];
}
