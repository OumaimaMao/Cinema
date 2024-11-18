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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idmovie');
            $table->unsignedBigInteger('idplace');
            $table->decimal('ticket_price',8,2);
            $table->date('date');
            $table->time('time');
            $table->string('barcode');
            $table->foreign('idmovie')->references('id')->on('movie')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('idplace')->references('id')->on('place')->onDelete('cascade')->onUpdate('cascade');;
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
