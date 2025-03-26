<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kepseks', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('position');
            $table->text('description');
            $table->text('motivation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kepseks');
    }
};
