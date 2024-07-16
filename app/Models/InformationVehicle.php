<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationVehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_name',
        'brand',
        'color',
        'license_plates',
        'type_vehicle_id'
    ];
    public function typeVehicle()
    {
        return $this->belongsTo(TypeVehicle::class, 'type_vehicle_id');
    }
    public function senders(){
        $this->belongsToMany(Sender::class);
    }
    
}
