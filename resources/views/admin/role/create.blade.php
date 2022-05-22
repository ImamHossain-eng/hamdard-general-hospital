@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Create New User Role
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.role.store')}}" method="POST">
            @csrf 
            <div class="form-group mb-4">
                <input type="text" name="name" placeholder="Enter Role Name" value="{{old('name')}}" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Save">
        </form>
    </div>
</div>
@endsection