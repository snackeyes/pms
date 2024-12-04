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
        Schema::create('reservations', function (Blueprint $table) {
    $table->id();
    $table->date('arrival_date');
    $table->date('departure_date');
    $table->unsignedBigInteger('rate_type_id');
    $table->integer('adults');
    $table->integer('kids')->nullable();
    $table->boolean('is_tax_inclusive')->default(1);
    $table->text('customer_details');
    $table->unsignedBigInteger('room_id');
    $table->string('proof_type')->nullable();
    $table->string('proof_of_identification')->nullable();
    $table->timestamps();

    $table->foreign('rate_type_id')->references('id')->on('rate_types')->onDelete('cascade');
    $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
