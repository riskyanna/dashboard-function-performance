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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('name')->nullable();
            $table->string('function')->nullable();
            $table->string('shift')->nullable();
            $table->string('reason_code')->nullable();
            $table->string('status')->nullable(); // Normalized status: Present, Alfa, Absend
            $table->date('date')->nullable();
            $table->string('month_year')->nullable(); // For easier filtering e.g. "2024-01"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
