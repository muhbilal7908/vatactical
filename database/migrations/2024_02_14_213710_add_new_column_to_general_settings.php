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
        Schema::table('general_settings', function (Blueprint $table) {
            $table->text('linkedin')->nullable();
            $table->text('ticktok')->nullable();
            $table->text('youtube')->nullable();
            $table->string('bankful_username')->nullable();
            $table->string('bankful_password')->nullable();
            $table->string('mailer_name')->nullable();
            $table->string('mailer_host')->nullable();
            $table->string('mailer_driver')->nullable();
            $table->string('mailer_port')->nullable();
            $table->string('mailer_username')->nullable();
            $table->string('mailer_email_id')->nullable();
            $table->string('mailer_encryption')->nullable();
            $table->string('mailer_password')->nullable();
            $table->string('pusher_id')->nullable();
            $table->string('pusher_app_key')->nullable();
            $table->string('pusher_secreat_key')->nullable();
            $table->integer('recaptcha_status')->nullable();
            $table->integer('recaptcha_site_key')->nullable();
            $table->integer('recaptcha_secreat_password')->nullable();
            $table->integer('whattsapp')->nullable();
            $table->text('fav_icon')->nullable();
            $table->text('pre_loader')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_settings', function (Blueprint $table) {
            //
        });
    }
};
