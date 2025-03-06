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
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('course_id');
    $table->string('start_time');
    $table->string('end_time');
    $table->integer('paid');
    $table->date('date');
    $table->foreign('user_id')->references('id')->on('users');
    $table->foreign('course_id')->references('id')->on('courses');
    $table->timestamps();
 });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription');
    }
};
