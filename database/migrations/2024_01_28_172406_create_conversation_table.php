<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant1_id');
            $table->unsignedBigInteger('participant2_id');
            $table->unsignedBigInteger('last_message_id')->nullable();
            $table->timestamps();

            $table->foreign('participant1_id')->references('id')->on('users');
            $table->foreign('participant2_id')->references('id')->on('users');
            $table->foreign('last_message_id')->references('id')->on('messages');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
