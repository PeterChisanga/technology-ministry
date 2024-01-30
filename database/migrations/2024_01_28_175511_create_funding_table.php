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
        Schema::create('funding', function (Blueprint $table) {
            $table->id();
            $table->string('funder', 50);
            $table->decimal('cost', 10, 2);
            $table->string('description', 200);
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('government_institution_id');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('government_institution_id')->references('id')->on('government_institutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding');
    }
};
