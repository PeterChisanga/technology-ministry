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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->decimal('salary', 10, 2);
            $table->date('joining_date');
            $table->date('end_date')->nullable();
            $table->date('birth_date');
            $table->string('contact_number', 15);
            $table->string('email', 255);
            $table->string('address', 255);
            $table->string('emergency_contact_name', 100)->nullable();
            $table->string('emergency_contact_number', 15)->nullable();
            $table->string('emergency_contact_relationship', 50)->nullable();
            $table->string('health_and_safety', 50)->nullable();
            $table->string('employee_type', 50);
            $table->string('compensation_and_benefits', 50)->nullable();
            $table->string('role', 50);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
