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
        Schema::create('user_notification_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('email_general')->default(false);
            $table->boolean('email_advertisement')->default(false);
            $table->boolean('email_upcoming')->default(false);
            $table->boolean('phone_general')->default(false);
            $table->boolean('phone_advertisement')->default(false);
            $table->boolean('phone_upcoming')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_notification_settings');
    }
};
