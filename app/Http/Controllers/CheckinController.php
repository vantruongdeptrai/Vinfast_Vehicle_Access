<?php

namespace App\Http\Controllers;
use App\Models\Checkin;
use App\Models\SenderInformationVehicle;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    //
    public function qrcode(){
        $qrCodes = [];
        $qrCodes['simple'] = 
        QrCode::size(300)->generate('http://127.0.0.1:8000/');
        return view('qrcode',$qrCodes);
    }
    public function checkIn(Request $request)
    {
        $checkin_qr_code = Str::uuid()->toString();
        $checkinQrCode = QrCode::size(300)->generate(route('checkin.validate', ['qr_code' => $checkin_qr_code]));
        return view('qrcode', ['qrcode' => $checkinQrCode, 'type' => 'checkin']);
    }

}
