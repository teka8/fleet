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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('fuel_type_id')->nullable();
            $table->string('year_of_manufacture')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_number')->nullable();
            $table->boolean('is_public')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
