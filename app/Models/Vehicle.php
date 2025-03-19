<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'plate_number',
        'model_id',
        'branch_id',
        'fuel_type_id',
        'year_of_manufacture',
        'color',
        'engine_number',
        'is_public',
        'image'
    ];

    public function model()
    {
        return $this->belongsTo(VModel::class);
    }
}
