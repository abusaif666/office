<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('pnr')->nullable();
            $table->date('issueDate')->nullable();
            $table->date('flightDate')->nullable();
            $table->string('flightFrom')->nullable();
            $table->string('flightTo')->nullable();
            $table->string('airlinesName')->nullable();
            $table->integer('totalPassenger')->nullable();
            $table->integer('agentFare')->nullable();
            $table->integer('grossFare')->nullable();
            $table->decimal('sellingFare')->nullable();
            $table->integer('totalAmount')->nullable();
            $table->integer('depositAmount')->nullable();
            $table->integer('dueAmount')->nullable();
            $table->string('referenceBy')->nullable();
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
