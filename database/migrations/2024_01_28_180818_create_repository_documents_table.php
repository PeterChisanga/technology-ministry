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
        Schema::create('repository_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('file_path', 255); // Assuming the file path will be stored
            $table->unsignedBigInteger('repository_id');
            $table->timestamps();

            $table->foreign('repository_id')->references('id')->on('repositories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repository_documents');
    }
};
