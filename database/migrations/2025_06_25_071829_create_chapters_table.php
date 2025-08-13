<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('chapters');
    }
};
