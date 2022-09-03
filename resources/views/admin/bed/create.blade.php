@extends('layouts.admin')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center text-primary">
                Insert New Bed or OT Information
            </h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.bed.store')}}" method="POST">
            @csrf 
            
            <div class="form-group mb-4">
                <input type="number" name="room_number" placeholder="Enter Room Number" class="form-control">
            </div>
            <div class="form-group mb-4">
                <input type="number" name="bed_number" placeholder="Enter Bed Number" class="form-control">
            </div>
            <div class="form-group mb-4">
                <label for="type">Choose Bed Type</label>
                <select name="type" class="form-control">
                    <option value="Bed">Normal Bed</option>
                    <option value="OT">OT Bed</option>
                </select>
            </div>
            <h2 class="text-center">
                <input type="submit" value="Save" class="btn btn-primary w-50">
            </h2>
        </form>
    </div>
</div>
@endsection