<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'phone_number' => '0912345678',
            'address' => 'Addis Ababa, Ethiopia',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'join_date' => Carbon::parse('2024-11-27 11:03:17'),
            'last_login' => Carbon::parse('2025-02-08 09:03:00'),
            'status' => 'active',
            'photo' => null,
            'email_verified_at' => null,
            'remember_token' => null,
            'created_at' => Carbon::parse('2024-11-27 11:03:17'),
            'updated_at' => Carbon::parse('2025-02-08 09:03:48'),
        ]);
    }
}

