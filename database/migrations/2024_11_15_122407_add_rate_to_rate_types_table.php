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
    Schema::table('rate_types', function (Blueprint $table) {
        $table->text('description')->after('name');
    });
}

public function down()
{
    Schema::table('rate_types', function (Blueprint $table) {
        $table->dropColumn('rate');
    });
}

};
