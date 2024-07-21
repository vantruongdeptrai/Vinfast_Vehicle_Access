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
        Schema::table('sender_information_vehicle', function (Blueprint $table) {
            //
            $table->timestamp('entry_time')->nullable();
            $table->timestamp('exit_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sender_information_vehicle', function (Blueprint $table) {
            //
            $table->dropColumn('entry_time');
            $table->dropColumn('exit_time');
        });
    }
};
