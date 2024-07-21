<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLots extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_spots'
    ];
    public function senderInformationVehicle(){
        $this->hasMany(SenderInformationVehicle::class);
    }
}
