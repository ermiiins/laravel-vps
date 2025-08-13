<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterImagesTable extends Migration
{
    public function up()
    {
        Schema::create('chapter_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->string('image_paths'); // relative to public/ or storage/
            $table->string('caption')->nullable();
            $table->integer('position')->default(0); // for custom sorting
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chapter_images');
    }
};
