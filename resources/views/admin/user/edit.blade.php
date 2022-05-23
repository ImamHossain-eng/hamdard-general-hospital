@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">
                Create New User
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.user.update', $user->id)}}" method="POST">
            @csrf 
            @method('PUT')
            <div class="form-group mb-4">
                <input type="text" name="name" placeholder="Enter User Name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <input type="email" name="email" placeholder="Enter Email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="form-group mb-4">
                <input type="password" name="password" placeholder="Enter new Password or do not touch to hold previous password" class="form-control">
            </div>
            <div class="form-group mb-4">
                <select name="role_id" class="form-control">
                    <option value="{{$user->role_id}}">Choose User Role: {{$user->role->name}}</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary w-100" value="Update">
        </form>
    </div>
</div>
@endsection