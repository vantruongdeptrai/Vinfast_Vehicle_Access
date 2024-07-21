<?php

namespace App\Http\Controllers;
use App\Models\SenderInformationVehicle;
use App\Models\InformationVehicle;
use App\Models\ParkingLots;
use App\Models\Sender;
use App\Models\FeedBack;
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
        $number = mt_rand(1000000000,9999999999);
        //dd($number);
        $request->validate([
            'full_name'=> ['required', 'string', 'max:255'],
            'phone_number'=> ['required', 'string', 'regex:/^0\d{9,10}$/', 'max:11','min:10'],
            'card_id'=> ['required', 'string', 'max:255'],
            'vehicle_name'=> ['required', 'string', 'max:255'],
            'brand'=> ['required', 'string', 'max:255'],
            'color'=> ['required', 'string', 'max:255'],
            'license_plates'=> ['required', 'string', 'max:255']
        ]);
        
        try{
            DB::beginTransaction();
            
            $senderData = request()->except('vehicle_name','brand','color','license_plates','type_vehicle_id');
            $sender = Sender::create($senderData);
            $informationData = request()->except('full_name','phone_number','card_id');
            $information = InformationVehicle::create($informationData);
            $parkinglot = ParkingLots::query()->first();
            if ($parkinglot->total_spots > 0) {
                // Giảm số chỗ trống đi 1
                $parkinglot->total_spots -= 1;
                $parkinglot->save();
        
                // Chèn bản ghi vào bảng sender_information_vehicle
                DB::table('sender_information_vehicle')->insert([
                    'sender_id' => $sender->id,
                    'information_vehicle_id' => $information->id,
                    'parking_lots_id' => $parkinglot->id,
                    'entry_time' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'qr_code'=>$number,
                ]);
        
                DB::commit();
                return redirect()->route('user')->with('success', 'Xác nhận thông tin thành công !');
            } else {
                // Nếu không còn chỗ trống, rollback và thông báo lỗi
                DB::rollBack();
                return redirect()->route('user')->with('error', 'Xác nhận thông tin thất bại !');
            }
            // DB::commit();
            
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user')->with('error', 'Xác nhận thông tin thất bại !');
        }
    }
    public function findLicensePlates(Request $request){
        $licensePlate = $request->input('license_plates');
        $informationVehicle = InformationVehicle::where('license_plates',$licensePlate)->with('typeVehicle')->first();
        if($informationVehicle){
            $typeVehicle = $informationVehicle->typeVehicle;
            
            return view('user.detail',compact('informationVehicle','typeVehicle'));
        }
    }
}
