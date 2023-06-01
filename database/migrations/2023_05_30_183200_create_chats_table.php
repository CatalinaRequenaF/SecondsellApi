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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('emit')->nullable();
            $table->foreignId('recept')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->boolean('closed')->default(false);

            $table->foreign('recept')->references('id')->on('users');
            $table->foreign('emit')->references('id')->on('users');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
