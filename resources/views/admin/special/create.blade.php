@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3 class="text-center">
                    Create new doctor Category
                </h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.speciality.store')}}" method="POST">
                @csrf 
                <div class="form-group">
                    <input type="text" name="speciality" value="{{old('speciality')}}" class="form-control" placeholder="Enter doctor category or speciality">
                </div>

                <input type="submit" class="btn btn-primary w-100" value="Save">

            </form>
        </div>
    </div>
</body>
@endsection