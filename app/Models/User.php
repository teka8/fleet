<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'join_date',
        'status',
        'photo',
        'address',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $getUser = self::orderBy('user_id', 'desc')->first();

    //         if ($getUser) {
    //             $latestID = intval(substr($getUser->user_id, 4));
    //             $nextID = $latestID + 1;
    //         } else {
    //             $nextID = 1;
    //         }
    //         $model->user_id = 'KH_' . sprintf("%04s", $nextID);
    //         while (self::where('user_id', $model->user_id)->exists()) {
    //             $nextID++;
    //             $model->user_id = 'KH_' . sprintf("%04s", $nextID);
    //         }
    //     });
    // }

}
