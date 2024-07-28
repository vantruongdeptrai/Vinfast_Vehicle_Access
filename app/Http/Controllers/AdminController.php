<?php

namespace App\Http\Controllers;
use App\Models\SenderInformationVehicle;
use App\Models\InformationVehicle;
use App\Models\Sender;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        
        $sender = Sender::query()->pluck('id');
        
        return view('admin.dashboard',compact('sender'));
    }
    public function basicAdminDashboard()
    {
        return view('basic_admin.dashboard');
    }
}
