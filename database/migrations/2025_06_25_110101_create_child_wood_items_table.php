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
        Schema::create('child_wood_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_wood_id')->constrained('child_woods')->onDelete('cascade');
            $table->text('description');
            $table->json('photos'); // store multiple image paths as JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_wood_items');
    }
};
