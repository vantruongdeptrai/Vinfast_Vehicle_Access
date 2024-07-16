<div class="row align-items-center">
    <div>
        <label for="">Name vehicle</label>
        <input type="text" class="form-control" value="{{$informationVehicle->vehicle_name}}" disabled>
    </div>
    <div>
        <label for="">Brand</label>
        <input type="text" class="form-control" value="{{$informationVehicle->brand}}" disabled>
    </div>
    <div>
        <label for="">Color</label>
        <input type="text" class="form-control" value="{{$informationVehicle->color}}" disabled>
    </div>
    <div>
        <label for="">License plate</label>
        <input type="text" class="form-control" value="{{$informationVehicle->license_plates}}" disabled>
    </div>
    <div>
        <label for="">Type vehicle</label>
        <input type="text" class="form-control" value="{{$typeVehicle->name}}" disabled>
    </div>
    <div>
        <label for="">Price per hour</label>
        <input type="text" class="form-control" value="{{$typeVehicle->price_per_hour}} vnđ" disabled>
    </div>
</div>