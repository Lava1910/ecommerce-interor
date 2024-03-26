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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('category_image_detail');
            $table->text('description_main')->nullable();
            $table->string('topic1')->nullable();
            $table->text('description_topic1')->nullable();
            $table->string('topic2')->nullable();
            $table->text('description_topic2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['category_image_detail']);
            $table->dropColumn(['description_main']);
            $table->dropColumn(['topic1']);
            $table->dropColumn(['description_topic1']);
            $table->dropColumn(['topic2']);
            $table->dropColumn(['description_topic2']);
        });
    }
};
