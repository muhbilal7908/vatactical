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
        Schema::create('lottery_winners', function (Blueprint $table) {
            $table->id();
            $table->string('winner_name');
            $table->string('email');
            $table->string('phone_no')->nullable();
            $table->string('lottery_name');
            $table->string('lottery_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lottery_winners');
    }
};
