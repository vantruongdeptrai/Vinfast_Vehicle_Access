<?php

namespace App\Http\Controllers\Admin;

use App\Models\SenderInformationVehicle;
use App\Models\Sender;
use App\Models\InformationVehicle;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Carbon;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageParkingController extends Controller
{
    //
    public function index()
    {
        $information = SenderInformationVehicle::with(['sender', 'informationVehicle'])->get();
        $costs = []; // Mảng để lưu trữ chi phí

        foreach ($information as $item) {
            $current_time = Carbon::now();
            $totalHours = $current_time->diffInHours($item->entry_time);

            // Xác định phí mỗi giờ dựa trên loại xe
            $feePerHour = 0;
            switch ($item->informationVehicle->type_vehicle_id) {
                case 1:
                    $feePerHour = 15000;
                    break;
                case 2:
                    $feePerHour = 10000;
                    break;
                case 3:
                    $feePerHour = 7000;
                    break;
                case 4:
                    $feePerHour = 5000;
                    break;
                default:
                    $feePerHour = 0; // Mặc định là 0 nếu loại không được nhận dạng
                    break;
            }

            $totalCost = $totalHours * $feePerHour;

            // Lưu chi phí tính toán vào mảng
            $costs[] = [
                'vehicle_id' => $item->informationVehicle->id,
                'type' => $item->informationVehicle->type_vehicle_id,
                'hours' => $totalHours,
                'cost' => $totalCost,
            ];
        }

        $combinedData = array_map(function ($info, $cost) {
            return [
                'full_name' =>$info->sender->full_name,
                'license_plates'=>$info->informationVehicle->license_plates,
                'vehicle_id' => $info->informationVehicle->id,
                'entry_time' => $info->entry_time,
                'status' => $info->status,
                'qr_code' => $info->qr_code,
                'type' => $info->informationVehicle->type_vehicle_id,
                'hours' => $cost['hours'],
                'cost' => $cost['cost'],
            ];
        }, $information->all(), $costs);

        return view('admin.manage_parking.index', compact('information', 'combinedData'));
    }

}
