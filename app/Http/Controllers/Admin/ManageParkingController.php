<?php

namespace App\Http\Controllers\Admin;
use App\Models\SenderInformationVehicle;
use App\Models\Sender;
use App\Models\InformationVehicle;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageParkingController extends Controller
{
    //
    public function index(){
        $information = SenderInformationVehicle::with(['sender','informationVehicle'])->get();
        //dd($information);
        return view('admin.manage_parking.index',compact('information'));
    }
    
}
