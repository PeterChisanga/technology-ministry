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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 200);
            $table->unsignedBigInteger('government_institution_id');
            $table->decimal('cost', 10, 2);
            $table->string('project_manager', 50);
            $table->date('start_date');
            $table->integer('duration'); // Assuming duration is in months
            $table->date('stop_date')->nullable();
            $table->timestamps();

            $table->foreign('government_institution_id')->references('id')->on('government_institutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
