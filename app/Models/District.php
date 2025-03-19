<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
            'name',
            'address',
            'manager_id',
    ];

    public function branchs(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
