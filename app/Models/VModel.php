<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VModel extends Model
{
    protected $table = 'models';
    protected $fillable = [
        'name',
        'make_id'
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
