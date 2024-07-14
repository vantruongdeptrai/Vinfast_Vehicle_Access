<?php

namespace App\Http\Controllers;

use App\Models\InformationVehicle;
use App\Models\Sender;
use App\Models\TypeVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userDashboard(){
        $type_vehicle = TypeVehicle::query()->get();
        // dd($type_vehicle->all());
        return view('user.dashboard',compact('type_vehicle'));
    }
    public function postInformation(Request $request ){
        $request->validate([
            'full_name'=> ['required', 'string', 'max:255'],
            'phone_number'=> ['required', 'string', 'regex:/^0\d{9,10}$/', 'max:11','min:10'],
            'card_id'=> ['required', 'string', 'max:255'],
            'vehicle_name'=> ['required', 'string', 'max:255'],
            'brand'=> ['required', 'string', 'max:255'],
            'color'=> ['required', 'string', 'max:255'],
            'license_plates'=> ['required', 'string', 'max:255','unique:information_vehicles']
        ]);
        $senderData = request()->except('vehicle_name','brand','color','license_plates','type_vehicle_id');
        $sender = Sender::create($senderData);
        $informationData = request()->except('full_name','phone_number','card_id');
        $information = InformationVehicle::create($informationData);
        DB::table('sender_information_vehicle')->insert([
            'sender_id' => $sender->id,
            'information_vehicle_id' => $information->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('user')->withErrors(['error' => 'Please fill again !']); 
    }
    
}
