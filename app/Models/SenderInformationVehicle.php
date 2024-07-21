<?php

namespace App\Models;
use App\Models\Sender;
use App\Models\InformationVehicle;
use App\Models\Checkin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderInformationVehicle extends Model
{
    use HasFactory;
    protected $table = 'sender_information_vehicle';

    protected $fillable = [
        'sender_id',
        'information_vehicle_id',
        'parking_lots_id',
        'status'
    ];

    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }

    public function informationVehicle()
    {
        return $this->belongsTo(InformationVehicle::class);
    }

    public function checkins()
    {
        return $this->hasMany(Checkin::class);
    }
    public function parkingLots(){
        return $this->belongsTo(ParkingLots::class);
    }
}
