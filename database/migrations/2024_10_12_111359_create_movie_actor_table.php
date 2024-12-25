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
        Schema::create('movie_actor', function (Blueprint $table) {
            $table->unsignedBigInteger('idmovie');
            $table->unsignedBigInteger('idactor');
            $table->primary(['idmovie','idactor']);
            $table->foreign('idmovie')->references('id')->on('movie')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idactor')->references('id')->on('actor')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_actor');
    }
};