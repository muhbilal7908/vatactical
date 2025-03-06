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
        Schema::table('subscription', function (Blueprint $table) {
            $table->text('token')->nullable();
            $table->string('repeat')->nullable();
            $table->string('slot_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription', function (Blueprint $table) {
            $table->dropColumn([
                'token',
                'repeat',
                'slot_date'
            ]);
        });
    }
};
