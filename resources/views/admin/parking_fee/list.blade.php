@extends('admin.layout.main')
@section('content')
<div class="container-fluid pt-4 px-4">

    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">

            <div class="bg-light rounded h-100 p-4">
                <div class="row">
                    <div class="col-9">
                        <h6 class="mb-4">Parking Fee</h6>
                    </div>
                    <div class="col-3">
                        <a href="{{route('create')}}" class="btn btn-success">Create</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Type vehicle</th>
                            <th scope="col">Price per hour (VNĐ)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price_per_hour}}</td>
                                <td>
                                    <form action="{{ route('delete', $item->id) }}" method="post"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <a href="{{route('edit', $item->id)}}" class="btn btn-warning">Update</a>
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