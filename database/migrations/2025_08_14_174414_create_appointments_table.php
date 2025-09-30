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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('age');
            $table->integer('user_id');
            $table->integer('n_id');
            $table->string('gender');
            $table->string('email');
            $table->date('date');
            $table->time('time');
            $table->string('medical_condition');
            $table->string('appointment_condition')->nullable();
            $table->string('price');
            $table->softDeletes();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
