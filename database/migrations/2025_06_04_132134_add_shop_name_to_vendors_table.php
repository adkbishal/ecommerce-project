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
    Schema::table('vendors', function (Blueprint $table) {
        $table->string('shop_name')->nullable();
    });
}

public function down()
{
    Schema::table('vendors', function (Blueprint $table) {
        $table->dropColumn('shop_name');
    });
}

};
