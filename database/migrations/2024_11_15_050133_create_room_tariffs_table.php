<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('room_tariffs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('room_type_id')->constrained()->onDelete('cascade');
    $table->foreignId('rate_type_id')->constrained()->onDelete('cascade');
    $table->decimal('tariff', 10, 2)->default(0);
    $table->decimal('extra_adult', 10, 2)->default(0);
    $table->decimal('extra_child', 10, 2)->default(0);
    $table->timestamps();

    $table->unique(['room_type_id', 'rate_type_id']);
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_tariffs');
    }
};
