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
        Schema::create('member_ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_membership_id');
            $table->foreign('parent_membership_id')->references('id')->on('memberships')->onDelete('cascade');
            $table->string('member_name');
            $table->text('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_ships');
    }
};
