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
    Schema::table('products', function (Blueprint $table) {
        $table->unsignedBigInteger('category_id')->nullable()->after('stock');
        $table->dropColumn('category');
    });
}
public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('category')->nullable()->after('stock');
        $table->dropColumn('category_id');
    });
}
};
