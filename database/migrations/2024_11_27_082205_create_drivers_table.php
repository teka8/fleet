<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('license_number');
            $table->string('license_front')->nullable();
            $table->string('license_back')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->string('medical_status')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
