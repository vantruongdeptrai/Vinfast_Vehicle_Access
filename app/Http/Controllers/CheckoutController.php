<?php

namespace App\Http\Controllers;

use App\Models\SenderInformationVehicle;
use App\Models\Sender;
use App\Models\InformationVehicle;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show($qr_code)
{
    // Lấy thông tin đỗ xe từ bảng sender_information_vehicle
    $item = SenderInformationVehicle::with(['sender','informationVehicle'])->where('qr_code', $qr_code)->first();
    
    if (!$item) {
        // Xử lý trường hợp không tìm thấy thông tin
        return redirect()->route('home')->with('error', 'Không tìm thấy thông tin đỗ xe.');
    }

    // Tính toán thời gian gửi xe
    $entryTime = Carbon::parse($item->entry_time);
    $exitTime = Carbon::now();
    
    SenderInformationVehicle::where('qr_code', $qr_code)->update(['exit_time' => $exitTime]);

    $totalHours = $exitTime->diffInHours($entryTime);

    // Tính toán giá tiền
    if($item->informationVehicle->type_vehicle_id==1){
        $feePerHour = 15000;
    }
    if($item->informationVehicle->type_vehicle_id==2){
        $feePerHour = 10000;
    }
    if($item->informationVehicle->type_vehicle_id==3){
        $feePerHour = 7000;
    }
    if($item->informationVehicle->type_vehicle_id==4){
        $feePerHour = 5000;
    }
    $totalCost = $totalHours * $feePerHour;

    $formattedEntryTime = $entryTime->format('d/m/Y H:i:s');
    $formattedExitTime = $exitTime->format('d/m/Y H:i:s');

    return view('parking_checkout', compact('item', 'totalHours', 'totalCost', 'formattedEntryTime', 'formattedExitTime'));
}
    public function generatePdf($qr_code)
    {
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('checkout',$qr_code)));
        $information = SenderInformationVehicle::with(['sender','informationVehicle'])->where('qr_code', $qr_code)->first();
        $pdf = PDF::loadView('qr_checkout', compact('qrcode'));
        return $pdf->download('qr_checkout.pdf');
    }
}
