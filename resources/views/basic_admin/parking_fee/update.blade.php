@extends('basic_admin..layout.main')
@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="text-info">Update</h1>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <form action="{{route('update',$data->id)}}" method="post">
                    @csrf
                    <label for="">Type vehicle</label>
                    <input type="text" name="type_vehicle" class="form-control" value="{{$data->name}}">
                    <label for="">Price per hour</label>
                    <input type="text" name="price_per_hour" class="form-control" value="{{$data->price_per_hour}}">
                    <button type="submit" class="btn btn-success mt-5">Submit</button>
                </form>
                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: '{{ session('success') }}',
                        });
                    </script>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection