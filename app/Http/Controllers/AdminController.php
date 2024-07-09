<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function basicAdminDashboard()
    {
        return view('basic_admin.dashboard');
    }
}
