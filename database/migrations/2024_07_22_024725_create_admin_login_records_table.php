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
        Schema::create('admin_login_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->timestamp('login_time')->nullable();
            $table->timestamp('logout_time')->nullable();
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_login_records');
    }
};
