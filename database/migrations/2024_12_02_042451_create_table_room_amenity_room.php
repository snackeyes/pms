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
        Schema::create('room_amenity_room', function (Blueprint $table) {
    $table->unsignedBigInteger('room_id');
    $table->unsignedBigInteger('room_amenity_id');
    $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
    $table->foreign('room_amenity_id')->references('id')->on('room_amenities')->onDelete('cascade');
    $table->primary(['room_id', 'room_amenity_id']); // Composite primary key
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_room_amenity_room');
    }
};
