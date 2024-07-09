<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    //
    public function index(){
        $view = 'authentication.register';
        return view($view);
    }
    public function register(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255','unique:accounts'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:5'],
            'phone_number'=> ['required', 'string', 'max:11'],
            'full_name' =>  ['required', 'string', 'max:255'],
        ]);
        $account = Account::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'role' => 'user',
            'status' => 'active', 
        ]);
        
        Auth::login($account);
        return redirect()->route('/register')->with('success', 'Account created successfully.');
    }
}
