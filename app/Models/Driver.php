<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'license_number',
        'license_front',
        'license_back',
        'vehicle_id',
        'license_expiry_date',
        'medical_status'
    ];

    private function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function generateAccountNumber()
    {
        $lastDriver = Driver::latest('id')->first(); 
        
        if ($lastDriver) {
            $newAccountNumber = str_pad($lastDriver->id + 1, 8, '0', STR_PAD_LEFT); // Format like "000001"
        } else {
            $newAccountNumber = '000001'; // default
        }

        return $newAccountNumber;
    }
}
