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
       Schema::create('settlement_types', function (Blueprint $table) {
    $table->id();
    $table->string('name'); // Payment mode name
    $table->enum('payment_option', ['none', 'credit_card', 'check', 'loyalty']); // Payment options
    $table->decimal('surcharge_amount', 10, 2)->default(0); // Fixed surcharge amount
    $table->decimal('surcharge_percentage', 5, 2)->default(0); // Percentage surcharge
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlement_types');
    }
};
