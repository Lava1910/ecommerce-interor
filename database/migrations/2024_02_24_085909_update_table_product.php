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
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_author');
            $table->string('product_material');
            $table->string('product_image1');
            $table->string('product_image2');
            $table->unsignedDecimal("product_price_after_discount",14,2)->nullable();
            $table->unsignedBigInteger("project_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['product_author']);
            $table->dropColumn(['product_material']);
            $table->dropColumn(['product_image1']);
            $table->dropColumn(['product_image2']);
            $table->dropColumn(['product_price_after_discount']);
            $table->dropColumn(['project_id']);
        });
    }
};
