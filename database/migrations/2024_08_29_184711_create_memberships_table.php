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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('membership_id');
            $table->foreign('membership_id')->references('id')->on('gift_cards')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('phone_no');
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country');
            $table->decimal('total', 10, 2);
            $table->string('bank_status');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
