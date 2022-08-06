@extends('layouts.doctor')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-center">Edit {{$app->user->name}} Appointment</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('doctor.appointment.update', $app->id)}}" method="POST">
            @csrf 
            @method('PATCH')
            <div class="form-group mb-4">
                <label class="form-label">Compose a E-Prescription</label>
                <textarea name="prescription" @if($app->prescription != null) disabled @endif class="form-control">
                    {{$app->prescription}}
                </textarea>
            </div>
            <input type="submit" value="Update" class="btn btn-primary w-100">
        </form>
    </div>
</div>
@endsection