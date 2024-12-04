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
        Schema::table('reservations', function (Blueprint $table) {
    $table->unsignedBigInteger('guest_id')->after('id');
    $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
    $table->date('arrival_date')->change()->after('guest_id')->useCurrent();
    $table->date('departure_date')->change()->after('arrival_date');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
