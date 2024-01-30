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
        Schema::create('production_unity', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 200)->nullable();
            $table->string('capacity', 10);
            $table->string('duration', 50);
            $table->string('status', 50);
            $table->string('manager', 50);
            $table->unsignedBigInteger('government_institution_id');
            $table->timestamps();

            $table->foreign('government_institution_id')->references('id')->on('government_institutions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_unity');
    }
};
