@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Edit User Role
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.role.update', $role->id)}}" method="POST">
            @csrf 
            @method('PUT')
            <div class="form-group mb-4">
                <input type="text" name="name" placeholder="Enter Role Name" value="{{$role->name}}" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Update">
        </form>
    </div>
</div>
@endsection