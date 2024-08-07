@extends('admin.layout.main')
@section('content')
<div class="container-fluid pt-4 px-4 mb-4">
    <div class="row g-4">
        <div class="">
            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-9">
                        <h6 class="mb-4">Parking Fee</h6>
                    </div>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Full name</th>
                            <th scope="col">License PLate</th>
                            <th>Entry time</th>
                            <th>Current fee</th>
                            <th>Status</th>
                            <th>QR code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($combinedData as $item)
                            <tr>
                                <td>{{$item['full_name']}}</td>
                                <td>{{$item['license_plates']}}</td>
                                <td>{{$item['entry_time']}}</td>
                                <td>
                                    @if ($item['status'] == 1)
                                        <span>Parking</span>
                                    @endif
                                    @if ($item['status'] != 1)
                                        <span>No Parking</span>
                                    @endif
                                </td>
                                <td>
                                    {{ number_format($item['cost'], 0, ',', '.') }} VND
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route('qr-checkout', $item['cost'])}}" class="btn btn-success">Render
                                            QRcode</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection