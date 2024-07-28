<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AdminLoginRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function formLogin()
    {
        //
        $view = 'authentication.login';
        return view($view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {

        $credentials = $request::validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
            
        if (Auth::attempt($credentials)) {  
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard');
            } elseif ($user->role === 'basic_admin') {
                //dd(Auth::id());
                AdminLoginRecord::create([
                    'admin_id' => Auth::user()->id,
                    'login_time' => Carbon::now(),
                ]);
                return redirect()->intended('/basic_admin/dashboard');
            }
        }
        return redirect()->route('login')->withErrors(['error' => 'Invalid username or password.']);
    }

    public function logout(Request $request)
    {
        $loginRecord = AdminLoginRecord::where('admin_id', Auth::id())
            ->whereNull('logout_time')
            ->latest()
            ->first();
        if ($loginRecord) {
            $loginRecord->update([
                'logout_time' => Carbon::now(),
            ]);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/register');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
