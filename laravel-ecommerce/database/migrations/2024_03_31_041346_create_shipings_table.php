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
        Schema::create('shipings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('shiping_name')->nullable();
            $table->string('shiping_phone')->nullable();
            $table->string('shiping_address')->nullable();
            $table->string('shiping_country')->nullable();
            $table->string('shiping_city')->nullable();
            $table->string('shiping_zipcode')->nullable();
            $table->string('shiping_email')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipings');
    }
};
