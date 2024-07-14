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
        Schema::create('sender_information_vehicle', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Sender::class)->constrained();
            $table->foreignIdFor(\App\Models\InformationVehicle::class)->constrained();
            $table->primary(['sender_id','information_vehicle_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sender_information_vehicle');
    }
};
