<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeVehicle;
use Illuminate\Http\Request;

class ParkingFeeController extends Controller
{
    //
    public function index(){
        $view= 'admin.parking_fee.list';
        $data = TypeVehicle::query()->get();
        return view($view,compact('data'));
    }
    public function create(){
        $view= 'admin.parking_fee.create';
        return view($view);
    }
    public function store(Request $request){
        $request->validate([
            'type_vehicle'=> ['required','string','max:255'],
            'price_per_hour'=> ['required','int','min:1'],
        ]);
        //dd($request->all());
        $data = [
            'name' => $request->input('type_vehicle'),
            'price_per_hour' => $request->input('price_per_hour')
        ];
        //dd($type_vehicle);
        TypeVehicle::query()->create($data);
        return redirect()->route('list')->with('Create successfully');
    }
    public function edit(string $id){
        $view= 'admin.parking_fee.update';
        $data = TypeVehicle::query()->findOrFail($id);
        return view($view,compact('data'));
    }
    public function update(Request $request, string $id){
        $request->validate([
            'type_vehicle'=> ['required','string','max:255'],
            'price_per_hour'=> ['required','int','min:1'],
        ]);
        $model = TypeVehicle::query()->findOrFail($id);
        $model->name = $request->input('type_vehicle');
        $model->price_per_hour = $request->input('price_per_hour');
        $model->save();
        return redirect()->route('list')->with('success', 'Updated successfully');
    }
    public function delete(string $id){
        $model = TypeVehicle::query()->findOrFail($id);
        $model->delete();
        return redirect()->route('list')->with('success', 'Delete successfully');
    }
}
