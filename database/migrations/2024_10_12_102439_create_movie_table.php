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
        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('idcategory');
            $table->string('duration');
            $table->string('country');
            $table->string('language');
            $table->string('director');
            $table->text('storyline');
            $table->date('release_date');
            $table->string('small_img');
            $table->string('big_img');
            $table->foreign('idcategory')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
