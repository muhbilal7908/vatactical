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
        Schema::table('gift_cards', function (Blueprint $table) {
            $table->float('firearms')->nullable();
            $table->float('ammunation')->nullable();
            $table->float('courses')->nullable();
            $table->float('accessories')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gift_cards', function (Blueprint $table) {
            $table->dropColumn([
                'firearms',
                'ammunation',
                'courses',
                'accessories'
            ]);
        });
    }
};
