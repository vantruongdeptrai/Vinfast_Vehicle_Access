<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'phone_number',
        'card_id'
    ];
    public function informationVehicles(){
        $this->belongsToMany(InformationVehicle::class);
    } 
}
