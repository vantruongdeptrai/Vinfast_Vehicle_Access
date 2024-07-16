<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price_per_hour'
    ];
    public function informationVehicles()
    {
        return $this->hasMany(InformationVehicle::class, 'type_vehicle_id');
    } 
}
