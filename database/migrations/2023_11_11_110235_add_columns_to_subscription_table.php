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
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('company_name')->nullable();
            $table->string('address');
            $table->string('appartment')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('phone_no');
            $table->string("country");
            $table->integer("total");
            $table->string("bank_status");
            $table->string("delivery_status");
            $table->string("payment_method");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription', function (Blueprint $table) {
            //
        });
    }
};
