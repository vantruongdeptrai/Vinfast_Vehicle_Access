<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_information_vehicle_id',
        'checkin_time',
        'checkout_time',
        'checkin_qr_code',
        'checkout_qr_code',
    ];

    public function senderInformationVehicle()
    {
        return $this->belongsTo(SenderInformationVehicle::class);
    }
}
