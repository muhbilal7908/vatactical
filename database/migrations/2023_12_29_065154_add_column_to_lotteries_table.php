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
        Schema::table('lotteries', function (Blueprint $table) {
            $table->string('slug')->unique();
            $table->integer('product_id')->nullable();
            $table->integer('gift_id')->nullable();
            $table->integer('course_id')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lotteries', function (Blueprint $table) {
            //
        });
    }
};
